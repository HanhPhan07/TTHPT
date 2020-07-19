<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Services\QuestionService;
class ExportExcelController extends Controller
{
    private $questionService;
    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function exportQuestion(){
        $modelName= 'Question';
        $table_heading=[
        'id',
        'Đáp án 1',
        'Đáp án 2',
        'Đáp án 3',
        'Đáp án 4',
        'Đáp án đúng',
        'id môn học',
        'question_content'];
        return Excel::download(new DataExport($this->questionService,$table_heading),$modelName.'.xlsx');
    }
}


//class export
class DataExport implements FromCollection,WithHeadings
{
    private $questionService;
    private $filltable;
    public function __construct(QuestionService $questionService, array $filltable)
    {
        $this->questionService = $questionService;
        $this->filltable= $filltable;
    }
    function collection(){
        $data = $this->questionService->getListQuestion();
        return $data;
    }
    public function headings(): array
    {
        return $this->filltable;
    }
}
