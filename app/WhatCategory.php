<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatCategory extends Model
{
    protected $table = 'what_categories';
    protected $fillable = ['id', 'name', 'french_name'];

    public function initiatives()
    {
        return $this->hasMany('App\Initiative', 'what_category')->with('english', 'french', 'threeRandomImages');
    }

    public function subCategory()
    {
        return $this->hasMany('App\SubWhatCategory', 'what_category_id');
    }
    public function covers()
    {
        return $this->hasMany('App\Models\Cover', 'what_category_id');
    }

    public function content()
    {
        return $this->hasMany('App\HopeProjects', 'what_category_id');
    }
    public function partners()
    {
        return $this->hasMany('App\Models\ProjectDonor', 'what_category_id');
    }
}
