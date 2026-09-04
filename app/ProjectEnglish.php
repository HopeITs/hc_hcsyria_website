<?php

namespace App;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class ProjectEnglish extends Model
{
    protected $table = 'projects_english';

    protected function mPESuffering(): Attribute
    {
        return Attribute::get(
            fn (?string $value): ?string => $value === null ? null : str_ireplace('Idleb', 'Idlib', $value),
        );
    }
}
