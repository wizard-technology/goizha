<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class degree2 extends Model
{
    public function report()
    {
        return $this->belongsTo(Report::class, 'dg_report_x2','id');
    }
}
