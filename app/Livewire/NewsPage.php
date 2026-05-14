<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;
use App\Edition;

class NewsPage extends Component
{
    public int $amount = 0;
    public bool $hasMore = true;

    public function loadMore()
    {
        $this->amount += 5;
    }

    public function render()
    {
        $pinnedNews = News::with(['english', 'place', 'images'])
            ->where('online', '1')
            ->where('priority_status', 2)
            ->orderBy('date', 'desc')
            ->first();

        $regularQuery = News::with(['english', 'place', 'images'])
            ->where('online', '1')
            ->where('priority_status', 0)
            ->orderBy('date', 'desc');

        $importantNews = News::with(['english', 'place', 'images'])
            ->where('online', '1')
            ->where('priority_status', 1)
            ->orderBy('date', 'desc')
            ->first();

        if (!$importantNews) {
            $importantNews = (clone $regularQuery)->first();
            if ($importantNews) {
                $regularQuery->where('id', '!=', $importantNews->id);
            }
        }

        $limit = 10 + $this->amount;
        $totalRegularCount = (clone $regularQuery)->count();
        $this->hasMore = $totalRegularCount > $limit;

        $allRegular = $regularQuery->take($limit)->get();

        $tickerNews = collect();
        if ($pinnedNews) $tickerNews->push($pinnedNews);
        if ($importantNews && !$tickerNews->contains('id', $importantNews->id)) {
            $tickerNews->push($importantNews);
        }
        $latestForTicker = News::with('english')
            ->where('online', '1')
            ->whereNotIn('id', $tickerNews->pluck('id'))
            ->orderBy('date', 'desc')
            ->take(5)
            ->get();
        $tickerNews = $tickerNews->merge($latestForTicker);

        $latestEdition = Edition::where('online', '1')->orderBy('id', 'desc')->first();

        return view('livewire.news-page', [
            'importantNews' => $importantNews,
            'pinnedNews'    => $pinnedNews,
            'firstRow'      => $allRegular->take(5),
            'remainingNews' => $allRegular->skip(5),
            'tickerNews'    => $tickerNews,
            'latestEdition' => $latestEdition,
        ]);
    }
}
