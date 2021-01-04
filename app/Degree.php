<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    public function degreex2()
    {
        return $this->hasOne(degree2::class, 'dg_x1', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Courses::class, 'dg_course', 'id');
    }
    public function student()
    {
        return $this->belongsTo(Students::class, 'dg_student', 'id');
    }
    public function report()
    {
        return $this->belongsTo(Report::class, 'dg_report_x1', 'id');
    }
    public function year()
    {
        return $this->belongsTo(Years::class, 'dg_year', 'id');
    }
}
