<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'rank', 'type', 'video', 'file', 'english_check',
        'date', 'priority_status', 'view_count'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tags', 'news_id', 'tag_id');
    }
    public function images()
    {
        return $this->hasMany(NewsImage::class, 'news_id')->orderBy('image_order');
    }

    public function firstImage(){
        return $this->hasOne(NewsImage::class, 'news_id')->orderBy('image_order');
    }

    public function ImagesRandom() {
        return $this->hasMany('App\Models\NewsImage')->orderBy('image_order');
    }

    public function english()
    {
        return $this->hasOne('App\NewsEnglish', 'news_id');
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
