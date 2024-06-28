<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\QuestionsDataTable;
use App\DataTables\SubjectDataTable;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard.index');
    }

    public function all_questions(QuestionsDataTable $dataTable){
        $subjects = Subject::all();
        $questions = Question::with(['subject','answers'])->get();
        return view('admin.quiz.index',compact('questions','subjects'));

    }



    public function question_create(){
        $subjects =Subject::all();
        return view('admin.quiz.create',compact('subjects'));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'question' => 'required|string',
            'answers' => 'required|array|min:4',
            'answers.*' => 'required|string',
            'correct_answer' => 'required|integer|min:1|max:4', // Validate the index of the correct answer
        ]);

        // Create the question
        $question = Question::create([
            'subject_id' => $validatedData['subject_id'],
            'question' => $validatedData['question'],
        ]);

        // Create the answers
        foreach ($validatedData['answers'] as $index => $answerText) {
            $isCorrect = $index + 1 == $validatedData['correct_answer']; // Check if current answer is correct
            $question->answers()->create([
                'answer' => $answerText,
                'is_correct' => $isCorrect,
            ]);
        }

        // Return a response indicating success
        toastr('Data Saved Successfully','success');
        return redirect()->route('questions.index');
    }


    public function question_edit($id){
        $subject =Subject::all();
        $question = Question::with(['answers','subject'])->findOrFail($id);
        return view('admin.quiz.edit',compact('question','subject'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'subject_id' => 'required|exists:subjects,id',
            'answers.*' => 'required|string',
            'correct_answer' => 'required|integer|between:1,4',
        ]);

        $question = Question::findOrFail($id);
        $question->question = $request->input('question');
        $question->subject_id = $request->input('subject_id');
        $question->save();

        // Delete existing answers and re-add them
        $question->answers()->delete();
        foreach ($request->input('answers') as $key => $answer) {
            Answer::create([
                'question_id' => $question->id,
                'answer' => $answer,
                'is_correct' => ($key + 1) == $request->input('correct_answer')
            ]);
        }

        toastr('Data Updated Successfully','success');
        return redirect()->route('questions.index');
    }


    public function destroyQuestion($id)
    {
        // Find the question by its ID
        $question = Question::findOrFail($id);

        // Delete the question along with its answers
        $question->answers()->delete(); // Delete associated answers
        $question->delete(); // Delete the question itself

        // Return a response indicating success
        toastr('Data Saved Successfully','success');
        return redirect()->route('questions.index');
      }



    public function all_subject(SubjectDataTable $dataTable){
        return $dataTable->render('admin.quiz.subject.index');
      }


    public function subject_create(){
         return view('admin.quiz.subject.create');
      }
      public function subject_store(Request $request){
         $request->validate(['name'=> ['required','min:1','max:30']]);
         $element = new Subject();
         $element->name = $request->name;
         $element->save();


        toastr('ELement Updated Successfully','success');
        return redirect()->route('all.subject');
     }

     public function subject_edit($id){
        $subject = Subject::findOrFail($id);
        return view('admin.quiz.subject.edit',compact('subject'));
     }

     public function subject_update($id,Request $request){

        $request->validate([
            'name' => 'required',
        ]);
        $subject = Subject::findOrFail($id);
        $subject->name = $request->name;
        $subject->save();
        toastr('ELement Updated Successfully','success');
        return redirect()->route('all.subject');
     }


    public function subject_destroy($id){

        $subject = Subject::findOrFail($id)->delete();
        toastr('ELement Updated Successfully','success');
        return redirect()->route('all.subject');
     }


}
