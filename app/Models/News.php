<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Illuminate\Support\Facades\Http;
use DateInterval;
use Exception;

class News extends Model
{
    public const NATIONAL_PLACE_ID = 0;

    protected $table = 'news';

    protected $fillable = [
        'rank', 'type', 'video', 'duration', 'file', 'english_check',
        'date', 'priority_status', 'view_count','total_views',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    protected static function booted()
    {
        static::saving(function ($news) {
            if ($news->isDirty('video') && !empty($news->video) && $news->video !== '0') {
                $duration = self::fetchYoutubeDuration($news->video);

                if ($duration) {
                    $news->duration = $duration;
                }
            }
        });
    }
    /**
     * Offline and still waiting to be published.
     *
     * Hidden news is offline too, so it has to be excluded explicitly or it
     * leaks back into the "pending to publish" lists.
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

    /**
     * Limit news to a user's assigned places while keeping Syria-wide news.
     *
     * The legacy places table stores the "Syria" option as the "All" place
     * with ID 0. It applies to every user, including users assigned only to
     * specific cities.
     */
    public function scopeForPlacesIncludingNational($query, array $placeIds)
    {
        return $query->whereIn('place_id', array_unique([
            ...$placeIds,
            self::NATIONAL_PLACE_ID,
        ]));
    }

    /**
     * The single Important article currently shown on the public news page.
     *
     * Offline drafts may also be marked Important, so priority_status alone
     * must never be used when deciding which article an online one replaces.
     */
    public function scopeOnlineImportant($query)
    {
        return $query->where('online', '1')->where('priority_status', 1);
    }

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

    /**
     * Reader facing name of the article's place.
     *
     * The legacy places table stores the Syria-wide option as the "All" place
     * (ID 0), which reads as a filter rather than a location, so every screen
     * that shows an article's place has to relabel it as "Syria".
     */
    public function getPlaceLabelAttribute()
    {
        $name = optional($this->place)->name;

        return ($name === null || $name === 'All') ? 'Syria' : $name;
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }

    public static function fetchYoutubeDuration($url)
    {
        $apiKey = config('services.youtube.key');
        if (empty($apiKey)) return null;

        $videoId = self::extractYoutubeId($url);
        if (!$videoId) return null;

        $response = Http::get("https://www.googleapis.com/youtube/v3/videos", [
            'id' => $videoId,
            'part' => 'contentDetails',
            'key' => $apiKey
        ]);

        if ($response->successful() && !empty($response->json('items'))) {
            $isoDuration = $response->json('items.0.contentDetails.duration');

            try {
                $interval = new DateInterval($isoDuration);
                return $interval->format('%H:%I:%S');
            } catch (Exception $e) {
                return null;
            }
        }

        return null;
    }

    private static function extractYoutubeId($url)
    {
        if (empty($url)) return null;

        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', trim($url))) {
            return trim($url);
        }

        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $url, $matches);

        return $matches[1] ?? null;
    }
}
