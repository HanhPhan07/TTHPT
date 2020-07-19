<?php

namespace App\Services;
use App\Repositories\ScheduleRepository;
use App\Repositories\StudentRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\ExamRepository;

class HomeService
{
    private $scheduleRepository;
    private $studentRepository;
    private $subjectRepository;
    private $examRepository;

    public function __construct(
        ScheduleRepository $scheduleRepository,
        StudentRepository $studentRepository,
        SubjectRepository $subjectRepository,
        ExamRepository $examRepository
    )
    {
        $this->studentRepository = $studentRepository;
        $this->scheduleRepository = $scheduleRepository;
        $this->subjectRepository = $subjectRepository;
        $this->examRepository = $examRepository;
    }



    //client
    
    // public function getIdSubject(){
    //     return $this->scheduleRepository->getSubject();
    // }

    public function getIdSubject(){
        return $this->scheduleRepository->getIdSubject();
    }

    public function findStudent($id){
        return $this->studentRepository->find($id);  
    }

    public function getSubject($id){
        return $this->subjectRepository->findSubject($id);
    }

    //lay ra ma mon thi
    public function findStudentSubject($id){
        return $this->studentRepository->findStudentSubject($id);
    }

    //kiem tra xem hoc sinh co thi mon nay k
    public function checksubject($id_subject, $id_array){
        return $this->studentRepository->checksubject($id_subject, $id_array);
    }
    
    //tat ca mon thi hien ten cua hs
    public function findArraySubject($id){
        return $this->subjectRepository->findArraySubject($id);
    }
    

}