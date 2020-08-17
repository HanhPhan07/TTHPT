<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'id', 'id_exam', 'num_ques', 'answer_correct',  'id_student', 'mark'
    ];
    public function student() {
        return $this->belongsTo('App\Models\Student', 'id_student');
    }
}
