<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\News;
use Illuminate\Support\Facades\Http;
use DateInterval;

class FetchYoutubeDurations extends Command
{
    protected $signature = 'news:fetch-durations';
    protected $description = 'Fetch and backfill missing YouTube durations for video news articles';

    public function handle()
    {
        $videos = News::whereNotNull('video')
            ->where('video', '!=', '0')
            ->where('video', '!=', '')
            ->where(function($query) {
                $query->whereNull('duration')
                    ->orWhere('duration', '')
                    ->orWhere('duration', '00:00:00');
            })->get();

        $this->info("Found {$videos->count()} valid videos missing durations.");

        $apiKey = config('services.youtube.key');

        if (empty($apiKey)) {
            $this->error("YOUTUBE_API_KEY is missing from your .env file!");
            return;
        }

        foreach ($videos as $news) {
            $videoId = $this->extractYoutubeId($news->video);

            if (!$videoId) {
                $this->warn("Could not extract ID for News ID: {$news->id} | Column value: " . \Illuminate\Support\Str::limit($news->video, 30));
                continue;
            }

            $response = Http::get("https://www.googleapis.com/youtube/v3/videos", [
                'id' => $videoId,
                'part' => 'contentDetails',
                'key' => $apiKey
            ]);

            if ($response->successful() && !empty($response->json('items'))) {
                $isoDuration = $response->json('items.0.contentDetails.duration');
                $interval = new DateInterval($isoDuration);

                $formattedDuration = $interval->format('%H:%I:%S');

                $news->duration = $formattedDuration;
                $news->save();
                $this->info("Updated News ID {$news->id} with duration: {$formattedDuration}");

            } elseif ($response->successful() && empty($response->json('items'))) {
                $this->warn("Video not found on YouTube (Private or Deleted) for News ID {$news->id}. Extracted ID: {$videoId}");
            } else {
                $errorMessage = $response->json('error.message', 'Unknown YouTube API Error');
                $this->error("API Error for News ID {$news->id}: {$errorMessage}");
            }
        }

        $this->info('Duration backfill complete!');
    }

    private function extractYoutubeId($url)
    {
        if (empty($url)) return null;

        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', trim($url))) {
            return trim($url);
        }

        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $url, $matches);

        return $matches[1] ?? null;
    }
}
