<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubWhatCategory extends Model
{
    protected $table = 'sub_what_categories';

    public function category()
    {
        return $this->belongsTo('App\WhatCategory', 'what_category_id');
    }
}
