<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolList extends Model
{
    const UPDATED_AT = 'updated_at';
    
    protected $table = 'school_list';
    
    protected $fillable = [
        'id', 'id_student', 'id_school',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function school()
    {
        return $this->belongsTo('App\Models\School','id_school');
    }

    public function student() {
        return $this->belongsTo('App\Models\Student', 'id_student');
    }
}


