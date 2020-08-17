<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Exam_Subject;

class ExamSubjectRepository extends EloquentRepository{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Exam_Subject::class;
    }

    public function getIdStudentArray($id_subject)
    {
        return Exam_Subject::whereId_subject($id_subject)
                        ->get(['id_student'])
                        ->toArray();
    }
}
