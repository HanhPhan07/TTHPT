<?php

namespace App\Repositories;

use App\Models\Subject;

class SubjectRepository  extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Subject::class;
    }

    public function findSubject($id){
        return Subject::whereId($id)
                        ->with('schedule')
                        ->with('exam')
                        ->get();
    }

    public function findArraySubject($arr_id){
        return Subject::whereIn('id',$arr_id)
                        ->get();
    }
    public function getSubjectTime($id){
        return Subject::whereId($id)
                        ->get(["time"]);
    }
}
