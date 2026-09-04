<?php

namespace App;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    protected function operation(): Attribute
    {
        return $this->idlibDisplayAttribute();
    }

    protected function previousData(): Attribute
    {
        return $this->idlibDisplayAttribute();
    }

    protected function currentData(): Attribute
    {
        return $this->idlibDisplayAttribute();
    }

    private function idlibDisplayAttribute(): Attribute
    {
        return Attribute::get(
            fn (?string $value): ?string => $value === null ? null : str_ireplace('Idleb', 'Idlib', $value),
        );
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
