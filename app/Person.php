<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'person';

//    public function microprojects()
//    {
//        return $this->belongsToMany('App\Models\MicroProjects');
//    }

    public function microprojects()
    {
        return $this->belongsToMany('App\Models\MicroProjects')->using('App\Models\Person_MicroProject');
    }
}
