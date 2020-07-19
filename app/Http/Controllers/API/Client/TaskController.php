<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Task;
use App\Services\ExamService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\TaskService;
use Carbon\Carbon;
use Illuminate\Support\Arr;


class TaskController extends Controller
{
    private $taskService;
    private $examService;
    private $subjectService;
    var $data=array();
    var $page_size=3;
    protected $url;

    public function __construct(TaskService $taskService,ExamService $examService,SubjectService $subjectService){
        $this->url=config('api.url');
        $this->taskService = $taskService;
        $this->examService = $examService;
        $this->subjectService = $subjectService;
    }
    public function index(){
        $id = \Session::get('id');
        //$today = today();
        $subject=$this->taskService->getidSubject();
        $subjectTime=$this->subjectService->getSubjectTime($subject);
        $over_time=now()->addMinute($subjectTime[0]['time']);
        if (\Session::has('over_time')) {
            $data['over_time']= \Session::get('over_time');
        }
        else{
            $time = \Session::put('over_time',$over_time);
            $data['over_time']= \Session::get('over_time');
        }
        if($subject==null){
            return view('client.erorr',[ 'title' => 'Chưa đến ngày THI']);
        }
        else return view('client.task',$data);
    }

    public function getQuestion(){
        $today = today();
        $id_student = \Session::get('id');
        $id_subject=$this->taskService->getidSubject($today);
        $id_exam_array=$this->taskService->getIdExamArray($id_subject);
        $id_exam=$this->taskService->getIdExam($id_student,$id_exam_array);
        $data=$this->taskService->getQuestion($id_exam);
        $data['student']=$this->taskService->findStudent($id_student);
        $data['total_record']=$this->taskService->getCountListQuestion($id_exam);
        $data['page_size']=$this->page_size;
        //$data['time_start']=$this->taskService->getTimeSubject($id_subject);
        echo json_encode($data);
    }

    public function resetcd()
    {
        \Session::pull('over_time', 'default');
        return ('<a href="home">xóa thành công</a>');
    }

    public function saveTask(Request $request){
        $select_arr= $request->arr_selected;
        $today = today();
        $id_student = \Session::get('id');
        $id_subject=$this->taskService->getidSubject($today);
        $id_exam_array=$this->taskService->getIdExamArray($id_subject);
        $id_exam=$this->taskService->getIdExam($id_student,$id_exam_array);
        $data=$this->taskService->getQuestion($id_exam);

        for ($i=0; $i<count($data);$i++){

                $task=["id_question"=>$data[$i]['question']['id'], "id_exam"=>$id_exam[0]['id_exam'], "id_user"=>$id_student ];
                $this->taskService->luu($task);
        }


        for ($i=0; $i< count($select_arr) ; $i++ ){
            $id_ques = $select_arr[$i]['question'];
            $selected = $select_arr[$i]['selected'];
            $this->taskService->update_by_id_question($id_ques,$selected);
        }
    }
}
