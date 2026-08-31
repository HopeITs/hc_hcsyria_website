<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class StudentEntry extends Model
{
    protected $table = 'student_entries';
    protected $dates = [
        'created_at', 'updated_at'
    ];
    public function getScheduleAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

}
