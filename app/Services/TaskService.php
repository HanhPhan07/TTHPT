<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;
use App\Repositories\QuestionListRepository;
use App\Repositories\ExamRepository;
use App\Repositories\ExamListRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\StudentRepository;
use App\Repositories\TaskRepository;

class TaskService
{
    private $scheduleRepository;
    private $questionListRepository;
    private $examRepository;
    private $examListRepository;
    private $subjectRepository;
    private $studentRepository;
    private $taskRepository;


    public function __construct(
        ScheduleRepository $scheduleRepository,
        QuestionListRepository $questionListRepository,
        ExamRepository $examRepository,
        ExamListRepository $examListRepository,
        SubjectRepository $subjectRepository,
        StudentRepository $studentRepository,
        TaskRepository $taskRepository
    ){
        $this->scheduleRepository = $scheduleRepository;
        $this->questionListRepository = $questionListRepository;
        $this->examRepository = $examRepository;
        $this->examListRepository = $examListRepository;
        $this->subjectRepository = $subjectRepository;
        $this->studentRepository=$studentRepository;
        $this->taskRepository=$taskRepository;

    }

    public function getIdSubject(){
        return $this->scheduleRepository->getIdSubject();
    }

    public function getIdExamArray($id_subject){
        return $this->examRepository->getIdExamArray($id_subject);
    }

    public function getIdExam($id_student, $id_exam_array){
        return $this->examListRepository->getIdExam($id_student, $id_exam_array);
    }

    public function getQuestion($id_exam){
        return $this->questionListRepository->getListQuestion($id_exam);
    }

    public function getCountListQuestion($id_exam){
        return $this->questionListRepository->getCountListQuestion($id_exam);
    }

    public function getTimeSubject($id_subject){
        return $this->examRepository->getTimeSubject($id_subject);
    }


    public function findStudent($id){
        return $this->studentRepository->find($id);
    }

    public function getlistquestionbyidexam($id_exam){
        return $this->questionListRepository->get_list_question($id_exam);
    }

    public function luu(array $attributes){
        //dd($attributes);
        return $this->taskRepository->luu($attributes);
    }


    public function update_by_id_question($id, $selected){
        return $this->taskRepository->updatebyidques($id,$selected);
    }

    public function calculate(){
        return $this->taskRepository->calculate();
    }

    public function review($id_user,$id_exam){
        return $this->taskRepository->review($id_user,$id_exam);
    }

    public function doneExam(){
        return $this->taskRepository->doneExam();
    }

    // public function getQuestionwithtask($id_exam){
    //     return $this->questionListRepository->getListQuestionwithtask($id_exam);
    // }
}
