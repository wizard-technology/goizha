<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    public function courses()
    {
        return $this->hasMany(Courses::class, 'c_department','id');
    }
    public function students()
    {
        return $this->hasMany(Students::class, 's_department','id');
    }
}
