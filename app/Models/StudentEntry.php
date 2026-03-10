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

//    public function student()
//    {
//        return $this->belongsTo('App\Student');
//    }
//    public function center()
//    {
//        return $this->hasMany('App\StudyzoneCenter');
//    }
//    public function gender()
//    {
//        return $this->hasOneThrough('App\Student','gender_id');
//    }
//////////////////
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

//    public function gender()
//    {
//        return $this->hasManyThrough('App\Gender', 'App\Student','gender_id','student_id');
//    }
}
