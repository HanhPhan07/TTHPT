<?php

namespace App\Repositories;

use App\Models\School;

class SchoolRepository  extends EloquentRepository 
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return School::class;
    }

    
}