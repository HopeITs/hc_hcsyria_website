<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimonyFrench extends Model
{
    protected $table = 'testimonies_french';

    public function testimony()
    {
        return $this->belongsTo('App\Testimony');
    }

    public function testimonyEnglish()
    {
        return $this->belongsTo('App\TestimonyEnglish','testimony_id','testimony_id');
    }
}
