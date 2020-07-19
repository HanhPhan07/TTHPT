<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SchoolList;
use App\Models\ExamSubject;



class Student extends Model
{
    /**
     * All of the relationships to be touched.
     * Stuent cập nhật các khóa ngoại sẽ đc cập nhật
     * @var array
     */
    protected $touches = ['schoolList'];
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'username', 'fullname', 'password','cmnd','date_of_birth','gender','nation','address','created_at'
    ];

    protected $dates = [
        'date_of_birth',
        'created_at'
    ];

    /**
     * Get the student that the station belongs to.
     */
    public function examSubject() {
        return $this->belongsToMany('App\Models\Subject', 'exam_subjects','id_student', 'id_subject');
    }

    public function schoolList() {
        return $this->hasOne('App\Models\SchoolList', 'id_student');
    }

    public function result() {
        return $this->hasMany('App\Models\Result', 'id_student');
    }

    public function examList() {
        return $this->hasMany('App\Models\ExamList', 'id_student');
    }

    

    // public function task() {
    //     return $this->hasMany('App\Models\Task', 'id_student','id');
    // }
}
