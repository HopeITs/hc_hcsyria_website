<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFrench extends Model
{
    protected $table = 'news_french';

    public function news()
    {
        return $this->belongsTo('App\News');
    }

    public function newsEnglish()
    {
        return $this->belongsTo('App\NewsEnglish','news_id','news_id');
    }

}
