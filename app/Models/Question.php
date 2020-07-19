<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=[
        'id',
        'ans_1',
        'ans_2',
        'ans_3',
        'ans_4',
        'ans_correct',
        'id_subject',
        'question_content',
    ];

    //protected $hidden = ['ans_correct'];

    public function questionList() {
        return $this->hasMany('App\Models\QuestionList','id_question','id');
    }

    public function task(){
        return $this->hasMany('App\Models\Task','id_question');
    }



}
