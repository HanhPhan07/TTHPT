<?php

namespace App\Services;

use App\Repositories\ExamListRepository;
use App\Repositories\ExamRepository;
use App\Repositories\StudentRepository;

class ExamListService
{
    private $examListRepository;
    private $examRepository;
    private $studentRepository;

    public function __construct(ExamListRepository $examListRepository, ExamRepository $examRepository,
                                StudentRepository $studentRepository)
    {
        $this->examListRepository = $examListRepository;
        $this->examRepository = $examRepository;
        $this->studentRepository = $studentRepository;
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
        var_dump($listIdExam);
        $listIdStudent = $this->studentRepository->getListIDByIDSubject($id_subject);
    }
}
