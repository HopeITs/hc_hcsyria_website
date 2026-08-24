<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    protected $fillable = ['online'];

    /**
     * Offline and still waiting to be published.
     *
     * Hidden initiatives are offline too, so they have to be excluded
     * explicitly or they leak back into the "pending to publish" lists.
     */
    public function scopePending($query)
    {
        return $query->where('online', '0')->where('hidden', 0);
    }

    /**
     * Offline and deliberately parked, never to be published.
     */
    public function scopeHiddenOnly($query)
    {
        return $query->where('online', '0')->where('hidden', 1);
    }

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

    /**
     * French copy, falling back to English when the item is not translated.
     *
     * The public views resolve the active translation dynamically as
     * $initiative->$language. Pointing $language at this instead of 'french'
     * means an untranslated item renders English text rather than fataling on
     * a null relation, which is what took the French pages down.
     *
     * Deliberately separate from french() so anything checking ->french to
     * detect a missing translation keeps working unchanged.
     */
    public function getFrenchFallbackAttribute()
    {
        return $this->getRelationValue('french') ?: $this->getRelationValue('english');
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
