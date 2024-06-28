<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $hidden =['created_at','updated_at'];

    protected $casts = [
            'is_correct' => 'boolean'
    ];

    public function question() {
        return $this->belongsTo(Question::class,'question_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class,'subject_id');
    }


}
