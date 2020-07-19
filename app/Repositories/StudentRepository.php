<?php

namespace App\Repositories;

use App\Models\Student;
use App\Models\SchoolList;
use Maatwebsite\Excel\Concerns\ToArray;

class StudentRepository  extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Student::class;
    }

    //lay dshs
    public function getAllYear(){
        return Student::whereYear('created_at',date('Y'))
                        ->get();
    }

    //trang thai
    public function changeExam($id){
        $student=Student::find($id);
        $student->isActive=!$student->isActive;
        $student->updated_at=now();
        $student->save();
        return $student->isActive;
    }

    public function setIsA($id, $param){
        $student=Student::find($id);
        $student->isActive=$param;
        $student->save();
    }

    //detail
    //pluck trích xuất một số giá trị nhất định từ bộ sưu tập
    public function findStudentSubject($id){
        return Student::find($id)->examSubject()->get()->pluck('id')->toArray();
    }

    public function findStudentSchool($id){
        return Student::find($id)->schoolList()->get();
    }

    //update
    //Phương thức sync chấp nhận 1 mảng ID để đưa vào bảng trung gian. Bất kì ID nào không ở trong mảng này sẽ bị xóa khỏi bảng trung gian
    public function update($id, array $attributes)
    {
        $att=[];
        $student = $this->find($id);
        if ($student) {
            $att['id_school']=$attributes['id_school'];
            $att['updated_at']=$attributes['updated_at']=now();
            $student->update($attributes);
            $student->schoolList()->update($att);
            $student->examSubject()->sync($attributes['subject_list'] );
            return $student;
        }
        return false;
    }

    //lấy môn thi và kết quả của đề thi
    public function fStuResultSubject($id){
        return Student::whereId($id)->with('result')->with('examList')->get() ;
    }


    //client
    //kt mon hoc sinh thi trung voi ngay thi hay k
    public function checksubject($id_subject,$id_stu_subject){
        $id_stu_subject=collect($id_stu_subject)->contains(function($value,$key) use($id_subject) {
            return $value == $id_subject ;
        });
        return $id_stu_subject ;
    }

    public function getListIDByIDSubject($id_subject)
    {
        // return Student::where
    }


}
