<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    protected $table = 'newsletter_subscribers';
    public $timestamps = true;
    protected $fillable = [
        'mail'
    ];
}
