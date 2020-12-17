<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function exam()
    {
        return $this->hasMany(StaffExam::class, 'se_staff','id');
    }
}
