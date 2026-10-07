<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Adds Région Sud as a partner so it shows in the "Our Partners" section of
 * the Who We Are page. Re-running is safe: the row is only inserted once.
 */
return new class extends Migration
{
    public function up(): void
    {
        if (DB::table('donors')->where('code', 'RS')->exists()) {
            return;
        }

        DB::table('donors')->insert([
            'name'     => 'Région Sud',
            'code'     => 'RS',
            'abb_name' => 'rs',
            'logo'     => '/images/logos/RS_Logo.svg',
            'is_micro' => 0,
            'rank'     => (int) DB::table('donors')->max('rank') + 1,
        ]);
    }

    public function down(): void
    {
        DB::table('donors')->where('code', 'RS')->delete();
    }
};
