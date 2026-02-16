<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFrench extends Model
{
    protected $table = 'projects_french';

    public function project()
    {
        return $this->belongsTo('App\Project','project_id','id');
    }

    public function projectEnglish()
    {
        return $this->belongsTo('App\ProjectEnglish','project_id','project_id');
    }

}
