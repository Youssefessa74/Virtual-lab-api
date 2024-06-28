<?php

use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\QuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



 // Login And Register Routes Should not be In Middleware
Route::post('register' ,[AuthController::class ,'register'])->name('api.register');
Route::post('login' ,[AuthController::class ,'login'])->name('api.login');

Route::post('all-elements',[ElementController::class,'all_in_api']);

Route::get('element/{id}',[ElementController::class,'just_one_api']);

 // Route Fot forget password Page
 Route::get('forget-password-page',[AuthController::class,'reset_passowrd_page']);
// Route for forgot password
Route::post('forgot-password-send', [AuthController::class,'forgotPassword'])->name('forget-password-route');

//Route For Reset Password Page
Route::get('reset-password-page',[AuthController::class,'showResetPasswordForm'])->name('showReset-Password-Form');

// Route for resetting password
Route::post('reset-password', [AuthController::class,'resetPassword'])->name('reset-password-route');


 // Using Middleware , so user should sign in to can access for our services
Route::group(['middleware'=>'auth:api'],function(){
    // Quiz Routes
    Route::group(['prefix'=>'quiz'],function(){
        Route::get('/subject',[QuizController::class,'SubjectIndex']);
        Route::get('/subject/{id}',[QuizController::class,'SubjectShow']);
        Route::get('/questions',[QuizController::class,'QuestionIndex']);
        Route::get('/questions/{id}',[QuizController::class,'QuestionShow']);

    });
    /////////////////////////////////////////////////////////////////////
    Route::post('/change-user-password',[AuthController::class,'change_password']);
    Route::get('/all-posts',[DataController::class,'index']);
    Route::put('/update-email',[AuthController::class,'update_email']);
    Route::get('/profile',[AuthController::class,'me']);

 Route::controller(AuthController::class)->group(function(){

    Route::post('logout','logout');
    Route::apiResource('data',DataController::class);

 });


// Route::apiResource('data',DataController::class);
});
// End MiddleWare


