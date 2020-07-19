<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    const UPDATED_AT = null;

    protected $fillable = [
        'id', 'name','created_at'
    ];

    public function schoolList() {
        return $this->hasMany('App\Models\SchoolList', 'id_school');
    }
}
