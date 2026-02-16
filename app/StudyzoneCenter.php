<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyzoneCenter extends Model
{
    protected $table = 'studyzonecenters';

    public function initiatives()
    {
        return $this->hasMany('App\Initiative');
    }
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

}
