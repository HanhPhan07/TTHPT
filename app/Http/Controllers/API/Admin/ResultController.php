<?php

namespace App\Http\Controllers\API\Admin;
use App\Services\TaskService;
use App\Services\ResultService;
use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\Task;


class ResultController extends Controller
{

    private $taskService;
    private $resultService;




    public function __construct(TaskService $taskService,ResultService $resultService){
        $this->url=config('api.url');
        $this->taskService = $taskService;
        $this->resultService = $resultService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = $this->taskService->doneExam();
        return view('admin.result.result',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function generateResult(){
        $this->taskService->calculate();

        
        //printf($data['mark']);
        return redirect()->route('final');
    }


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $Result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $Result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $Result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $Result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $Result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $Result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $Result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $Result)
    {
        //
    }
}
