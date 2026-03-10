<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuccessFrench extends Model
{
    protected $table = 'successes_french';

    public function success()
    {
        return $this->belongsTo('App\Success');
    }

    public function successEnglish()
    {
        return $this->belongsTo('App\SuccessEnglish','success_id','success_id');
    }
}
