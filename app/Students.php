<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    public function year()
    {
        return $this->belongsTo(Years::class, 's_academic_year');
    }
    public function department()
    {
        return $this->belongsTo(Departments::class, 's_department');
    }
    public function degreex1()
    {
        return $this->hasOne(Degree::class, 'dg_student','id');
    }
    public function degreeAll()
    {
        return $this->hasMany(Degree::class, 'dg_student','id');
    }
}
