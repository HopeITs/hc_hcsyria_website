<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Marks the backlog that was sitting in "pending to publish" but is never
 * going to be published. IDs supplied by the content team, August 2026.
 *
 * The `online = 0` guard means re-running this can never pull a published
 * item off the site, and rows already hidden are simply rewritten to hidden.
 */
return new class extends Migration
{
    private array $news = [
        1, 2, 3, 6, 7, 9, 10, 12, 13, 14, 15, 16, 19, 20, 23, 24, 25, 26,
        28, 29, 31, 32, 36, 39, 40, 43, 44, 46, 48, 50, 52, 56, 57, 58,
        60, 61, 72,
    ];

    private array $initiatives = [292, 356, 412];

    public function up(): void
    {
        DB::table('news')
            ->whereIn('id', $this->news)
            ->where('online', 0)
            ->update(['hidden' => 1]);

        DB::table('initiatives')
            ->whereIn('id', $this->initiatives)
            ->where('online', 0)
            ->update(['hidden' => 1]);
    }

    public function down(): void
    {
        DB::table('news')->whereIn('id', $this->news)->update(['hidden' => 0]);
        DB::table('initiatives')->whereIn('id', $this->initiatives)->update(['hidden' => 0]);
    }
};
