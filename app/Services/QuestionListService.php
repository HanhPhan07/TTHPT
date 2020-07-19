<?php

namespace App\Services;

use App\Repositories\QuestionListRepository;

class QuestionListService
{
    private $questionListRepository;

    public function __construct(QuestionListRepository $questionListRepository)
    {
        $this->questionListRepository = $questionListRepository;
    }

    public function getQuestionList()
    {
        return $this->questionListRepository->getAll();
    }
    public function getQuestionListById_exam($id)
    {
        return $this->questionListRepository->findById_exam($id);
    }
}
