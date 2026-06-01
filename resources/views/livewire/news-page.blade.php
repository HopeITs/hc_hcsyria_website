<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        .filter-title { font-size: 0.75rem; font-weight: 700; color: #495057; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.6rem; display: block; }
        
        .filter-input-group { position: relative; background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 8px; transition: all 0.2s ease-in-out; }
        .filter-input-group.ring-focus { border-color: #c21a22; box-shadow: 0 0 0 3px rgba(194, 26, 34, 0.15); background: #fff; z-index: 10; }
        
        .filter-input { border: none; background: transparent; padding: 0.75rem 1rem; font-size: 0.95rem; width: 100%; border-radius: 8px; color: #333; outline: none !important; box-shadow: none !important; cursor: pointer; }
        .filter-input:focus { outline: none; box-shadow: none; }

        /* --- CUSTOM PRESTIGE DROPDOWNS --- */
        .custom-dropdown-btn { width: 100%; text-align: left; background: transparent; border: none; padding: 0.75rem 1rem; font-size: 0.95rem; color: #333; display: flex; justify-content: space-between; align-items: center; border-radius: 8px; cursor: pointer; }
        .custom-dropdown-btn:focus { outline: none; }
        
        .custom-dropdown-menu { position: absolute; top: calc(100% + 6px); left: 0; width: 100%; background: #ffffff; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.12); border: 1px solid #e9ecef; z-index: 1000; max-height: 260px; overflow-y: auto; padding: 0.5rem 0; }
        .custom-dropdown-item { padding: 0.6rem 1.2rem; cursor: pointer; font-size: 0.95rem; color: #495057; transition: all 0.15s ease; display: flex; align-items: center; justify-content: space-between; }
        .custom-dropdown-item:hover { background: #f8f9fa; color: #c21a22; padding-left: 1.5rem; }
        .custom-dropdown-item.active { background: #fff5f6; color: #c21a22; font-weight: 600; border-left: 3px solid #c21a22; padding-left: calc(1.2rem - 3px); }
        
        /* Dropdown Scrollbar Customize */
        .custom-dropdown-menu::-webkit-scrollbar { width: 6px; }
        .custom-dropdown-menu::-webkit-scrollbar-track { background: transparent; }
        .custom-dropdown-menu::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 10px; }
        
        .dropdown-chevron { transition: transform 0.2s ease; stroke: #adb5bd; }
        .dropdown-chevron.open { transform: rotate(180deg); stroke: #c21a22; }

        /* --- HEADER FILTER BUTTON --- */
        .btn-header-filter { background: transparent; color: #ffffff; border: none; display: flex; align-items: center; justify-content: center; padding: 0.5rem; transition: transform 0.2s ease, opacity 0.2s ease; cursor: pointer; opacity: 0.85; }
        .btn-header-filter:hover { transform: scale(1.1); opacity: 1; color: #ffffff; }

        .dynamic-news-wrapper { transition: opacity 0.3s; min-height: 300px; }
        .is-filtering { opacity: 0.4; pointer-events: none; }
        .flatpickr-day.selected { background: #c21a22 !important; border-color: #c21a22 !important; }
    </style>

    <div class="custom-container mt-custom"
         x-data="{
        timer: null,
        checkSize() {
            let w = window.innerWidth;
            let size = 5;
            if (w < 480) { size = 4; } else if (w < 992) { size = 6; }
            if ($wire.chunkSize !== size) { $wire.set('chunkSize', size); }
        }
     }"
         x-init="
        checkSize();
        window.addEventListener('resize', () => {
            clearTimeout(timer);
            timer = setTimeout(() => checkSize(), 50);
        });
     ">
        <div class="row mx-0 mb-3">
            <div class="col-12 p-0">
                <div class="d-flex justify-content-center align-items-center position-relative bg-primary-red text-white py-3">
                    <h1 class="m-0 text-uppercase news-header-title">OUR NEWS</h1>
                    
                    <button type="button" class="btn-header-filter position-absolute end-0 me-3 me-md-4" data-bs-toggle="modal" data-bs-target="#newsFilterModal" aria-label="Filter News">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-0 mb-3 mx-0">
            <div class="col-12">
                @php
                    $dynamicHeader = $carouselImages->first()
                        ? $carouselImages->first()->image_path
                        : asset('images/our-news/header-image.jpg');
                @endphp
                <div class="hero-image-container">
                    <img src="{{ $dynamicHeader }}" class="hero-main-img" alt="Header">
                    @if(!empty($carouselImages) && $carouselImages->first() && !empty($carouselImages->first()->caption))
                        <div class="hero-top-info pe-none">{{ $carouselImages->first()->caption }}</div>
                    @endif
                    <div class="hero-timestamp pe-none" id="current-timestamp"></div>
                </div>

                <div class="hero-caption-bar">
                    <div class="ticker-mask">
                        <div class="ticker-wrapper">
                            <div class="ticker-content">
                                @foreach($tickerNews as $ticker)
                                    @if($ticker)
                                        @php
                                            $tickerCity = (isset($ticker->place->name) && $ticker->place->name !== 'All') ? $ticker->place->name : 'Syria';
                                            $tickerDate = $ticker->date ? \Carbon\Carbon::parse($ticker->date)->format('Ymd') : '00000000';
                                        @endphp
                                        <a href="{{ route('new.public.article', ['id' => $ticker->id, 'city' => Illuminate\Support\Str::slug(strtolower($tickerCity)), 'date' => $tickerDate]) }}" target="_blank" rel="noopener noreferrer" class="ticker-item">
                                            {{ $ticker->english->title ?? 'New Update' }}
                                            <img src="{{ asset('images/our-news/logo/001HC_Logomini.svg') }}" class="news-separator" alt="logo">
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid-5-columns mb-3">
            <div class="span-3 span-tablet-2">
                @if($importantNews)
                    @php
                        $importantImg = $importantNews->images->where('sizetype', 1)->first() ?? $importantNews->images->first();
                        $imgPath = $importantImg ? asset($importantImg->path) : 'https://picsum.photos/seed/important/800/500';
                        $dateMeta = $importantNews->date ? \Carbon\Carbon::parse($importantNews->date)->format('d/m/Y') : '';
                        $urlDate = $importantNews->date ? \Carbon\Carbon::parse($importantNews->date)->format('Ymd') : '00000000';
                        $place = (isset($importantNews->place->name) && $importantNews->place->name !== 'All') ? $importantNews->place->name : 'Syria';
                        $fullContent = $importantNews->english->content ?? '';
                        $cleanContent = strip_tags($fullContent);
                    @endphp
                    <a href="{{ route('new.public.article', ['id' => $importantNews->id, 'city' => Illuminate\Support\Str::slug(strtolower($place)), 'date' => $urlDate]) }}" target="_blank" rel="noopener noreferrer" class="news-card ratio-3-2 h-100">
                        @if(!empty($importantNews->duration))
                            <div class="video-duration-badge">
                                <svg viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                                {{ \Carbon\Carbon::parse($importantNews->duration)->format(str_starts_with($importantNews->duration, '00:') ? 'i:s' : 'H:i:s') }}
                            </div>
                        @endif
                        <img src="{{ $imgPath }}" alt="{{ $importantNews->english->title ?? 'News' }}">
                        <div class="news-overlay">
                            <span class="news-meta">{{ $dateMeta }} - {{ $place }}</span>
                            <h2 class="news-title large-title">{{ $importantNews->english->title ?? '' }}</h2>
                            <p class="news-content important-content-clamp">
                                @php
                                    $words = explode(' ', $cleanContent);
                                    $totalWords = count($words);
                                    if ($totalWords > 18) { array_splice($words, 18, 0, '<br>'); }
                                    $finalWords = array_slice($words, 0, 37);
                                    echo implode(' ', $finalWords) . ($totalWords > 36 ? '...' : '');
                                @endphp
                            </p>
                        </div>
                    </a>
                @endif
            </div>

            <div class="span-2 span-tablet-2">
                @if($latestEdition)
                    <a href="/rootsofhope" class="magazine-link">
                        <img src="{{ asset('images/our-news/roots-of-hope-magazine.png') }}" alt="Roots of Hope Magazine" class="magazine-img">
                    </a>
                @endif
            </div>
        </div>

        <div class="modal fade" id="newsFilterModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content shadow-lg border-0" style="border-radius: 16px;">
                    <div class="modal-header border-bottom-0 pb-0 pt-4 px-4 px-md-5 d-flex justify-content-between align-items-center">
                        <h4 class="modal-title fw-bold text-dark mb-0">Filter News</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="box-shadow: none;"></button>
                    </div>
                    
                    <div class="modal-body p-4 p-md-5">
                        
                        <div class="row g-4" 
                             x-data="{
                                 placeOpen: false,
                                 tagOpen: false,
                                 typeOpen: false,
                                 placeName: 'All Locations...',
                                 tagName: 'All Tags...',
                                 typeName: 'All News',
                                 init() {
                                     flatpickr(this.$refs.dateFrom, {
                                         dateFormat: 'Y-m-d',
                                         onChange: (selectedDates, dateStr) => { $wire.set('draftDateFrom', dateStr); }
                                     });
                                     flatpickr(this.$refs.dateTo, {
                                         dateFormat: 'Y-m-d',
                                         onChange: (selectedDates, dateStr) => { $wire.set('draftDateTo', dateStr); }
                                     });
                                 },
                                 clearAll() {
                                     this.placeName = 'All Locations...';
                                     this.tagName = 'All Tags...';
                                     this.typeName = 'All News';
                                     if(this.$refs.dateFrom._flatpickr) this.$refs.dateFrom._flatpickr.clear();
                                     if(this.$refs.dateTo._flatpickr) this.$refs.dateTo._flatpickr.clear();
                                 }
                             }"
                             x-init="init()"
                             @filters-cleared.window="clearAll()">
                            
                            <div class="col-12 col-md-6">
                                <label class="filter-title">Location</label>
                                <div class="filter-input-group" @click.away="placeOpen = false" :class="placeOpen ? 'ring-focus' : ''">
                                    <button type="button" class="custom-dropdown-btn" @click="placeOpen = !placeOpen">
                                        <span x-text="placeName" :class="$wire.draftPlace === '' ? 'text-muted' : 'text-dark fw-semibold'"></span>
                                        <svg class="dropdown-chevron" :class="placeOpen ? 'open' : ''" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    
                                    <div class="custom-dropdown-menu" x-show="placeOpen" x-transition.opacity.duration.100ms style="display: none;">
                                        <div class="custom-dropdown-item" :class="$wire.draftPlace === '' ? 'active' : ''" @click="$wire.set('draftPlace', ''); placeName = 'All Locations...'; placeOpen = false">All Locations...</div>
                                        @foreach($places as $place)
                                            @php $pName = $place->name == 'All' ? 'Syria' : $place->name; @endphp
                                            <div class="custom-dropdown-item" :class="$wire.draftPlace == '{{ $place->id }}' ? 'active' : ''" @click="$wire.set('draftPlace', '{{ $place->id }}'); placeName = '{{ addslashes($pName) }}'; placeOpen = false">
                                                {{ $pName }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="filter-title">Tags</label>
                                <div class="filter-input-group" @click.away="tagOpen = false" :class="tagOpen ? 'ring-focus' : ''">
                                    <button type="button" class="custom-dropdown-btn" @click="tagOpen = !tagOpen">
                                        <span x-text="tagName" :class="$wire.draftTags === '' ? 'text-muted' : 'text-dark fw-semibold'"></span>
                                        <svg class="dropdown-chevron" :class="tagOpen ? 'open' : ''" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    
                                    <div class="custom-dropdown-menu" x-show="tagOpen" x-transition.opacity.duration.100ms style="display: none;">
                                        <div class="custom-dropdown-item" :class="$wire.draftTags === '' ? 'active' : ''" @click="$wire.set('draftTags', ''); tagName = 'All Tags...'; tagOpen = false">All Tags...</div>
                                        @foreach($tags as $tag)
                                            <div class="custom-dropdown-item" :class="$wire.draftTags == '{{ $tag->id }}' ? 'active' : ''" @click="$wire.set('draftTags', '{{ $tag->id }}'); tagName = '{{ addslashes($tag->name) }}'; tagOpen = false">
                                                {{ $tag->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="filter-title">Date Range</label>
                                <div class="d-flex align-items-center gap-2" wire:ignore>
                                    <div class="filter-input-group w-50">
                                        <input type="text" x-ref="dateFrom" class="filter-input text-center text-dark fw-semibold" placeholder="From..." readonly>
                                    </div>
                                    <span class="text-muted fw-bold">-</span>
                                    <div class="filter-input-group w-50">
                                        <input type="text" x-ref="dateTo" class="filter-input text-center text-dark fw-semibold" placeholder="To..." readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="filter-title">News Type</label>
                                <div class="filter-input-group" @click.away="typeOpen = false" :class="typeOpen ? 'ring-focus' : ''">
                                    <button type="button" class="custom-dropdown-btn" @click="typeOpen = !typeOpen">
                                        <span x-text="typeName" :class="$wire.draftType === 'all' ? 'text-muted' : 'text-dark fw-semibold'"></span>
                                        <svg class="dropdown-chevron" :class="typeOpen ? 'open' : ''" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    
                                    <div class="custom-dropdown-menu" x-show="typeOpen" x-transition.opacity.duration.100ms style="display: none;">
                                        <div class="custom-dropdown-item" :class="$wire.draftType === 'all' ? 'active' : ''" @click="$wire.set('draftType', 'all'); typeName = 'All News'; typeOpen = false">All News</div>
                                        <div class="custom-dropdown-item" :class="$wire.draftType === 'article' ? 'active' : ''" @click="$wire.set('draftType', 'article'); typeName = 'Article News'; typeOpen = false">Article News</div>
                                        <div class="custom-dropdown-item" :class="$wire.draftType === 'video' ? 'active' : ''" @click="$wire.set('draftType', 'video'); typeName = 'Video News'; typeOpen = false">Video News</div>
                                        <div class="custom-dropdown-item" :class="$wire.draftType === 'article_video' ? 'active' : ''" @click="$wire.set('draftType', 'article_video'); typeName = 'Article News with Video'; typeOpen = false">Article News with Video</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="modal-footer border-top-0 bg-white d-flex justify-content-between pt-0 pb-4 px-4 px-md-5">
                        <button type="button" style="background-color: #f1f3f5; color: #495057; border: 1px solid #dee2e6; font-weight: 600; border-radius: 8px; padding: 0.6rem 1.5rem; transition: all 0.2s;" wire:click="clearFilters">
                            Clear All Filters
                        </button>
                        
                        <button type="button" style="background-color: #c21a22; color: #ffffff; font-weight: 600; border: none; border-radius: 8px; padding: 0.6rem 1.5rem; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(194, 26, 34, 0.2); gap: 0.5rem; transition: all 0.2s;" data-bs-dismiss="modal" wire:click="applyFilters">
                            Apply & View Results 
                            <span wire:loading.remove wire:target="draftPlace, draftDateFrom, draftDateTo, draftTags, draftType" class="badge bg-white text-danger ms-1">{{ $previewCount }}</span>
                            <span wire:loading wire:target="draftPlace, draftDateFrom, draftDateTo, draftTags, draftType" class="spinner-border spinner-border-sm ms-1" role="status"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="dynamic-news-wrapper" wire:loading.class="is-filtering" wire:target="applyFilters">
            @if($regularNews->isEmpty())
                <div class="text-center py-5 text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#dee2e6" class="mb-3" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    <h3 class="fw-bold text-dark">No news found matching your filters.</h3>
                    <p>Try clearing your filters or adjusting the search.</p>
                </div>
            @endif

            @php
                $regularChunks = $regularNews->chunk($this->chunkSize);
            @endphp
            @foreach($regularChunks as $index => $chunk)
                <div class="grid-adaptive-row">
                    @foreach($chunk as $news)
                        @php
                            $thumbImg = $news->images->where('sizetype', 0)->first() ?? $news->images->first();
                            if ($thumbImg && file_exists(public_path($thumbImg->path))) {
                                $imgPath = asset($thumbImg->path);
                            } else {
                                $imgPath = 'https://picsum.photos/seed/'.$news->id.'/400/400';
                            }
                            $dateMeta = $news->date ? \Carbon\Carbon::parse($news->date)->format('d/m/Y') : '';
                            $urlDate = $news->date ? \Carbon\Carbon::parse($news->date)->format('Ymd') : '00000000';
                            $place = (isset($news->place->name) && $news->place->name !== 'All') ? $news->place->name : 'Syria';
                        @endphp
                        <a href="{{ route('new.public.article', ['id' => $news->id, 'city' => Illuminate\Support\Str::slug(strtolower($place)), 'date' => $urlDate]) }}" target="_blank" rel="noopener noreferrer" class="news-card ratio-1-1">
                            @if(!empty($news->duration))
                                <div class="video-duration-badge">
                                    <svg viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                                    {{ \Carbon\Carbon::parse($news->duration)->format(str_starts_with($news->duration, '00:') ? 'i:s' : 'H:i:s') }}
                                </div>
                            @endif
                            <img src="{{ $imgPath }}" alt="News Thumbnail">
                            <div class="news-overlay">
                                <span class="news-meta">{{ $dateMeta }} - {{ $place }}</span>
                                <h3 class="news-title news-title-clamp">{{ $news->english->title ?? '' }}</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if(isset($pinnedNews[$index]))
                    @php
                        $pNews = $pinnedNews[$index];
                        $pinnedImg = $pNews->images->where('sizetype', 2)->first() ?? $pNews->images->first();
                        $imgPath = $pinnedImg ? asset($pinnedImg->path) : 'https://picsum.photos/seed/'.$pNews->id.'/600/300';
                        $pinnedContent = strip_tags($pNews->english->content ?? '');
                        $pinnedCity = (isset($pNews->place->name) && $pNews->place->name !== 'All') ? $pNews->place->name : 'Syria';
                        $urlDate = $pNews->date ? \Carbon\Carbon::parse($pNews->date)->format('Ymd') : '00000000';
                    @endphp
                    <a href="{{ route('new.public.article', ['id' => $pNews->id, 'city' => Illuminate\Support\Str::slug(strtolower($pinnedCity)), 'date' => $urlDate]) }}" target="_blank" rel="noopener noreferrer" class="pinned-row mb-3">
                        <div class="pinned-img-container">
                            @if(!empty($pNews->duration))
                                <div class="video-duration-badge">
                                    <svg viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                                    {{ \Carbon\Carbon::parse($pNews->duration)->format(str_starts_with($pNews->duration, '00:') ? 'i:s' : 'H:i:s') }}
                                </div>
                            @endif
                            <img src="{{ $imgPath }}" alt="Pinned News">
                        </div>
                        <div class="pinned-box">
                            <h2 class="news-title">{{ $pNews->english->title ?? '' }}</h2>
                            <p class="news-content pinned-content-clamp">
                                @php
                                    $words = explode(' ', $pinnedContent);
                                    $totalWords = count($words);
                                    if ($totalWords > 15) array_splice($words, 15, 0, '<br>');
                                    if ($totalWords > 30) array_splice($words, 31, 0, '<br>');
                                    if ($totalWords > 45) array_splice($words, 47, 0, '<br>');
                                    $finalWords = array_slice($words, 0, 63);
                                    echo implode(' ', $finalWords) . ($totalWords > 60 ? '...' : '');
                                @endphp
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                        </div>
                    </a>
                @endif
            @endforeach

            @php
                $renderedPinnedCount = $regularChunks->count();
            @endphp
            @for($i = $renderedPinnedCount; $i < $pinnedNews->count(); $i++)
                @php
                    $pNews = $pinnedNews[$i];
                    $pinnedImg = $pNews->images->where('sizetype', 2)->first() ?? $pNews->images->first();
                    $imgPath = $pinnedImg ? asset($pinnedImg->path) : 'https://picsum.photos/seed/'.$pNews->id.'/600/300';
                    $pinnedContent = strip_tags($pNews->english->content ?? '');
                    $pinnedCity = (isset($pNews->place->name) && $pNews->place->name !== 'All') ? $pNews->place->name : 'Syria';
                    $urlDate = $pNews->date ? \Carbon\Carbon::parse($pNews->date)->format('Ymd') : '00000000';
                @endphp
                <a href="{{ route('new.public.article', ['id' => $pNews->id, 'city' => Illuminate\Support\Str::slug(strtolower($pinnedCity)), 'date' => $urlDate]) }}" target="_blank" rel="noopener noreferrer" class="pinned-row mb-3">
                    <div class="pinned-img-container">
                        @if(!empty($pNews->duration))
                            <div class="video-duration-badge">
                                <svg viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                                {{ \Carbon\Carbon::parse($pNews->duration)->format(str_starts_with($pNews->duration, '00:') ? 'i:s' : 'H:i:s') }}
                            </div>
                        @endif
                        <img src="{{ $imgPath }}" alt="Pinned News">
                    </div>
                    <div class="pinned-box">
                        <svg xmlns="http://www.w3.org/2000/svg" class="pin-icon" fill="currentColor" viewBox="0 0 16 16"><path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224.5-.5.5s-.5-.224-.5-.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354z"/></svg>
                        <h2 class="news-title">{{ $pNews->english->title ?? '' }}</h2>
                        <p class="news-content pinned-content-clamp">
                            @php
                                $words = explode(' ', $pinnedContent);
                                $totalWords = count($words);
                                if ($totalWords > 15) array_splice($words, 15, 0, '<br>');
                                if ($totalWords > 30) array_splice($words, 31, 0, '<br>');
                                if ($totalWords > 45) array_splice($words, 47, 0, '<br>');
                                $finalWords = array_slice($words, 0, 63);
                                echo implode(' ', $finalWords) . ($totalWords > 60 ? '...' : '');
                            @endphp
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                    </div>
                </a>
            @endfor

            @if($hasMore)
                <div class="text-center mt-5 mb-5">
                    <button wire:click="loadMore" wire:loading.attr="disabled" class="btn-load-more">
                        <span wire:loading.remove wire:target="loadMore">Load More</span>
                        <span wire:loading wire:target="loadMore">Loading...</span>
                    </button>
                </div>
            @endif
        </div> 
    </div>

    <script>
        function updateTimestamp() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const day = now.getDate();
            const month = now.toLocaleString('en-GB', { month: 'short' });
            const year = now.getFullYear();
            const timeEl = document.getElementById('current-timestamp');
            if(timeEl) timeEl.innerText = `${hours}:${minutes} | ${day} ${month} ${year}`;
        }
        updateTimestamp();
        setInterval(updateTimestamp, 60000);
    </script>
</div>