<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
