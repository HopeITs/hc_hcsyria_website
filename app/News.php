<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public function images()
    {
        return $this->hasMany('App\NewsImage')->orderBy('image_order');
    }

    public function firstImage(){
        return $this->hasOne('App\NewsImage')->orderBy('image_order');
    }

    public function ImagesRandom() {
        return $this->hasMany('App\NewsImage')->orderBy('image_order');
    }

    public function english()
    {
        return $this->hasOne('App\NewsEnglish');
    }

    public function french()
    {
        return $this->hasOne('App\NewsFrench');
    }

    public function whatCategory()
    {
        return $this->belongsTo('App\WhatCategory', 'what_category_id');
    }

    public function edition()
    {
        return $this->belongsTo('App\Edition', 'edition_id');
    }

    public function whoCategory()
    {
        return $this->belongsTo('App\WhoCategory', 'who_category_id');
    }

    public function place()
    {
        return $this->belongsTo('App\Place', 'place_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }

}
