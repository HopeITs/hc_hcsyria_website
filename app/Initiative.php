<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    protected $fillable = ['online'];

    public function images()
    {
        return $this->hasMany('App\InitiativeImage')->orderBy('image_order');
    }

    public function firstImage(){
        return $this->hasOne('App\InitiativeImage')->orderBy('image_order');
    }

    public function ImagesRandom() {
        return $this->hasMany('App\InitiativeImage')->orderBy('image_order');
    }

    public function imagesRehabilitation()
    {
        return $this->hasMany('App\InitiativeImageRehabilitation');
    }

    public function english()
    {
        return $this->hasOne('App\InitiativeEnglish');
    }

    public function french()
    {
        return $this->hasOne('App\InitiativeFrench');
    }

    public function whatCategory()
    {
        return $this->belongsTo('App\WhatCategory', 'what_category_id');
    }

    public function subWhatCategory()
    {
        return $this->belongsTo('App\SubWhatCategory', 'sub_what_category_id');
    }

    public function place()
    {
        return $this->belongsTo('App\Place', 'place_id');
    }

    public function center()
    {
        return $this->belongsTo('App\StudyzoneCenter','sz_center_id', 'id');
    }

    public function whoCategory()
    {
        return $this->belongsTo('App\WhoCategory', 'who_category_id');
    }

    public function donors()
    {
        return $this->belongsToMany('App\Donor', 'initiatives_donors');
    }

    public function testimonies()
    {
        return $this->hasMany('App\Testimony');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
