<?php

namespace App\Repositories;

use App\Models\Result;
use App\Models\Question;

class ResultRepository  extends EloquentRepository 
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Result::class;
    } 


    public function resultExam(){
        return Question::where('id',1)->get();
    }

    public function resultCalculate(){
        //print_r(Result::with('student')->get());
        $array = Result::with('student')->get();
        return $array;
    }
    

}