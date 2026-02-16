<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RootsOfHope extends Model
{
    use HasFactory;
    protected $table = 'rootsofhope';
    protected $fillable = ['online'];
}
