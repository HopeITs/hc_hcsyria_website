<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Offline and still waiting to be published.
     *
     * Hidden projects are offline too, so they have to be excluded explicitly
     * or they leak back into the dashboard's "pending to publish" lists.
     */
    public function scopePending($query)
    {
        return $query->where('MPE_Published', '0')->where('hidden', 0);
    }

    /**
     * Offline and deliberately parked, never to be published.
     */
    public function scopeHiddenOnly($query)
    {
        return $query->where('MPE_Published', '0')->where('hidden', 1);
    }

    public function firstImage(){
        return $this->hasOne('App\Image')->orderBy('image_order');
    }
    public function images()
    {
        return $this->hasMany('App\Image','project_id', 'id')->orderBy('image_order');
    }

    public function donor()
    {
        return $this->belongsTo('App\Donor','MPE_Donor', 'id');
    }

    public function english()
    {
        return $this->hasOne('App\ProjectEnglish','project_id', 'id');
    }

    public function french()
    {
        return $this->hasOne('App\ProjectFrench','project_id', 'id');
    }
    public function place()
    {
        return $this->belongsTo('App\Place','MPE_City', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\ProjectType','projecttype_id', 'id');
    }
    public function subtype()
    {
        return $this->belongsTo('App\ProjectSubType','projectsubtype_id', 'id');
    }
}
