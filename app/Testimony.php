<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    public function initiativeEnglish()
    {
        return $this->belongsTo('App\InitiativeEnglish', 'initiative_id', 'initiative_id');
    }

    public function english()
    {
        return $this->hasOne('App\TestimonyEnglish');
    }

    public function french()
    {
        return $this->hasOne('App\TestimonyFrench');
    }

}
