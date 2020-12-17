<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public function department()
    {
        return $this->belongsTo(Departments::class, 'c_department');
    }
}
