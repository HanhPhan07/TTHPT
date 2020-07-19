<?php

namespace App\Repositories;

use App\Models\SchoolList;

class SchoolListRepository  extends EloquentRepository 
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return SchoolList::class;
    }

    public function getIdSchool($id_student)
    {
        return SchoolList::whereId_student($id_student)->get(['id_school']);
    }

    
}