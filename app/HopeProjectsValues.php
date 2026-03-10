<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HopeProjectsValues extends Pivot
{
    protected $table = 'hope_projects_hope_values';
}
