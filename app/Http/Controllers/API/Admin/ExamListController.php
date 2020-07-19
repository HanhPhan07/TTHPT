<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamList;
use Illuminate\Http\Request;
use App\Services\ExamListService;
use App\Services\SubjectService;
use SebastianBergmann\Environment\Console;

class ExamListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $examlistService;
    private $subjectService;

    public function __construct(ExamListService $examlistService, SubjectService $subjectService)
    {
        $this->examlistService = $examlistService;
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        $data['examlist'] = $this->examlistService->getExamList();
        $data['subject'] = $this->subjectService->getListSubject();
        return view('admin.exam.examlist',[ 'title' => 'ExamList'], $data);
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
        $id_subject = $request->input('id_subject');
        $this->examlistService->playexam(6);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamList  $examList
     * @return \Illuminate\Http\Response
     */
    public function show(ExamList $examList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamList  $examList
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamList $examList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamList  $examList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamList $examList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamList  $examList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamList $examList)
    {
        //
    }
}
