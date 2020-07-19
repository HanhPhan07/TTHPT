<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Subject;
use App\Models\School;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use App\Services\StudentService;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
class StudentsImport implements ToCollection, WithHeadingRow
{
    protected function formatDateExcel($date){ 
        if (gettype($date) === 'double') { 
            $birthday = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date); 
            return $birthday->format('Y-m-d'); 
        } 
        return $date; 
    }

    public function headingRow() : int
    {
        return 8;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $student=Student::Create([
                'bursary_provider_id' => 1,
                'bursary_provider_reference' => 'xxx',
                'username'    => $row['mssv'], 
                'password' => Str::random(),
                'fullname'=>$row['ho_ten'],
                'date_of_birth'=> $this->formatDateExcel($row['ngay_sinh']),
                'cmnd'=>$row['cmnd'] ,
                'gender'=>$row['gioi_tinh'] ,
                'nation'=>$row['dan_toc'] ,
                'address'=>$row['dia_chi'] ,
                'isActive'=>'0',
            ]);
            
            $subject=explode( ', ', $row['mon_thi']);
            $subject_array=Subject::WhereIn('name',$subject)->get(['id'])->toArray();
            if($subject_array!=null){
                for($i=0;$i<count($subject_array);$i++){
                    $student->examSubject()->create([
                        'id_subject'=>$subject_array[$i]['id'],   
                    ]); 
                }
            }

            $school=School::whereName($row['truong'])->get(['id'])->toArray();
            $student->schoolList()->create([
                'id_school'=>$school[0]['id'],   
            ]); 
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }


}
