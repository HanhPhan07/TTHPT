<?php

namespace App\Services;

use App\Repositories\QuestionRepository;
use App\Repositories\SubjectRepository;
class QuestionService
{
    private $questionRepository;
    private $subjectRepository;
    public function __construct(QuestionRepository $questionRepository, SubjectRepository $subjectRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->subjectRepository = $subjectRepository;
    }
    public function getListQuestion()
    {
        return $this->questionRepository->getAll();
    }
    public function findQuestion($id){
        return $this->questionRepository->find($id);
    }
    public function findQuestionSubject($id){
        return $this->questionRepository->findQuestionSubject($id);
    }
    public function getAllSubject(){
        return $this->subjectRepository->getAll();
    }
    public function update($id, array $question){
        return $this->questionRepository->update($id, $question);
    }
}
