<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Services\ResultService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\TaskService;

use function GuzzleHttp\Promise\task;

class ExamController extends Controller
{
    private $taskService;
    private $resultService;
    var $data=array();
    var $page_size=2;
    protected $url;

    public function __construct(TaskService $taskService, ResultService $resultService){
        $this->url=config('api.url');
        $this->taskService = $taskService;
        $this->resultService = $resultService;
    }

    public function index(Request $request)
    {   
        //cần id_exam dể truy vấn...
        $today = today();
        $id_student = \Session::get('id');
        $id_subject=$this->taskService->getidSubject($today);
        $id_exam_array=$this->taskService->getIdExamArray($id_subject);
        $id_exam=$this->taskService->getIdExam($id_student,$id_exam_array);
        $data['checkout']=$this->taskService->review($id_student,$id_exam);
        //$data['checkout']= $this->taskService->review($id_student,$id_exam);
        //$data['count']= count($data['checkout']);
        //printf($data['checkout']);
        return view('client.result',$data);
    }


}
