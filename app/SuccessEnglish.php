<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuccessEnglish extends Model
{
    protected $table = 'successes_english';

    public function success()
    {
        return $this->belongsTo('App\Success');
    }
}
