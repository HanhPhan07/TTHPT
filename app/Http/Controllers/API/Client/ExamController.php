<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Services\HomeService;
use App\Services\ResultService;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\TaskService;
use Illuminate\Support\Facades\Session;

use function GuzzleHttp\Promise\task;

class ExamController extends Controller
{
    private $taskService;
    private $studentService;
    var $data=array();
    var $page_size=2;
    protected $url;

    public function __construct(TaskService $taskService, StudentService $studentService){
        $this->url=config('api.url');
        $this->taskService = $taskService;
        $this->studentService = $studentService;
    }

    public function index(Request $request)
    {   
        $today = today();
        $id_student = Session::get('id');
        $id_subject=$this->taskService->getidSubject($today);
        $id_exam_array=$this->taskService->getIdExamArray($id_subject);
        $id_exam=$this->taskService->getIdExam($id_student,$id_exam_array);
        $data['checkout']=$this->taskService->review($id_student,$id_exam);
        $data['student']=$this->studentService->findStudent($id_student);
        return view('client.result',$data);
    }


}
