<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class QuestionList extends Model
{
    protected $table="question_list";

    public function question()
    {
        return $this->belongsTo(Question::class,'id_question','id');
    }

    

}


