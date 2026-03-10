<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopeProjectMedia extends Model
{
    use HasFactory;
    protected $table = 'hope_projects_media';
    protected $fillable = ['mediaType','mediaURL'];
}
