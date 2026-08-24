<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Splits the old two-state model into three.
 *
 * Until now anything offline was implicitly "pending to publish". A hidden row
 * is still offline, so every public query stays correct without being touched;
 * only the admin lists that select offline rows need to care about the flag.
 *
 *   online / MPE_Published | hidden | meaning
 *   -----------------------+--------+---------------------
 *   1 (or 1,2 projects)    |   0    | published
 *   0                      |   0    | pending to publish
 *   0                      |   1    | hidden
 */
return new class extends Migration
{
    /**
     * Each table with the state column that pairs with the new flag.
     */
    private array $tables = [
        'projects' => 'MPE_Published',
        'initiatives' => 'online',
        'news' => 'online',
    ];

    public function up(): void
    {
        foreach ($this->tables as $table => $stateColumn) {
            if (Schema::hasColumn($table, 'hidden')) {
                continue;
            }

            Schema::table($table, function (Blueprint $blueprint) use ($table, $stateColumn) {
                $blueprint->boolean('hidden')->default(0)->after($stateColumn);

                // Every pending and hidden lookup filters on both columns together.
                $blueprint->index([$stateColumn, 'hidden'], $table . '_state_hidden_index');
            });
        }
    }

    public function down(): void
    {
        foreach ($this->tables as $table => $stateColumn) {
            if (! Schema::hasColumn($table, 'hidden')) {
                continue;
            }

            Schema::table($table, function (Blueprint $blueprint) use ($table) {
                $blueprint->dropIndex($table . '_state_hidden_index');
                $blueprint->dropColumn('hidden');
            });
        }
    }
};
