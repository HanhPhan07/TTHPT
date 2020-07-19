<?php

namespace App\Services;

use App\Repositories\SubjectRepository;

class SubjectService
{
    private $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function getListSubject()
    {
        return $this->subjectRepository->getAll();
    }

    public function addSub(array $subject){
        return $this->subjectRepository->create($subject);
    }
    public function deleteSub(int $id){
        return $this->subjectRepository->delete($id);
    }

    public function updateSub(int $id, array $subject){
        return $this->subjectRepository->update($id, $subject);
    }
    public function getSubjectTime(int $id)
    {
        return $this->subjectRepository->getSubjectTime($id);
    }
}
