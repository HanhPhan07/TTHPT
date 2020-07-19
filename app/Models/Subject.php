<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
use App\Models\Schedule;
class Subject extends Model
{
    public $timestamps = FALSE;
    protected $dateFormat = 'd-m-Y';
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    protected $fillable = [
        'id', 'name','time', 'created_at', 'updated_at',
    ];

    /**
     * Get the phone subject associated with the schedule.
     */

    public function question() {
        return $this->hasMany('App\Models\Question','id_subject','id');
    }

    public function result() {
        return $this->hasMany('App\Models\Result','id_subject','id');
    }

    public function examList() {
        return $this->hasMany('App\Models\ExamList','id_subject','id');
    }

    //home

    public function exam() {
        return $this->hasMany(Exam::class,'id_subject');
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class,'id_subject');
    }

}
