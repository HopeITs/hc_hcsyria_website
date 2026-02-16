<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\HopeProjectMedia;
class HopeProjects extends Model
{
    protected $table = 'hope_projects';

    public function values()
    {
        return $this->belongsToMany('App\HopeValues', 'hope_projects_hope_values');
    }
    public function media()
    {
        return $this->hasMany(HopeProjectMedia::class, 'project_id')->orderBy('mediaOrder');
    }
}
