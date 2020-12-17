<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffExam extends Model
{
    public function year()
    {
        return $this->belongsTo(Years::class, 'se_academic_year');
    }
}
