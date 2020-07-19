<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\HomeService;
use App\Services\StudentService;
use Carbon\Carbon;

class HomeController extends Controller
{
    private $homeService;
    public function __construct(HomeService $homeService)
    {
        $this->homeService=$homeService;
    }
    public function index()
    {
        $id = \Session::get('id');
        //lay mon thi
        $id_subject=$this->homeService->getIdSubject();
        //dd( $id_subject);
        if($id_subject == null){
            $notification['title']='Chưa đến ngày thi';
            $notification['text']='Vui lòng quay trở lại trong thời gian thi.';
            return view('client.error',$notification);
        } else{
            $student_sub=$this->homeService->findStudentSubject($id);
            if($this->homeService->checksubject($id_subject,$student_sub)){
                $data['student']=$this->homeService->findStudent($id);
                $data['subject']=$this->homeService->getSubject($id_subject);
                //dd($data['subject']);
                $data['exam_subject']=$this->homeService->findArraySubject($student_sub);
                return view('client.home.index',$data);
            } else{
                $notification['title']='Bạn chưa đăng ký thi môn này !';
                $notification['text']='Vui lòng quay trở lại trong thời gian thi môn mà bạn đã đăng ký.';
                return view('client.error',$notification);
            }

        }
    }
}
