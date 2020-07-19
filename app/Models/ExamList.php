<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamList extends Model
{
    protected $table = 'exam_list';

    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student', 'id');
    }
}



