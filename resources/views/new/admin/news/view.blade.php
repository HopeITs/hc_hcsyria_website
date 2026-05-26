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

            @if($news->english_check == '1' && (count($news->images) > 0 || ($news->video && $news->video != '0')))
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
            $img = $news->firstImage;
            $imgPath = $img ? asset($img->path) : 'https://picsum.photos/800/500';
            $title = optional($news->english)->title ?? 'No Title';
            $content = strip_tags(optional($news->english)->content ?? '');

            $place = isset($news->place->name) ? ($news->place->name == 'All' ? 'Syria' : $news->place->name) : 'Syria';

            $date = $news->date ? \Carbon\Carbon::parse($news->date)->format('d/m/Y') : '';
        @endphp

        @if($news->priority_status == 1)
            <div class="news-card card-important">
                <img src="{{ $imgPath }}" alt="{{ $title }}">
                <div class="news-overlay">
                    <span class="news-meta">{{ $date }} - {{ $place }}</span>
                    <h2 class="news-title">{{ $title }}</h2>
                    <p class="news-content important-content-clamp">{{ $content }}</p>
                </div>
            </div>

        @elseif($news->priority_status == 2)
            <div class="card-pinned-wrapper">
                <div class="pinned-row">
                    <div class="pinned-img-container">
                        <img src="{{ $imgPath }}" alt="Pinned">
                    </div>
                    <div class="pinned-box">
                        <span class="news-meta">{{ $date }} - {{ $place }}</span>
                        <h2 class="news-title">{{ $title }}</h2>
                        <p class="news-content pinned-content-clamp">{{ $content }}</p>
                    </div>
                </div>
            </div>

        @else
            <div class="news-card card-standard">
                <img src="{{ $imgPath }}" alt="{{ $title }}">
                <div class="news-overlay">
                    <span class="news-meta">{{ $date }} - {{ $place }}</span>
                    <h3 class="news-title">{{ $title }}</h3>
                </div>
            </div>
        @endif
    </div>
</div>

</body>
</html>
