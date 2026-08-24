<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Success extends Model
{

    public function english()
    {
        return $this->hasOne('App\SuccessEnglish');
    }

    public function french()
    {
        return $this->hasOne('App\SuccessFrench');
    }

    /**
     * French copy, falling back to English when the item is not translated.
     * See App\Initiative::getFrenchFallbackAttribute() for the full rationale.
     */
    public function getFrenchFallbackAttribute()
    {
        return $this->getRelationValue('french') ?: $this->getRelationValue('english');
    }


    public function whatCategory() {
        return $this->belongsTo('App\WhatCategory', 'what_category_id');
    }

    public function whoCategory() {
        return $this->belongsTo('App\WhoCategory', 'who_category_id');
    }

    public function subWhatCategory()
    {
        return $this->belongsTo('App\SubWhatCategory', 'sub_what_category_id');
    }

    public function place() {
        return $this->belongsTo('App\Place', 'place_id');
    }

    public function center()
    {
        return $this->belongsTo('App\StudyzoneCenter','sz_center_id', 'id');
    }
}
