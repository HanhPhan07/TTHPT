<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Services\ScheduleService;
use App\Services\SubjectService;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $scheduleService;
    private $subjectService;

    public  function __construct(ScheduleService $scheduleService, SubjectService $subjectService)
    {
        $this->scheduleService=$scheduleService;
        $this->subjectService = $subjectService;

    }
    public function index()
    {
        $data['schedule'] = $this->scheduleService->getScheduleList();
        $data['subject'] = $this->subjectService->getListSubject();
        return view('admin.exam.schedule',[ 'title' => 'Lịch thi'], $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $id_subject = $request->input('subject_id');
        // $time = $request->input('time');
        // if($this->examService->createExam($id_subject, $number, $time)){
        //     $result['status']=1;
        // }
        // else {
        //     $result['status']=0;
        // }
        // echo json_encode($result);
        $this->scheduleService->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $Schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $Schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $Schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $Schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $Schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $Schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $Schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $Schedule)
    {
        //
    }

    public function delete($id)
    {
        $this->scheduleService->delete($id);
        // if($this->examService->delete($id)){
        //     $result['status']=1;
        // }else{
        //     $result['status']=0;
        // }
        // return json_encode($result);
        // $exam = Exam::find($id);
        // $exam->delete();
        // return $exam;
    }
}
