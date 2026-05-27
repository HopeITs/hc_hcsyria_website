<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;
use App\Edition;
use App\Models\PageView;
use App\Models\Cover;

class NewsPage extends Component
{
    public int $amount = 0;
    public bool $hasMore = true;
    public $carouselImages;

    public int $chunkSize = 5;
    public function loadMore()
    {
        $this->amount += $this->chunkSize;
    }

    public function render()
    {
        $this->carouselImages = Cover::where('what_category_id', 40)->orderBy('image_order', 'asc')->get();

        $baseLimit = $this->chunkSize * 2;
        $regularLimit = $baseLimit + $this->amount;

        $pinnedLimit = intval(($regularLimit / $this->chunkSize) - 1);

        $pinnedQuery = News::with(['english', 'place', 'images'])
            ->where('online', '1')
            ->where('priority_status', 2)
            ->orderBy('date', 'desc');

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

        $totalRegularCount = (clone $regularQuery)->count();
        $totalPinnedCount = (clone $pinnedQuery)->count();

        $this->hasMore = ($totalRegularCount > $regularLimit) || ($totalPinnedCount > $pinnedLimit);

        $allRegular = $regularQuery->take($regularLimit)->get();
        $allPinned = $pinnedQuery->take($pinnedLimit)->get();

        $tickerNews = collect();
        $firstPinned = $allPinned->first();
        if ($firstPinned) $tickerNews->push($firstPinned);

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

        $tracker = PageView::where('page_name', 'news')->first();
        $currentViews = $tracker ? $tracker->views : 0;

        return view('livewire.news-page', [
            'importantNews' => $importantNews,
            'pinnedNews'    => $allPinned,
            'regularNews'   => $allRegular,
            'tickerNews'    => $tickerNews,
            'latestEdition' => $latestEdition,
            'pageViews'     => $currentViews,
        ]);
    }
}
