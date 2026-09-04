<?php

namespace App;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class SuccessFrench extends Model
{
    protected $table = 'successes_french';

    protected function text(): Attribute
    {
        return Attribute::get(
            fn (?string $value): ?string => $value === null ? null : str_ireplace('Idleb', 'Idlib', $value),
        );
    }

    public function success()
    {
        return $this->belongsTo('App\Success');
    }

    public function successEnglish()
    {
        return $this->belongsTo('App\SuccessEnglish','success_id','success_id');
    }
}
