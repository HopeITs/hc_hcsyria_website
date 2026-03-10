<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsEnglish extends Model
{
    protected $table = 'news_english';

    public function news()
    {
        return $this->belongsTo('App\News');
    }
}
