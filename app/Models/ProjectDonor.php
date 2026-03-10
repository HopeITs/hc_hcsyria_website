<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDonor extends Model
{
    use HasFactory;
    protected $table = 'projects_donors';
    public function donors()
    {
        return $this->belongsTo('App\Donor','donor_id', 'id');
    }
}
