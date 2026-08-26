<?php

namespace Tests\Feature;

use App\Models\News;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class NewsPlaceLabelTest extends TestCase
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
            $table->timestamps();
        });

        Schema::create('places', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('name');
        });

        DB::table('places')->insert([
            ['id' => 0, 'name' => 'All'],
            ['id' => 1, 'name' => 'Homs'],
        ]);
    }

    public function test_syria_wide_news_is_labelled_syria_instead_of_all(): void
    {
        $this->assertSame('Syria', $this->createNews(News::NATIONAL_PLACE_ID)->place_label);
    }

    public function test_city_news_keeps_its_own_place_name(): void
    {
        $this->assertSame('Homs', $this->createNews(1)->place_label);
    }

    public function test_news_with_an_unknown_place_falls_back_to_syria(): void
    {
        $this->assertSame('Syria', $this->createNews(99)->place_label);
    }

    private function createNews(int $placeId): News
    {
        $news = new News;
        $news->place_id = $placeId;
        $news->save();

        return $news->fresh();
    }
}
