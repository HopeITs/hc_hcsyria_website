<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Ville de Paris partner now uses "Ville de Paris.svg".
 */
return new class extends Migration
{
    public function up(): void
    {
        DB::table('donors')
            ->where('logo', '/images/logos/ville-de-paris.svg')
            ->update(['logo' => '/images/logos/Ville de Paris.svg']);
    }

    public function down(): void
    {
        DB::table('donors')
            ->where('logo', '/images/logos/Ville de Paris.svg')
            ->update(['logo' => '/images/logos/ville-de-paris.svg']);
    }
};
