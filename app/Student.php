<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Student extends Model
{
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function place()
    {
        return $this->belongsTo('App\Place', 'place_id');
    }

    public function center()
    {
        return $this->belongsTo('App\StudyzoneCenter','sz_center_id', 'id');
    }

    public function street()
    {
        return $this->belongsTo('App\Models\Street','street_id', 'id');
    }
    public function educationlevel()
    {
        return $this->belongsTo('App\Models\EducationLevel','educationlevel_id', 'id');
    }
    public function educationfield()
    {
        return $this->belongsTo('App\Models\EducationField','educationfield_id', 'id');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    // ADDED IN SECOND EDIT

    public function sudententry()
    {
        return $this->hasMany('App\Models\StudentEntry');
    }

    public function getScheduleAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
