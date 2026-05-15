<div>
    <style>
        .custom-container { max-width: 1140px; margin: 0 auto; }
        .hero-image-container { position: relative; width: 100%; aspect-ratio: 4.5 / 1; overflow: hidden; cursor: pointer; }
        .hero-image-container::before { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url("{{ asset('images/our-news/header-image.jpg') }}"); background-size: 100% 100%; background-repeat: no-repeat; background-position: center; transition: transform 0.5s ease-in-out, filter 0.5s ease-in-out; z-index: 1; }
        .hero-image-container:hover::before { transform: scale(1.02); }
        .hero-top-info { position: absolute; top: 0; left: 0; font-size: 0.7rem; font-weight: 500; color: white; padding: 16px 16px; z-index: 2; }
        .hero-timestamp { position: absolute; bottom: 0; right: 0; background: rgba(255, 255, 255, 0.7); color: #414042; padding: 4px 16px; font-weight: 800; font-size: 0.85rem; margin: 0; z-index: 2; }

        .hero-caption-bar {
            background: #fdfdfd;
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 10px 0;
            position: relative;
            display: block;
            width: 100%;
        }

        .ticker-mask {
            display: block;
            width: 100%;
            overflow: hidden;
            -webkit-mask-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 8%, rgba(0, 0, 0, 1) 92%, rgba(0, 0, 0, 0) 100%);
            mask-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 8%, rgba(0, 0, 0, 1) 92%, rgba(0, 0, 0, 0) 100%);
        }

        .ticker-wrapper {
            display: flex;
            width: max-content;
            animation: ticker-move 25s linear infinite;
        }

        .hero-caption-bar::before {
            content: "";
            position: absolute;
            top: 0; bottom: 0; left: 0;
            width: 15%;
            z-index: 5;
            pointer-events: none;

            -webkit-backdrop-filter: blur(3px);
            backdrop-filter: blur(3px);

            -webkit-backdrop-filter: url(#motion-blur);
            backdrop-filter: url(#motion-blur);

            -webkit-mask-image: linear-gradient(to right, #000 0%, transparent 100%);
            mask-image: linear-gradient(to right, #000 0%, transparent 100%);
            transition: opacity 0.3s ease;
        }

        .hero-caption-bar::after {
            content: "";
            position: absolute;
            top: 0; bottom: 0; right: 0;
            width: 15%;
            z-index: 5;
            pointer-events: none;

            -webkit-backdrop-filter: blur(3px);
            backdrop-filter: blur(3px);

            -webkit-backdrop-filter: url(#motion-blur);
            backdrop-filter: url(#motion-blur);

            -webkit-mask-image: linear-gradient(to left, #000 0%, transparent 100%);
            mask-image: linear-gradient(to left, #000 0%, transparent 100%);
            transition: opacity 0.3s ease;
        }

        .hero-caption-bar:hover::before,
        .hero-caption-bar:hover::after {
            opacity: 0;
        }

        .ticker-content { display: flex; gap: 6px ; padding-right: 10px; white-space: nowrap; }
        .hero-caption-bar:hover .ticker-wrapper {
            animation-play-state: paused;}
        .ticker-item { display: flex; align-items: center; color: #444; text-decoration: none; font-size: 0.9rem; transition: color 0.2s; padding: 0; gap: 6px; white-space: nowrap; }        .ticker-item:hover { color: #d9534f; }
        .news-separator { height: 13px; width: auto; display: block; margin: 0; flex-shrink: 0; }

        @keyframes ticker-move { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }

        .grid-5-columns { display: grid; grid-template-columns: repeat(5, 1fr); gap: 0.5rem; }
        .span-3 { grid-column: span 3; }
        .span-2 { grid-column: span 2; }

        .magazine-link {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            overflow: hidden;
            border: none;
            text-decoration: none;
            background-color: transparent;
        }
        .magazine-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top;
            opacity: 0.95;
            transform: scale(1.01);
            transform-origin: top;
            transition: transform 0.6s ease, opacity 0.6s ease;
            display: block;
        }
        .magazine-link:hover .magazine-img {
            opacity: 1;
            transform: scale(1.02);
        }
        .news-card { position: relative; display: block; overflow: hidden; text-decoration: none; color: white; background-color: #000; width: 100%; }
        .news-card img { width: 100%; height: 100%; object-fit: cover; opacity: 0.9; transition: transform 0.5s ease, opacity 0.5s ease; }
        .news-card:hover img { transform: scale(1.02); opacity: 1; }
        .ratio-3-2 { aspect-ratio: 3 / 2; }
        .ratio-1-1 { aspect-ratio: 1 / 1; }
        .news-overlay { position: absolute; bottom: 0; left: 0; right: 0; padding: 20px 20px 15px 20px; background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.6) 50%, transparent 100%); display: flex; flex-direction: column; justify-content: flex-end; pointer-events: none; }
        .news-meta { font-size: 0.65rem; color: rgba(255, 255, 255, 0.8); margin-bottom: 4px; font-weight: 500; }
        .news-title { font-size: 1.05rem; font-weight: 700; line-height: 1.2; margin: 0; color: white; padding-right: 15px; }
        .large-title { font-size: 1.75rem; margin-bottom: 8px; }
        .news-content { font-size: 0.85rem; color: rgba(255, 255, 255, 0.85); margin: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .chevron-icon { position: absolute; bottom: 15px; right: 15px; width: 14px; height: 14px; fill: white; transition: transform 0.2s ease; }
        .news-card:hover .chevron-icon { transform: translateX(3px); }

        .pinned-img-container { width: 100%; height: 100%; overflow: hidden; position: relative; }
        .pinned-img-container img { width: 100%; height: 100%; object-fit: cover; aspect-ratio: 2 / 1; }
        .pinned-box { background-color: #b5121b; color: white; padding: 2rem; height: 100%; display: flex; flex-direction: column; justify-content: center; position: relative; text-decoration: none; transition: background-color 0.2s ease; }
        .pinned-box:hover { background-color: #9a0f17; color: white; }
        .pinned-box .pin-icon { position: absolute; top: 20px; right: 20px; width: 16px; height: 16px; }
        .pinned-box .news-title { font-size: 1.5rem; margin-bottom: 10px; }
        .pinned-box .news-content { -webkit-line-clamp: 4; }

        .btn-load-more { background-color: transparent; border: 1px solid #b5121b; color: #b5121b; padding: 8px 30px; border-radius: 50px; font-size: 0.95rem; font-weight: 500; transition: all 0.3s ease; display: inline-block; cursor: pointer; }
        .btn-load-more:hover { background-color: #b5121b; color: white; }

        .news-title-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            height: 2.4em;
            line-height: 1.2;
        }

        .important-content-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 2.4em;
            line-height: 1.2;
            white-space: normal;
        }
        .pinned-content-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 4.8em;
            line-height: 1.2;
            white-space: normal;
        }
    </style>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <defs>
            <filter id="motion-blur" x="-20%" y="-20%" width="140%" height="140%">
                <feGaussianBlur stdDeviation="6 0" />
            </filter>
        </defs>
    </svg>

    <div class="custom-container mt-4">
        <div class="row mx-0 mt-4 mb-2">
            <div class="col-12 p-0">
                <div class="d-flex justify-content-center align-items-center" style="background-color: #b5121b; color: white; padding: 14px 0;">
                    <h1 class="m-0" style="font-family: 'Lato', sans-serif; font-size: 2.4rem; font-weight: 800; letter-spacing: 1px;">OUR NEWS</h1>
                </div>
            </div>
        </div>

        <div class="row g-2 mb-2">
            <div class="col-12">
                <div class="hero-image-container">
                    <div class="hero-top-info">Aleppo</div>
                    <div class="hero-timestamp" id="current-timestamp"></div>
                </div>
                <div class="hero-caption-bar">
                    <div class="ticker-mask">
                        <div class="ticker-wrapper">
                            <div class="ticker-content">
                                @foreach($tickerNews as $ticker)
                                    <a href="{{ route('news.show', $ticker->id ?? '#') }}" class="ticker-item">
                                        {{ $ticker->english->title ?? 'New Update' }}
                                        <img src="{{ asset('images/our-news/logo/001HC_Logomini.svg') }}" class="news-separator" alt="logo">
                                    </a>
                                @endforeach
                            </div>
                            <div class="ticker-content">
                                @foreach($tickerNews as $ticker)
                                    <a href="{{ route('news.show', $ticker->id ?? '#') }}" class="ticker-item">
                                        {{ $ticker->english->title ?? 'New Update' }}
                                        <img src="{{ asset('images/our-news/logo/001HC_Logomini.svg') }}" class="news-separator" alt="logo">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid-5-columns mb-2">
            <div class="span-3">
                @if($importantNews)
                    @php
                        $importantImg = $importantNews->images->where('sizetype', 1)->first() ?? $importantNews->images->first();
                        $imgPath = $importantImg ? asset($importantImg->path) : 'https://picsum.photos/800/500?random=1';
                        $date = $importantNews->date ? \Carbon\Carbon::parse($importantNews->date)->format('d/m/Y') : '';
                        $place = $importantNews->place->name ?? 'Syria';
                        $fullContent = $importantNews->english->content ?? '';
                        $cleanContent = strip_tags($fullContent);
                    @endphp
                    <a href="{{ route('news.show', $importantNews->id) }}" class="news-card ratio-3-2" style="height: 100%;">
                        <img src="{{ $imgPath }}" alt="{{ $importantNews->english->title ?? 'News' }}">
                        <div class="news-overlay" style="padding-bottom: 25px;">
                            <span class="news-meta">{{ $date }} - {{ $place }}</span>
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

            <div class="span-2">
                @if($latestEdition)
                    <a href="#" class="magazine-link" style="height: 100%;">
                        <img src="{{ asset('images/our-news/roots-of-hope-magazine.png') }}" alt="Roots of Hope Magazine" class="magazine-img">
                    </a>
                @endif
            </div>
        </div>

        <div class="grid-5-columns mb-2">
            @foreach($firstRow as $news)
                @php
                    $thumbImg = $news->images->where('sizetype', 0)->first() ?? $news->images->first();
                    $imgPath = $thumbImg ? asset($thumbImg->path) : 'https://picsum.photos/400/400?random='.$news->id;
                    $date = $news->date ? \Carbon\Carbon::parse($news->date)->format('d/m/Y') : '';
                    $place = $news->place->name ?? 'Syria';
                @endphp
                <a href="{{ route('news.show', $news->id) }}" class="news-card ratio-1-1">
                    <img src="{{ $imgPath }}" alt="News Thumbnail">
                    <div class="news-overlay">
                        <span class="news-meta">{{ $date }} - {{ $place }}</span>
                        <h3 class="news-title news-title-clamp">{{ $news->english->title ?? '' }}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                    </div>
                </a>
            @endforeach
        </div>

        @if($pinnedNews)
            @php
                $pinnedImg = $pinnedNews->images->where('sizetype', 2)->first() ?? $pinnedNews->images->first();
                $imgPath = $pinnedImg ? asset($pinnedImg->path) : 'https://picsum.photos/600/300?random=7';
                $pinnedContent = strip_tags($pinnedNews->english->content ?? '');
            @endphp
            <div class="grid-5-columns mb-2" style="gap: 0;">
                <div class="span-2">
                    <div class="pinned-img-container">
                        <img src="{{ $imgPath }}" alt="Pinned News">
                    </div>
                </div>
                <div class="span-3">
                    <a href="{{ route('news.show', $pinnedNews->id) }}" class="pinned-box">
                        <svg xmlns="http://www.w3.org/2000/svg" class="pin-icon" fill="currentColor" viewBox="0 0 16 16"><path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224.5-.5.5s-.5-.224-.5-.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354z"/></svg>
                        <h2 class="news-title">{{ $pinnedNews->english->title ?? '' }}</h2>

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

                        <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" style="bottom: 25px; right: 25px;" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                    </a>
                </div>
            </div>
        @endif

        <div class="grid-5-columns mb-4">
            @foreach($remainingNews as $news)
                @php
                    $thumbImg = $news->images->where('sizetype', 0)->first() ?? $news->images->first();
                    if ($thumbImg && file_exists(public_path($thumbImg->path))) {
                        $imgPath = asset($thumbImg->path);
                    } else {
                        $imgPath = 'https://picsum.photos/400/400?random='.$news->id;
                    }
                    $date = $news->date ? \Carbon\Carbon::parse($news->date)->format('d/m/Y') : '';
                    $place = $news->place->name ?? 'Syria';
                @endphp
                <a href="{{ route('news.show', $news->id) }}" class="news-card ratio-1-1">
                    <img src="{{ $imgPath }}" alt="News Thumbnail">
                    <div class="news-overlay">
                        <span class="news-meta">{{ $date }} - {{ $place }}</span>
                        <h3 class="news-title news-title-clamp">{{ $news->english->title ?? '' }}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                    </div>
                </a>
            @endforeach
        </div>

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
            const formattedTime = `${hours}:${minutes} | ${day} ${month} ${year}`;
            document.getElementById('current-timestamp').innerText = formattedTime;
        }
        updateTimestamp();
        setInterval(updateTimestamp, 60000);
    </script>
</div>
