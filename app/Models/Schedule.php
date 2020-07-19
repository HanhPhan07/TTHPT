<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable=[
        'id',
        'id_subject',
        'test_date',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'test_date',
    ];

    /**
     * Get the Schedule that owns the subject.
     */
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject','id_subject');
    }
}
