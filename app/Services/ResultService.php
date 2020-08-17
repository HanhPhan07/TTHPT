<?php

namespace App\Services;

use App\Repositories\ResultRepository;

class ResultService
{
    private $resultRepository;

    public function __construct(ResultRepository $resultRepository)
    {
        $this->resultRepository = $resultRepository;
    }

    public function storageResult(array $attributes){
        $this->resultRepository->create($attributes);
    }

    public function review($id_user,$id_exam){
        $this->resultRepository->review($id_user,$id_exam);
    }

    public function resultExam(){
        $this->resultRepository->resultExam();
    }

    public function resultCalculate(){
        $this->resultRepository->resultCalculate();
    }
}