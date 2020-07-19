<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'id', 'answer_selected', 'id_question', 'id_exam', 'id_user',
    ];

    public function question(){
        return $this->belongsTo('App\Models\Question','id_question');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student', 'id_user');
    }
}
