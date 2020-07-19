<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Services\QuestionService;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Imports\QuestionsImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\TryCatch;

class QuestionController extends Controller
{
    private $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['question']=$this->questionService->getListQuestion();
        $data['subject']=$this->questionService->getAllSubject();
        return view('admin.question.question',[ 'title' => 'Câu Hỏi'],$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $data = $request->all();
        $question = $this->questionService->update($request->id, $data);
        return json_encode($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    public function detail($id){
        $data['question']=$this->questionService->findQuestion($id);
        $data['id_subject']=$this->questionService->findQuestionSubject($id);
        $data['subject']=$this->questionService->getAllSubject();
        return view('admin.question.question-detail',$data);
    }

    public function import(Request $request)
    {
        if($request->file('inputFile')){
            $file=$request->file('inputFile');
            Excel::import(new QuestionsImport, $file);
            $result['status_value']=" Nhập File thành công";
            $result['status']=1;
        } else{
            $result['status_value']=" Lỗi nhập File";
            $result['status']=0;
        }
        return json_encode($result);
    }
}
