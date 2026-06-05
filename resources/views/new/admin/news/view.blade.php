<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    @include('new.admin.navbar')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | News View</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/our-news.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="/css/font-awesome.min.css" rel="stylesheet">

    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">

</head>
<body>

@stack('navbar_body')

<div class="container-fluid">
    <div class="preview-content-wrapper">
        <div class="d-flex justify-content-end align-items-center mb-4 gap-2 flex-wrap">
            @if(isset($user) && ($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor')))
                <a href="{{route('news.edit', [$news->id, 'ref' => 'show'])}}" class="btn btn-primary edit-btn">
                    <span class="fa fa-edit"></span>&nbsp;Edit
                </a>
            @endif

            @if($news->online == '0' && $news->english_check == '1' && (count($news->images) > 0 || ($news->video && $news->video != '0')))
                <form action="{{ route('news.online') }}" method="POST" class="m-0 p-0">
                    @csrf
                    <input type="hidden" name="id" value="{{ $news->id }}">
                    <button type="submit" class="btn btn-publish edit-btn d-flex align-items-center gap-2">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Publish
                    </button>
                </form>
            @endif

            @if(isset($user) && ($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor')))
                <a href="{{route('news.images.create', $news->id)}}" class="btn btn-primary edit-btn">
                    <i class='fa-solid fa-plus-minus'></i> Image
                </a>
            @endif

            <button class="btn btn-secondary" onclick="window.history.back();">Back</button>
        </div>

        @php
            // Shared Variables
            $title = optional($news->english)->title ?? 'No Title';
            $fullContent = optional($news->english)->content ?? '';
            $cleanContent = strip_tags($fullContent);
            $place = isset($news->place->name) ? ($news->place->name == 'All' ? 'Syria' : $news->place->name) : 'Syria';
            $date = $news->date ? \Carbon\Carbon::parse($news->date)->format('d/m/Y') : '';
            
            // --- NEW: Setup the variables needed for the public URL ---
            $urlDate = $news->date ? \Carbon\Carbon::parse($news->date)->format('Ymd') : '00000000';
            $placeSlug = Illuminate\Support\Str::slug(strtolower($place));
            $publicArticleUrl = route('news.preview', ['id' => $news->id]);
            // --------------------------------------------------------

            // Dynamic Thumbnail Logic based on Priority Status
            $sizeType = 0; // Default to Regular
            if ($news->priority_status == 1) $sizeType = 1; // Important
            if ($news->priority_status == 2) $sizeType = 2; // Pinned

            $targetImg = $news->images->where('sizetype', $sizeType)->first() ?? $news->images->first();
            $imgPath = $targetImg 
                        ? asset($targetImg->path) 
                        : 'https://picsum.photos/seed/'.$news->id.'/800/500';
        @endphp

        @if($news->priority_status == 1)
            <div class="grid-5-columns">
                <div class="span-3 span-tablet-2">
                    <a href="{{ $publicArticleUrl }}" target="_blank" rel="noopener noreferrer" class="news-card card-important ratio-3-2 h-100 w-100" style="text-decoration: none;">
                        @if(!empty($news->duration))
                            <div class="video-duration-badge">
                                <svg viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                                {{ \Carbon\Carbon::parse($news->duration)->format(str_starts_with($news->duration, '00:') ? 'i:s' : 'H:i:s') }}
                            </div>
                        @endif
                        <img src="{{ $imgPath }}" alt="{{ $title }}">
                        <div class="news-overlay">
                            <span class="news-meta">{{ $date }} - {{ $place }}</span>
                            <h2 class="news-title large-title">{{ $title }}</h2>
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
                </div>
                
                <div class="span-2 span-tablet-2 d-none d-md-block"></div>
            </div>

        @elseif($news->priority_status == 2)
            <div class="card-pinned-wrapper w-100" style="max-width: 100%;">
                <a href="{{ $publicArticleUrl }}" target="_blank" rel="noopener noreferrer" class="pinned-row" style="text-decoration: none;">
                    <div class="pinned-img-container">
                        @if(!empty($news->duration))
                            <div class="video-duration-badge">
                                <svg viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                                {{ \Carbon\Carbon::parse($news->duration)->format(str_starts_with($news->duration, '00:') ? 'i:s' : 'H:i:s') }}
                            </div>
                        @endif
                        <img src="{{ $imgPath }}" alt="Pinned">
                    </div>
                    <div class="pinned-box">
                        <h2 class="news-title">{{ $title }}</h2>
                        <p class="news-content pinned-content-clamp">
                            @php
                                $words = explode(' ', $cleanContent);
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
            </div>

        @else
            <div class="grid-adaptive-row">
                <div class="d-none d-lg-block" style="grid-column: span 2;"></div> 
                
                <div class="d-none d-md-block d-lg-none"></div>

                <a href="{{ $publicArticleUrl }}" target="_blank" rel="noopener noreferrer" class="news-card card-standard ratio-1-1 w-100" style="text-decoration: none;">
                    @if(!empty($news->duration))
                        <div class="video-duration-badge">
                            <svg viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                            {{ \Carbon\Carbon::parse($news->duration)->format(str_starts_with($news->duration, '00:') ? 'i:s' : 'H:i:s') }}
                        </div>
                    @endif
                    <img src="{{ $imgPath }}" alt="{{ $title }}">
                    <div class="news-overlay">
                        <span class="news-meta">{{ $date }} - {{ $place }}</span>
                        <h3 class="news-title news-title-clamp">{{ $title }}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="chevron-icon" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                    </div>
                </a>
            </div>
        @endif
    </div>
</div>

</body>
</html>