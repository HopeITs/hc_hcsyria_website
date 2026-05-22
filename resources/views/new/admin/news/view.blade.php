<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    @include('new.admin.navbar')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | News View</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="/css/font-awesome.min.css" rel="stylesheet">

    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="{{asset('css/newsletter.css')}}" rel="stylesheet" type="text/css">

    <style>
        :root { --primary-red: #b5121b; --black-overlay: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.5) 60%, transparent 100%); }

        .preview-content-wrapper { max-width: 1140px; margin: 0 auto; padding: 10rem ; }

        .news-card { position: relative; display: block; overflow: hidden; background-color: #000; color: white; width: 100%; text-decoration: none; }
        .news-card img { width: 100%; height: 100%; object-fit: cover; }
        .news-overlay { position: absolute; bottom: 0; left: 0; right: 0; padding: 20px; background: var(--black-overlay); }
        .news-meta { font-size: 0.7rem; color: #fff; font-weight: 600; text-transform: uppercase; margin-bottom: 5px; display: block; }
        .news-title { font-size: 1.4rem; font-weight: 700; color: white; margin: 0; line-height: 1.2; }
        .news-content { color: #fff; font-size: 0.9rem; margin-top: 10px; line-height: 1.4; }

        .pinned-row { display: grid; grid-template-columns: 2fr 3fr; background: #fff; border: 1px solid #dee2e6; }
        .pinned-img-container img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .pinned-box { background-color: var(--primary-red); color: white; padding: 25px; display: flex; flex-direction: column; justify-content: center; }

        .important-content-clamp { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; }
        .pinned-content-clamp { display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; }
    </style>
</head>
<body style="background: #f4f4f4;">

@stack('navbar_body')

<div class="container-fluid">
    <div class="preview-content-wrapper">
        <div class="d-flex justify-content-end align-items-center mb-4 gap-2">
            @if(isset($user) && ($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor')))
                <a href="{{route('news.edit', [$news->id, 'ref' => 'show'])}}" class="btn btn-primary edit-btn">
                    <span class="fa fa-edit"></span>&nbsp;Edit
                </a>
            @endif

                @if($news->english_check == '1' && (count($news->images) > 0 || ($news->video && $news->video != '0')))
                    <form action="{{ route('news.online') }}" method="POST" class="m-0 p-0 d-flex">
                        @csrf
                        <input type="hidden" name="id" value="{{ $news->id }}">
                        <button type="submit" class="btn btn-success edit-btn d-flex align-items-center gap-2" style="background-color: #389e47; border-color: #389e47; color: white;">
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
            <div class="news-card" style="aspect-ratio: 3/2; max-width: 800px; margin: 0 auto;">
                <img src="{{ $imgPath }}" alt="{{ $title }}">
                <div class="news-overlay">
                    <span class="news-meta">{{ $date }} - {{ $place }}</span>
                    <h2 class="news-title">{{ $title }}</h2>
                    <p class="news-content important-content-clamp">{{ $content }}</p>
                </div>
            </div>

        @elseif($news->priority_status == 2)
            <div class="pinned-row" style="max-width: 900px; margin: 0 auto;">
                <div class="pinned-img-container"><img src="{{ $imgPath }}" alt="Pinned"></div>
                <div class="pinned-box">
                    <span class="news-meta">{{ $date }} - {{ $place }}</span>
                    <h2 class="news-title">{{ $title }}</h2>
                    <p class="news-content pinned-content-clamp">{{ $content }}</p>
                </div>
            </div>

        @else
            <div class="news-card" style="aspect-ratio: 1/1; max-width: 400px; margin: 0 auto;">
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
