<div>
    <style>
        :root {
            --primary-red: #b5121b;
            --primary-red-hover: #9a0f17;
            --text-dark: #414042;
            --white-translucent: rgba(255, 255, 255, 0.85);
            --black-overlay: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.5) 60%, transparent 100%);
        }

        .custom-container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .hero-image-container {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            cursor: pointer;
            z-index: 1;
            background-color: #000;
        }

        @media (min-width: 768px) {
            .hero-image-container {
                aspect-ratio: 3 / 1;
            }
        }

        @media (min-width: 1024px) {
            .hero-image-container {
                aspect-ratio: 4.5 / 1;
            }
        }

        .hero-main-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .hero-image-container:hover .hero-main-img {
            transform: scale(1.03);
        }

        .hero-top-info {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
            padding: 12px 16px;
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .hero-timestamp {
            position: absolute;
            bottom: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.9);
            color: var(--text-dark);
            padding: 6px 16px;
            font-weight: 800;
            font-size: 0.75rem;
            margin: 0;
            z-index: 2;
            border-top-left-radius: 4px;
        }

        /* Ticker Mask Improvements */
        .hero-caption-bar {
            background: #fdfdfd;
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 12px 0;
            position: relative;
            display: block;
            width: 100%;
        }

        .ticker-mask {
            display: block;
            width: 100%;
            overflow: hidden;
            -webkit-mask-image: linear-gradient(to right, transparent 0%, #000 8%, #000 92%, transparent 100%);
            mask-image: linear-gradient(to right, transparent 0%, #000 8%, #000 92%, transparent 100%);
        }

        .ticker-wrapper {
            display: flex;
            width: max-content;
            animation: ticker-move 30s linear infinite;
        }

        @media (min-width: 768px) {
            .hero-caption-bar::before, .hero-caption-bar::after {
                content: "";
                position: absolute;
                top: 0; bottom: 0; width: 10%; z-index: 5;
                pointer-events: none;
                backdrop-filter: blur(3px);
                transition: opacity 0.3s ease;
            }
            .hero-caption-bar::before { left: 0; mask-image: linear-gradient(to right, #000, transparent); }
            .hero-caption-bar::after { right: 0; mask-image: linear-gradient(to left, #000, transparent); }
            .hero-caption-bar:hover::before, .hero-caption-bar:hover::after { opacity: 0; }
        }

        .ticker-content { display: flex; gap: 16px; padding-right: 16px; white-space: nowrap; }
        .hero-caption-bar:hover .ticker-wrapper { animation-play-state: paused; }
        .ticker-item { display: flex; align-items: center; color: #444; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: color 0.2s; gap: 8px; }
        .ticker-item:hover { color: var(--primary-red); text-decoration: none; }
        .news-separator { height: 12px; width: auto; display: block; flex-shrink: 0; }

        @keyframes ticker-move { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }

        .grid-5-columns {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        @media (min-width: 600px) {
            .grid-5-columns { grid-template-columns: repeat(2, 1fr); }
            .span-tablet-2 { grid-column: span 2; }
        }

        @media (min-width: 992px) {
            .grid-5-columns { grid-template-columns: repeat(5, 1fr); gap: 16px; }
            .span-3 { grid-column: span 3; }
            .span-2 { grid-column: span 2; }
        }

        /* Enforce exact matching margins to gaps */
        .grid-adaptive-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            margin-bottom: 12px !important;
        }

        @media (min-width: 480px) {
            .grid-adaptive-row { grid-template-columns: repeat(2, 1fr); }
        }

        @media (min-width: 768px) {
            .grid-adaptive-row { grid-template-columns: repeat(3, 1fr); }
        }

        @media (min-width: 992px) {
            .grid-adaptive-row { grid-template-columns: repeat(5, 1fr); gap: 16px; margin-bottom: 16px !important; }
        }

        .magazine-link {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            overflow: hidden;
            border: none;
            text-decoration: none;
            background-color: #f8f9fa;
        }
        .magazine-img {
            width: 100%;
            height: 102%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            display: block;
        }
        .magazine-link:hover .magazine-img {
            transform: scale(1.02);
        }

        .news-card {
            position: relative;
            display: block;
            overflow: hidden;
            text-decoration: none;
            color: white;
            background-color: #000;
            width: 100%;
        }
        .news-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.85;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.5s ease;
        }
        .news-card:hover img { transform: scale(1.03); opacity: 1; }

        .ratio-3-2 { aspect-ratio: 4/3; }
        .ratio-1-1 { aspect-ratio: 1 / 1; }

        @media (min-width: 768px) {
            .ratio-3-2 { aspect-ratio: 3 / 2; }
        }

        .news-overlay {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 16px;
            background: var(--black-overlay);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            pointer-events: none;
        }
        @media (min-width: 992px) { .news-overlay { padding: 24px 20px; } }

        .news-meta { font-size: 0.65rem; color: rgba(255, 255, 255, 0.8); margin-bottom: 6px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;}
        .news-title { font-size: 1rem; font-weight: 700; line-height: 1.25; margin: 0; color: white; padding-right: 15px; }
        .large-title { font-size: 1.3rem; margin-bottom: 6px; }

        @media (min-width: 768px) {
            .news-title { font-size: 1.1rem; }
            .large-title { font-size: 1.65rem; }
        }

        .news-content { font-size: 0.85rem; color: var(--white-translucent); margin: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .chevron-icon { position: absolute; bottom: 15px; right: 15px; width: 14px; height: 14px; fill: white; transition: transform 0.3s ease; }
        .news-card:hover .chevron-icon { transform: translateX(4px); }

        /* Perfect Alignment Pinned Row CSS Grid */
        .pinned-row {
            display: flex;
            flex-direction: column;
            gap: 0; /* Keep them connected vertically on mobile */
            margin-bottom: 12px !important;
        }

        .pinned-img-container { width: 100%; height: 100%; overflow: hidden; position: relative; }
        .pinned-img-container img { width: 100%; height: 100%; object-fit: cover; aspect-ratio: 16 / 9; display: block;}

        .pinned-box {
            background-color: var(--primary-red);
            color: white;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            text-decoration: none;
            transition: background-color 0.2s ease;
            width: auto; /* Fixed: allows CSS Grid to anchor to the right edge naturally */
            margin-left: 0;
        }
        .pinned-box:hover { background-color: var(--primary-red-hover); color: white; text-decoration: none; }
        .pinned-box .pin-icon { position: absolute; top: 16px; right: 16px; width: 16px; height: 16px; opacity: 0.8; }
        .pinned-box .news-title { font-size: 1.25rem; margin-bottom: 10px; padding-right: 20px; }
        .pinned-box .news-content { -webkit-line-clamp: 3; }

        /* Match the 3-column tablet grid perfectly */
        @media (min-width: 768px) {
            .pinned-row {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 12px;
                margin-bottom: 12px !important;
            }
            .pinned-img-container { grid-column: span 1; }
            .pinned-box {
                grid-column: span 2;
                margin-left: -12px; /* Pulls the red box left over the gap to touch the image */
                padding: 2rem 2rem 2rem 28px; /* Adds the gap back inside the box so text perfectly aligns */
            }
            .pinned-box .news-title { font-size: 1.5rem; }
            .pinned-box .news-content { -webkit-line-clamp: 4; }
        }

        /* Match the 5-column desktop grid perfectly */
        @media (min-width: 992px) {
            .pinned-row {
                grid-template-columns: repeat(5, 1fr);
                gap: 16px;
                margin-bottom: 16px !important;
            }
            .pinned-img-container { grid-column: span 2; }
            .pinned-box {
                grid-column: span 3;
                margin-left: -16px; /* Pulls the red box left over the 16px gap */
                padding: 2rem 2rem 2rem 36px; /* 16px gap + 20px text overlay padding = 36px perfect text alignment */
            }
        }

        .btn-load-more { background-color: transparent; border: 1.5px solid var(--primary-red); color: var(--primary-red); padding: 10px 36px; border-radius: 50px; font-size: 0.9rem; font-weight: 600; transition: all 0.25s ease; display: inline-block; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px; }
        .btn-load-more:hover { background-color: var(--primary-red); color: white; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(181, 18, 27, 0.15); }
        .btn-load-more:active { transform: translateY(0); }

        .news-title-clamp { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; min-height: 2.4em; line-height: 1.2; }
        .important-content-clamp { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.4em; line-height: 1.2; }
        .pinned-content-clamp { display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; min-height: 4.8em; line-height: 1.2; }
    </style>

    <div class="custom-container mt-4">
        <div class="row mx-0 mt-4 mb-3">
            <div class="col-12 p-0">
                <div class="d-flex justify-content-center align-items-center" style="background-color: var(--primary-red); color: white; padding: 16px 0;">
                    <h1 class="m-0" style="font-family: 'Lato', sans-serif; font-size: calc(1.5rem + 1vw); font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase;">OUR NEWS</h1>
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
                    <div class="hero-top-info" style="pointer-events: none;">Caption</div>
                    <div class="hero-timestamp" id="current-timestamp" style="pointer-events: none;"></div>
                </div>
                <div class="hero-caption-bar">
                    <div class="ticker-mask">
                        <div class="ticker-wrapper">
                            <div class="ticker-content">
                                @foreach($tickerNews as $ticker)
                                    @if($ticker)
                                        @php
                                            $tickerCity = $ticker->place->name ?? 'Syria';
                                            $tickerDate = $ticker->date ? \Carbon\Carbon::parse($ticker->date)->format('Ymd') : '00000000';
                                        @endphp
                                        <a href="{{ route('new.public.article', ['id' => $ticker->id, 'city' => Illuminate\Support\Str::slug(strtolower($tickerCity)), 'date' => $tickerDate]) }}" target="_blank" rel="noopener noreferrer" class="ticker-item">
                                            {{ $ticker->english->title ?? 'New Update' }}
                                            <img src="{{ asset('images/our-news/logo/001HC_Logomini.svg') }}" class="news-separator" alt="logo">
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="ticker-content">
                                @foreach($tickerNews as $ticker)
                                    @if($ticker)
                                        @php
                                            $tickerCity = $ticker->place->name ?? 'Syria';
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
                        $place = $importantNews->place->name ?? 'Syria';
                        $fullContent = $importantNews->english->content ?? '';
                        $cleanContent = strip_tags($fullContent);
                    @endphp
                    <a href="{{ route('new.public.article', ['id' => $importantNews->id, 'city' => Illuminate\Support\Str::slug(strtolower($place)), 'date' => $urlDate]) }}" target="_blank" rel="noopener noreferrer" class="news-card ratio-3-2" style="height: 100%;">
                        <img src="{{ $imgPath }}" alt="{{ $importantNews->english->title ?? 'News' }}">
                        <div class="news-overlay">
                            <span class="news-meta">{{ $dateMeta }} - {{ $place }}</span>
                            <h2 class="news-title large-title">{{ $importantNews->english->title ?? '' }}</h2>
                            <p class="news-content important-content-clamp">
                                @php
                                    $words = explode(' ', $cleanContent);
                                    $totalWords = count($words);
                                    if ($totalWords > 18) {
                                        array_splice($words, 18, 0, '<br>');
                                    }
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

        @php
            $regularChunks = $regularNews->chunk(5);
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
                        $place = $news->place->name ?? 'Syria';
                    @endphp
                    <a href="{{ route('new.public.article', ['id' => $news->id, 'city' => Illuminate\Support\Str::slug(strtolower($place)), 'date' => $urlDate]) }}" target="_blank" rel="noopener noreferrer" class="news-card ratio-1-1">
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
                    $pinnedCity = $pNews->place->name ?? 'Syria';
                    $urlDate = $pNews->date ? \Carbon\Carbon::parse($pNews->date)->format('Ymd') : '00000000';
                @endphp
                <div class="pinned-row">
                    <div class="pinned-img-container">
                        <img src="{{ $imgPath }}" alt="Pinned News">
                    </div>
                    <a href="{{ route('new.public.article', ['id' => $pNews->id, 'city' => Illuminate\Support\Str::slug(strtolower($pinnedCity)), 'date' => $urlDate]) }}" target="_blank" rel="noopener noreferrer" class="pinned-box">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" style="bottom: 20px; right: 20px;" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                    </a>
                </div>
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
                $pinnedCity = $pNews->place->name ?? 'Syria';
                $urlDate = $pNews->date ? \Carbon\Carbon::parse($pNews->date)->format('Ymd') : '00000000';
            @endphp
            <div class="pinned-row">
                <div class="pinned-img-container">
                    <img src="{{ $imgPath }}" alt="Pinned News">
                </div>
                <a href="{{ route('new.public.article', ['id' => $pNews->id, 'city' => Illuminate\Support\Str::slug(strtolower($pinnedCity)), 'date' => $urlDate]) }}" target="_blank" rel="noopener noreferrer" class="pinned-box">
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" style="bottom: 20px; right: 20px;" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                </a>
            </div>
        @endfor

        @if($hasMore)
            <div class="text-center mt-5 mb-5">
                <button wire:click="loadMore" wire:loading.attr="disabled" class="btn-load-more">
                    <span wire:loading.remove>Load More</span>
                    <span wire:loading>Loading...</span>
                </button>
            </div>
        @endif

    </div>

    <script>
        function updateTimestamp() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const day = now.getDate();
            const month = now.toLocaleString('en-GB', { month: 'short' });
            const year = now.getFullYear();
            document.getElementById('current-timestamp').innerText = `${hours}:${minutes} | ${day} ${month} ${year}`;
        }
        updateTimestamp();
        setInterval(updateTimestamp, 60000);
    </script>
</div>
