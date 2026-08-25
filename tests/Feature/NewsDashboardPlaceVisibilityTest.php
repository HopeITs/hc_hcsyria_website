<?php

namespace Tests\Feature;

use App\Models\News;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class NewsDashboardPlaceVisibilityTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
            'foreign_key_constraints' => true,
        ]);

        DB::purge('sqlite');
        DB::setDefaultConnection('sqlite');

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('place_id');
            $table->boolean('online')->default(false);
            $table->boolean('hidden')->default(false);
            $table->boolean('english_check')->default(false);
            $table->timestamps();
        });
    }

    public function test_place_scoped_pending_lists_include_syria_wide_news(): void
    {
        $nationalPublish = $this->createNews(placeId: 0, englishChecked: true);
        $nationalEnglishCheck = $this->createNews(placeId: 0, englishChecked: false);
        $assignedPlace = $this->createNews(placeId: 1, englishChecked: true);
        $otherPlace = $this->createNews(placeId: 2, englishChecked: true);
        $hiddenNational = $this->createNews(placeId: 0, englishChecked: true, hidden: true);

        $publishIds = News::pending()
            ->forPlacesIncludingNational([1])
            ->where('english_check', 1)
            ->pluck('id');

        $englishCheckIds = News::pending()
            ->forPlacesIncludingNational([1])
            ->where('english_check', 0)
            ->pluck('id');

        $this->assertEqualsCanonicalizing(
            [$nationalPublish->id, $assignedPlace->id],
            $publishIds->all(),
        );
        $this->assertSame([$nationalEnglishCheck->id], $englishCheckIds->all());
        $this->assertNotContains($otherPlace->id, $publishIds);
        $this->assertNotContains($hiddenNational->id, $publishIds);
    }

    private function createNews(int $placeId, bool $englishChecked, bool $hidden = false): News
    {
        $news = new News;
        $news->place_id = $placeId;
        $news->online = false;
        $news->hidden = $hidden;
        $news->english_check = $englishChecked;
        $news->save();

        return $news;
    }
}
