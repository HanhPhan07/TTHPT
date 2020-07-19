<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;

class QuestionRepository  extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Question::class;
    }
    public function getListID($id_subject){
        return Question::where('id_subject', $id_subject)
                                ->get('id')
                                ->toArray();
    }

    public function findQuestionSubject($id){
        return Question::find($id)->get("id_subject");
    }
    public function update($id, array $attributes)
    {
        $att=[];
        $question= $this->find($id);
        if ($question) {
            $att['updated_at']=$attributes['updated_at']=now();
            $question->update($attributes);
            return $question;
        }
        return false;
    }
    public function getAll(){
        return Question::get([
            'id',
            'ans_1',
            'ans_2',
            'ans_3',
            'ans_4',
            'ans_correct',
            'id_subject',
            'question_content',
        ]);
    }







}
