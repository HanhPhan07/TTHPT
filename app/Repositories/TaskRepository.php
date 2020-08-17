<?php

namespace App\Repositories;

use App\Models\Task;
use App\Services\ResultService;

class TaskRepository  extends EloquentRepository
{

    private $resultService;

    public function __construct(ResultService $resultService){
        $this->url=config('api.url');
        $this->resultService = $resultService;
    }
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Task::class;
    }

    public function updatebyidques($id, $selected){
        $task = Task::where('id_question',$id)->get();
        //$task = Task::find($id);
        foreach ($task as $data){
            $data->answer_selected = $selected;
            $data->save();
        }

       //return $task;
    }

    public function calculate(){

        $array= Task::groupBy('id_exam','id_student')
                    ->get(array('id_student','id_exam'));

        foreach ($array as $item){
            $task= Task::where('id_exam',$item['id_exam'])
                        ->where('id_student',$item['id_student'])
                        ->with('question')
                        ->get();


            $numques= Task::where('id_exam',$item['id_exam'])
                        ->where('id_student',$item['id_student'])->count();
            $count=0;
            foreach ($task as $compare){

                if ($compare['answer_selected']==$compare['question']['ans_correct']) $count++;


            }
            $mark =round(10/$numques*$count, 2, PHP_ROUND_HALF_UP);
            $attibutes=['answer_correct'=>$count, 'id_exam'=>$item['id_exam'], 'id_student'=>$item['id_student'], 'mark'=>$mark];
            $this->resultService->storageResult($attibutes);
        }


        return $array;
    }


    public function review($id_user,$id_exam){
        $data= Task::where('id_student',$id_user)->where('id_exam',$id_exam)->with('question')->get();
        return $data;
    }

    public function luu($attibutes){
        $task = new Task;
        $task->id_question= $attibutes['id_question'];
        $task->id_exam= $attibutes['id_exam'];
        $task->id_student= $attibutes['id_student'];
        $task->save();
    }


    public function doneExam(){
        $array= Task::groupBy('id_exam','id_student')->with('student')
                    ->get();
        return $array;
    }

}
