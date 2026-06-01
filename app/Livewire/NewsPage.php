<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;
use App\Edition;
use App\Models\PageView;
use App\Models\Cover;
use App\Models\Tag;
use App\Place; 

class NewsPage extends Component
{
    public int $amount = 0;
    public bool $hasMore = true;
    public $carouselImages;
    public int $chunkSize = 5;

    // --- DRAFT FILTERS ---
    public $draftPlace = '';
    public $draftDateFrom = '';
    public $draftDateTo = '';
    public $draftTags = '';
    public $draftType = 'all'; 

    // --- APPLIED FILTERS ---
    public $appliedPlace = '';
    public $appliedDateFrom = '';
    public $appliedDateTo = '';
    public $appliedTags = '';
    public $appliedType = 'all';

    public function loadMore()
    {
        $this->amount += $this->chunkSize;
    }

    public function applyFilters()
    {
        $this->appliedPlace = $this->draftPlace;
        $this->appliedDateFrom = $this->draftDateFrom;
        $this->appliedDateTo = $this->draftDateTo;
        $this->appliedTags = $this->draftTags;
        $this->appliedType = $this->draftType;
        
        $this->amount = 0; 
    }

    public function clearFilters()
    {
        // 1. Strictly reset the backend state
        $this->draftPlace = '';
        $this->draftDateFrom = '';
        $this->draftDateTo = '';
        $this->draftTags = '';
        $this->draftType = 'all';

        $this->appliedPlace = '';
        $this->appliedDateFrom = '';
        $this->appliedDateTo = '';
        $this->appliedTags = '';
        $this->appliedType = 'all';

        $this->amount = 0;

        // 2. Dispatch event to FORCE the Alpine frontend to physically wipe the inputs
        $this->dispatch('filters-cleared'); 
    }

    private function buildNewsQuery($place, $dateFrom, $dateTo, $tag, $type)
    {
        $query = News::with(['english', 'place', 'images'])
            ->where('online', '1')
            ->where('priority_status', 0)
            ->orderBy('date', 'desc');

        if (!empty($place)) {
            $query->where('place_id', $place);
        }

        if (!empty($tag)) {
            $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tags.id', $tag);
            });
        }

        if (!empty($dateFrom)) {
            $query->whereDate('date', '>=', $dateFrom);
        }

        if (!empty($dateTo)) {
            $query->whereDate('date', '<=', $dateTo);
        }

        // --- STRICT NEWS TYPE LOGIC ---
        if ($type === 'article') {
            $query->where(function ($q) {
                $q->whereNull('duration')->orWhere('duration', '');
            });
        } elseif ($type === 'video') {
            $query->whereNotNull('duration')->where('duration', '!=', '');
        } elseif ($type === 'article_video') {
            $query->whereNotNull('duration')->where('duration', '!=', '');
            $query->whereHas('english', function ($q) {
                $q->whereNotNull('content')->where('content', '!=', '');
            });
        }

        return $query;
    }

    public function render()
    {
        $this->carouselImages = Cover::where('what_category_id', 40)->orderBy('image_order', 'asc')->get();
        $places = Place::all();
        $tags = Tag::all(); 
        
        $baseLimit = $this->chunkSize * 2;
        $regularLimit = $baseLimit + $this->amount;
        $pinnedLimit = intval(($regularLimit / $this->chunkSize) - 1);

        $pinnedQuery = News::with(['english', 'place', 'images'])
            ->where('online', '1')
            ->where('priority_status', 2)
            ->orderBy('date', 'desc');

        $importantNews = News::with(['english', 'place', 'images'])
            ->where('online', '1')
            ->where('priority_status', 1)
            ->orderBy('date', 'desc')
            ->first();

        if (!$importantNews) {
            $importantNews = clone News::where('online', '1')
                ->where('priority_status', 0)
                ->orderBy('date', 'desc')
                ->first();
        }

        $previewQuery = $this->buildNewsQuery($this->draftPlace, $this->draftDateFrom, $this->draftDateTo, $this->draftTags, $this->draftType);
        if ($importantNews) {
            $previewQuery->where('id', '!=', $importantNews->id);
        }
        $previewCount = $previewQuery->count();

        $regularQuery = $this->buildNewsQuery($this->appliedPlace, $this->appliedDateFrom, $this->appliedDateTo, $this->appliedTags, $this->appliedType);
        if ($importantNews) {
            $regularQuery->where('id', '!=', $importantNews->id);
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
            'places'        => $places, 
            'tags'          => $tags, 
            'previewCount'  => $previewCount, 
        ]);
    }
}