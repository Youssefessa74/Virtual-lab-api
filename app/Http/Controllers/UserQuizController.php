<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User_Response;
use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    public function user_test(){
        $questions = Question::all();
       return view('quiz.questions',compact('questions'));
    }

    public function thank_you_page(){
        // Get all questions with their answers
        $questions = Question::with('answers')->get();

        // Get the authenticated user ID
        //$userId = auth()->user()->id;

        // Get the user's responses
        $userResponses = User_Response::pluck('answer_id', 'question_id')->toArray();

        return view('quiz.thank_you', compact('questions', 'userResponses'));

    }

    public function submit(Request $request)
    {
        // Get the authenticated user ID
       // $userId = auth()->user()->id;

        // Loop through the keys of the request data
        foreach ($request->keys() as $key) {
            // Check if the key starts with 'question_'
            if (strpos($key, 'question_') === 0) {
                // Extract the question and answer IDs from the key
                $questionId = substr($key, strlen('question_'));
                $answerId = $request->input('answer_' . $questionId);

                // Create a new UserResponse record
                User_Response::create([
                    'user_id' => 21,
                    'question_id' => $questionId,
                    'answer_id' => $answerId
                ]);
            }
        }

        // Optionally, you can redirect the user to a thank you page or somewhere else after submitting the quiz
        return redirect()->route('thank-you-page');
    }


}
