<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'id', 'answer_correct', 'id_exam', 'id_user', 'mark',
    ];
    public function student() {
        return $this->belongsTo('App\Models\Student', 'id_user');
    }
}
