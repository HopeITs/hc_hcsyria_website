<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Person_MicroProject extends Pivot
{
    protected $connection = 'mysql2';
    protected $table = 'person_microproject';


}
