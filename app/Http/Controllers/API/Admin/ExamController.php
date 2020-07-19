<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Services\ExamService;
use App\Services\SubjectService;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $examService;
    private $subjectService;

    public function __construct(ExamService $examService, SubjectService $subjectService)
    {
        $this->examService = $examService;
        $this->subjectService = $subjectService;
    }
    public function index()
    {
        $data['exam']=$this->examService->getListExam();
        $data['subject'] = $this->subjectService->getListSubject();
        return view('admin.exam.exam',[ 'title' => 'Exams'], $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_subject = $request->input('subject_id');
        $number = $request->input('number');
        // if($this->examService->createExam($id_subject, $number, $time)){
        //     $result['status']=1;
        // }
        // else {
        //     $result['status']=0;
        // }
        // echo json_encode($result);
        $this->examService->createExam($id_subject, $number);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $Exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $Exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $Exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $Exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $Exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $id_exam = $request->get('id_exam');
        // $time = $request->get('time');
        // if($this->examService->updateExam($id_exam, $time)){
        //     $result['status']=1;
        //     $result['id_exam']=$id_exam;
        // }else{
        //     $result['status']=0;
        // }
        // return json_encode($result);
        if($this->examService->updateExam($request->id, $request->all())){
            $result['status']=1;
        //     $result['id_exam']=$id_exam;
        }
        else{
            $result['status']=0;
        }
        return json_encode($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $Exam
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //dd($this->examService->delete($id));
        if($this->examService->delete($id)){
            $result['status']=1;
        }else{
            $result['status']=0;
        }
        return json_encode($result);
        // $exam = Exam::find($id);
        // $exam->delete();
        // return $exam;
    }
}
