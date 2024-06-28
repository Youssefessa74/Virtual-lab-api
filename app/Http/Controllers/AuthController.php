<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\PostResource;
use App\Mail\ResetPasswordMail;
use App\Models\Post;
use App\Models\User;
use App\Traits\Upload_image;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    use Upload_image;
      /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','google_page','google_page_callback','reset_passowrd_page','showResetPasswordForm','forgotPassword','resetPassword']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){

        $user = User::all();
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'password' =>['required'],

        ],
    [
        'email.unique' => 'This Email You Trying to Take is Used By Some One Else'
    ]);

       $users = User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token =  $this->respondWithToken($user);

        return response()->json([$users,'token'=>$token]);
     }
     public function login(Request $request)
     {
         // Validate the request data
         $request->validate([
             'email' => ['required','email'],
             'password' => ['required'],
         ]);

         // Attempt to log the user in
         if ($token = Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
             // Authentication passed...
             $user = Auth::user();
             return $this->respondWithToken($token);

         } else {
             // Check if the email exists in the database
             $user = User::where('email', $request->email)->first();
             if ($user) {
                 // If the email exists but the password is incorrect
                 return response()->json(['message' => 'Wrong password'], 200);
             } else {
                 // If the email doesn't exist
                 return response()->json(['message' => 'Your Email Address Does not exist'], 200);
             }
         }
        }

        public function reset_passowrd_page(){
            return view('forgot_password_page');
        }

            public function showResetPasswordForm($token)
        {
            return view('reset_password_page', ['token' => $token]);
        }

        public function forgotPassword(Request $request){
            $request->validate([
                'email' => 'required|email',
            ]);

            $response = Password::sendResetLink($request->only('email'));

            return $response == Password::RESET_LINK_SENT
                        ? back()->with('status', __($response))
                        : back()->withErrors(['email' => __($response)]);
        }

     public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $response = Password::reset($request->only(
        'email', 'password', 'password_confirmation', 'token'
    ), function ($user, $password) {
        $user->forceFill([
            'password' => Hash::make($password)
        ])->save();
    });

    return $response == Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($response))
                : back()->withErrors(['email' => [__($response)]]);
}


        public function google_page(){
            return Socialite::driver('google')->redirect();
        }

        public function google_page_callback(){
            try{
                $user =Socialite::driver('google')->user();
                $finduser=User::where('google_id',$user->id)->first();
                if($finduser){
                    Auth::login($finduser);
                    return redirect()->route('my_welcome_page');
                } else{
                   $newUser =User::create([
                    'name' =>$user->name,
                    'email' =>$user->email,
                    'google_id'=>$user->id,
                    'password'=>Hash::make('password'),
                   ]);
                   Auth::login($newUser);
                   return redirect()->route('my_welcome_page');

                }
            } catch(Exception $e){
                dd($e->getMessage());
            }
        }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $posts = Post::all();
        $user = Auth::user();

        return response()->json([
            'status' => true,
            'User' => $user->name,
            'email'=>$user->email,
            'posts'=>PostResource::collection($posts),

        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function update_email(UpdateUserRequest $request){
       $user =Auth::user();
       $imagepath = $this->UploadImage($request,'avatar');
       $user =  User::where('id', Auth::id())->update([
            'name' => isset($request->name) ? $request->name : $user->name,
            'email' =>isset($request->email) ? $request->email : $user->email,
            'avatar'=>isset($imagepath) ?  $imagepath : $user->avatar,
            // Add other fields if needed
        ]);
    return response()->json(['success' => 'User details updated successfully'],200);
    }

    public function change_password(ChangePasswordRequest $request){

     //First Don't Forget in the request to type password_confirmation after current_password and password
          $user = Auth::user();

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 400);
        }

        // Change password
        if(!$user){
            return response()->json(['message' => 'Un authorized']);
        }

        $user =User::where('id',Auth::id())->update([
            'password' => Hash::make($request->password)
        ]);


        return response()->json(['message' => 'Password changed successfully']);
    }
}
