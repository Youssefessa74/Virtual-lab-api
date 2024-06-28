<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\SubjectCollection;
use App\Http\Resources\SubjectResource;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function SubjectIndex()
    {

        return new SubjectCollection(Subject::all());
    }

    public function SubjectShow(Subject $id)
    {

        return new SubjectResource($id);
    }

    public function QuestionIndex()
    {

        return new QuestionCollection(Question::with('subject')->get());
    }

    public function QuestionShow(Question $id)
    {

        return new QuestionResource($id);
    }
}
