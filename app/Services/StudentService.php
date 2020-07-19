<?php

namespace App\Services;

use App\Repositories\StudentRepository;
use App\Repositories\SchoolListRepository;
use App\Repositories\SchoolRepository;
use App\Repositories\SubjectRepository;

class StudentService
{
    private $studentRepository;
    private $schoolListRepository;
    private $schoolRepository;
    private $subjectRepository;

    public function __construct(
        StudentRepository $studentRepository,
        SchoolListRepository $schoolListRepository,
        SchoolRepository $schoolRepository,
        SubjectRepository $subjectRepository
        )
    {
        $this->studentRepository = $studentRepository;
        $this->schoolListRepository = $schoolListRepository;
        $this->schoolRepository = $schoolRepository;
        $this->subjectRepository = $subjectRepository;
    }

   

    public function setIsA($id, $param){
        $this->studentRepository->setIsA($id,$param);
    }

    //lay toan bo dshs
    public function getListStudent()
    {
        return $this->studentRepository->getAllYear();
    }

    public function findStudent($id){
       return $this->studentRepository->find($id);     
    }

    //trang thái
    public function changeExam($id){
        return $this->studentRepository->changeExam($id);  
    }

    public function update($id, array $student){
        //dd($student);
        return $this->studentRepository->update($id, $student);  
    }

    //detail
    public function findStudentSubject($id){
        return $this->studentRepository->findStudentSubject($id);  
    }

    public function findStudentSchool($id){
        return $this->studentRepository->findStudentSchool($id);  
    }

    public function getAllSchool(){
        return $this->schoolRepository->getAll();  
    }

    public function getAllSubject(){
        return $this->subjectRepository->getAll();  
    }

    //lay hs vs môn thi và kq làm bài
    public function fStuResultSubject($id){
        return $this->studentRepository->fStuResultSubject($id);  
    }
    
}
