<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function initiatives()
    {
        return $this->hasMany('App\Initiative');
    }

    public function successes()
    {
        return $this->hasMany('App\Success');
    }
}
