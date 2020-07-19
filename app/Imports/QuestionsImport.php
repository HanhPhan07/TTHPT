<?php

namespace App\Imports;

use App\Models\Question;
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
        return new Question([
            'ans_1'             =>  $row[1],
            'ans_2'             =>  $row[2],
            'ans_3'             =>  $row[3],
            'ans_4'             =>  $row[4],
            'ans_correct'       =>  $row[5],
            'id_subject'        =>  $row[6],
            'question_content'  =>  $row[7]
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }

}
