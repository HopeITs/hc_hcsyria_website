<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HopeValues extends Model
{
    protected $table = 'hope_values';

    public function projects()
    {
        return $this->belongsToMany('App\HopeProjects', 'hope_projects');
    }
}
