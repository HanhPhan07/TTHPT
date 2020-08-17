<?php

namespace App\Imports;

use App\Models\Question;
use App\Models\Subject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class QuestionsImport implements ToModel,WithStartRow
{
    protected function formatDateExcel($date){
        if (gettype($date) === 'double') {
            $birthday = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date);
            return $birthday->format('Y-m-d');
        }
        return $date;
    }
    public function model(array $row)
    {
        $id_subject= Subject::whereName($row[6])->get()->pluck('id')->toArray();
        //dd($id_subject);
        return new Question([
            'ans_1'             =>  $row[1],
            'ans_2'             =>  $row[2],
            'ans_3'             =>  $row[3],
            'ans_4'             =>  $row[4],
            'ans_correct'       =>  $row[5],
            'id_subject'        =>  $id_subject[0],
            'question_content'  =>  $row[7]
        ]);

    }
    public function startRow(): int
    {
        return 3;
    }

}
