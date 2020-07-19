<?php

namespace App\Services;

use App\Models\Exam;
use App\Repositories\ExamListRepository;
use App\Repositories\ExamRepository;
use App\Repositories\QuestionListRepository;
use App\Repositories\QuestionRepository;

class ExamService
{
    private $examRepository;
    private $questionRepository;
    private $questionListRepository;
    private $examListRepository;

    public function __construct(ExamRepository $examRepository,
                                QuestionRepository $questionRepository,
                                QuestionListRepository $questionListRepository,
                                ExamListRepository $examListRepository)
    {
        $this->examRepository = $examRepository;
        $this->questionRepository = $questionRepository;
        $this->questionListRepository = $questionListRepository;
        $this->examListRepository = $examListRepository;
    }


    public function getListExam()
    {
        return $this->examRepository->getListExam();
    }

    public function getExamList()
    {
        return $this->examRepository->getAll();
    }
    public function getExamTime($id_subject)
    {
        return $this->examRepository->getTimeSubject($id_subject);
    }
    public function createExam( $id_subject, $number){
        $this->examRepository->createExam($id_subject, $number);
        $id_exam=$this->examRepository->getLastID();
        $listIdQuestion = $this->questionRepository->getListID($id_subject);
        // $question_id = $listIdQuestion[array_rand($listIdQuestion,1)];
        // var_dump($question_id);
        $arrayQuestionId=array();
        for($i=0; $i<$number;){
            $question_id = $listIdQuestion[array_rand($listIdQuestion)];
            if(!in_array($question_id, $arrayQuestionId)){
                $arrayQuestionId[$i] = $question_id;
                $i++;
            }
        }
        // print_r($arrayQuestionId);
        // var_dump($arrayQuestionId);
        foreach($arrayQuestionId as $item){
            $key=key($item);
            $val=$item[$key];
            // print_r($val);
            $this->questionListRepository->createExamDetail($id_exam, $val);
        }
    }

    public function updateExam(int $id, array $exam){
        return $this->examRepository->update($id, $exam);
    }

    public function delete(int $id){
        $exam_list=$this->examListRepository->getIdExamListByIdExam($id);
        foreach($exam_list as $item){
            $key=key($item);
            $val=$item[$key];
            // print_r($val);
            $this->examListRepository->delete($val);
        }
        $questionList=$this->questionListRepository->getIdQuestionList($id);
        print_r($questionList);
        foreach($questionList as $item){
            $key=key($item);
            $val=$item[$key];
            //print_r($item);
            $this->questionListRepository->delete($val);
        }
        $this->examRepository->delete($id);
    }
}
