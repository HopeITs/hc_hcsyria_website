<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitiativeFrench extends Model
{
    protected $table = 'initiatives_french';

    public function initiative()
    {
        return $this->belongsTo('App\Initiative');
    }

    public function initiativeEnglish()
    {
        return $this->belongsTo('App\InitiativeEnglish','initiative_id','initiative_id');
    }
}
