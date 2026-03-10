<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhoCategory extends Model
{
    protected $table = 'who_categories';

    public function initiatives()
    {
        return $this->hasMany('App\Initiative', 'who_category_id')->with('english', 'french');
    }
}
