<?php

namespace Tests\Feature;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsImagesController;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class NewsImportantPublishingTest extends TestCase
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
            $table->unsignedTinyInteger('type')->default(3);
            $table->boolean('online')->default(false);
            $table->boolean('hidden')->default(false);
            $table->unsignedTinyInteger('priority_status')->default(0);
            $table->string('video')->default('0');
            $table->string('duration')->nullable();
            $table->timestamps();
        });

        Schema::create('news_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id');
            $table->string('path');
            $table->unsignedTinyInteger('sizetype')->default(0);
            $table->unsignedInteger('image_order')->nullable();
            $table->timestamps();
        });

        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category');
            $table->unsignedBigInteger('project_id');
            $table->string('operation');
            $table->unsignedBigInteger('user_id');
            $table->boolean('seen')->default(false);
            $table->text('previous_data')->nullable();
            $table->text('current_data')->nullable();
            $table->timestamps();
        });

        Auth::shouldReceive('user')->andReturn((object) ['id' => 1]);
    }

    public function test_marking_an_offline_draft_important_keeps_the_online_important_news(): void
    {
        $onlineImportant = $this->createNews(online: true, priorityStatus: 1);
        $offlineDraft = $this->createNews(online: false, priorityStatus: 0);

        $thumbnail = new NewsImage;
        $thumbnail->news_id = $offlineDraft->id;
        $thumbnail->path = '/images/news/test-thumbnail.jpg';
        $thumbnail->sizetype = 0;
        $thumbnail->save();

        $request = Request::create('/admin/news/images', 'POST', [
            'news_id' => $offlineDraft->id,
            'is_important' => '1',
        ]);

        app(NewsImagesController::class)->store($request);

        $this->assertSame(1, (int) $onlineImportant->fresh()->priority_status);
        $this->assertSame(1, (int) $offlineDraft->fresh()->priority_status);
        $this->assertSame(0, (int) $offlineDraft->fresh()->online);
    }

    public function test_publishing_an_important_draft_replaces_only_the_online_important_news(): void
    {
        $onlineImportant = $this->createNews(online: true, priorityStatus: 1);
        $otherOfflineImportant = $this->createNews(online: false, priorityStatus: 1);
        $draftToPublish = $this->createNews(online: false, priorityStatus: 1, hidden: true);

        $request = Request::create('/admin/news/online', 'POST', [
            'id' => $draftToPublish->id,
        ]);

        app(NewsController::class)->online($request);

        $this->assertSame(0, (int) $onlineImportant->fresh()->priority_status);
        $this->assertSame(1, (int) $onlineImportant->fresh()->online);
        $this->assertSame(1, (int) $otherOfflineImportant->fresh()->priority_status);
        $this->assertSame(0, (int) $otherOfflineImportant->fresh()->online);
        $this->assertSame(1, (int) $draftToPublish->fresh()->priority_status);
        $this->assertSame(1, (int) $draftToPublish->fresh()->online);
        $this->assertSame(0, (int) $draftToPublish->fresh()->hidden);
    }

    public function test_publishing_regular_news_does_not_change_the_online_important_news(): void
    {
        $onlineImportant = $this->createNews(online: true, priorityStatus: 1);
        $regularDraft = $this->createNews(online: false, priorityStatus: 0);

        $request = Request::create('/admin/news/online', 'POST', [
            'id' => $regularDraft->id,
        ]);

        app(NewsController::class)->online($request);

        $this->assertSame(1, (int) $onlineImportant->fresh()->priority_status);
        $this->assertSame(1, (int) $regularDraft->fresh()->online);
        $this->assertSame(0, (int) $regularDraft->fresh()->priority_status);
    }

    private function createNews(
        bool $online,
        int $priorityStatus,
        bool $hidden = false,
    ): News {
        $news = new News;
        $news->type = 3;
        $news->online = $online;
        $news->hidden = $hidden;
        $news->priority_status = $priorityStatus;
        $news->video = '0';
        $news->save();

        return $news;
    }
}
