<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MicroProject extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'microproject';

    public function persons()
    {
        return $this->belongsToMany('App\Models\Person', 'person_microproject'
            , 'MicroProject_ID', 'Person_ID');
    }
}
