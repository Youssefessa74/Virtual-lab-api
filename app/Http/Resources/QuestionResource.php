<?php

namespace App\Http\Resources;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'question' =>$this->question,
            'subject' =>$this->subject_id,
            'Answer'=>Answer::where('question_id',$this->id)->get(),
        //    'The_Correct_Answer' =>Answer::where(['question_id'=>$this->id,'is_correct',1])->first(),
        ];
    }
}
