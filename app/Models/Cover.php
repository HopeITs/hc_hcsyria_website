<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    use HasFactory;
    protected $table = 'backgrounds';

    protected $fillable = ['what_category_id', 'image_path', 'image_order', 'caption'];
}
