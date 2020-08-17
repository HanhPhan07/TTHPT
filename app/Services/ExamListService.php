<?php

namespace App\Services;

use App\Repositories\ExamListRepository;
use App\Repositories\ExamRepository;
use App\Repositories\ExamSubjectRepository;
use App\Repositories\StudentRepository;

class ExamListService
{
    private $examListRepository;
    private $examRepository;
    private $studentRepository;
    private $examSubjectRepository;

    public function __construct(ExamListRepository $examListRepository, ExamRepository $examRepository,
                                StudentRepository $studentRepository, ExamSubjectRepository $examSubjectRepository)
    {
        $this->examListRepository = $examListRepository;
        $this->examRepository = $examRepository;
        $this->studentRepository = $studentRepository;
        $this->examSubjectRepository = $examSubjectRepository;;
    }

    // public function getExamList(){
    //     return $this->examListRepository->getAll();
    // }
    public function getExamList()
    {
        return $this->examListRepository->getListExam();
    }

    public function playexam($id_subject){

        $listIdExam = $this->examRepository->getIdExamArray($id_subject);
        // var_dump($listIdExam);
        // echo '-----------------------------------';
        $listIdStudent = $this->examSubjectRepository->getIdStudentArray($id_subject);
        // var_dump($listIdStudent);
        $firstIdStudent = $listIdStudent[0];
        // echo '================';
        // dd($firstIdStudent);
        $listIdExamofStudent = $this->examListRepository->getListIdExam($firstIdStudent);
        // echo'--------------------';
        // var_dump($listIdExamofStudent);
        //dd($listIdExam);
        $dem=0;
        // var_dump($listIdExamofStudent);
        foreach($listIdExam as $exam){
            $key=key($exam);
            $value=$exam[$key];
            // var_dump(in_array($exam, $listIdExamofStudent));
            if(in_array($value, $listIdExamofStudent)) $dem++;

        }
        if($dem==0){
            foreach($listIdStudent as $student){
                $key=key($student);
                $value = $student[$key];
                $exam=$listIdExam[array_rand($listIdExam)];
                $key1=key($exam);
                $value1 = $exam[$key1];
                $this->examListRepository->createExamList($value1, $value);
            }
            return true;
        }
        else return false;
    }
}
