<?php

namespace App;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected function name(): Attribute
    {
        return Attribute::get(
            fn (?string $value): ?string => $value === null ? null : str_ireplace('Idleb', 'Idlib', $value),
        );
    }

    public function initiatives()
    {
        return $this->hasMany('App\Initiative');
    }

    public function successes()
    {
        return $this->hasMany('App\Success');
    }
}
