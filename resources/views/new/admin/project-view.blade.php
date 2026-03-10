<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>


    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>{{$microProject[0]->english->MPE_Name}}</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/micro_page_new.css" rel="stylesheet">
    <link href="/css/lato.css" rel="stylesheet">
    {{--<link href="{{asset('css/main-new.css')}}" rel="stylesheet">--}}
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<style>
    .card-title {
        color: #BC1818;
        font-weight: bold;
        font-size: 1.3vw;
    }
    .carousel-inner{
        height: 18vw;
    }
</style>
<body>
@stack('navbar_body')
<section id="projects">
    <div style="padding: 3% 17.5%;">
        <div class="row d-flex justify-content-end">
            <div class="col d-flex justify-content-end gap-3">
                <button class="col-auto btn btn-primary edit-btn" onclick="window.history.back();"><i
                            class="fa fa-arrow-left"></i> Back
                </button>
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                    <a href="{{route('edit.project', $microProject[0]['id'])}}" class="col-auto btn btn-primary edit-btn">
                        <span class="fa fa-edit"></span>&nbsp;Edit</a>
                @endif
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                    <a href="{{route('add.image', $microProject[0]['id'])}}"
                       class="col-auto btn btn-primary edit-btn">
                        <i class='fa-solid fa-plus-minus'></i> Image</a>
                @endif
                @if(($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
                                            && $microProject[0]['MPE_Published'] == '0'
                                            && $microProject[0]['english_check'] == '1' )
                    <form action="{{ route('publish.project') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="MicroProject_ID" value="{{ $microProject[0]['MicroProject_ID'] }}">
                        <input type="hidden" name="id" value="{{ $microProject[0]['id'] }}">
                        <button type="submit" class="col-auto btn btn-success">
                            <i class="fa fa-upload"></i> Publish
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>


    <div class="single-card">
        <div class="row ps-2 text-end" style="font-size: 1.1vw;
                                        color: #616262;">
            <div> ID: <strong>{{$microProject[0]['MicroProject_ID']}}</strong> </div>
            <div> NO: <strong>{{$microProject[0]['id']}}</strong></div>
            <div> City: <strong>{{$microProject[0]['place']->name}}</strong></div>
        </div>
    </div>
    <div class="card-height">
        <div class="single-card">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
                    <div id="project-carousel" class="carousel slide w-100 project-carousel" data-bs-ride="carousel"
                         data-interval="1000">
                        <div class="carousel-inner project-carousel">
                            <?php $i = 0 ?>
                            @for($j = 0; $j<$iCount; $j++)
                                @if($microProject[0]->id == $images[$j]->project_id)
                                    <div class="carousel-item @if($i++ == 0) active @endif">
                                        <a href="{{substr($images[$j]->MPI_Path, 0, -4).'b.jpg'}}"
                                           data-fancybox="gallery-0"
                                           data-caption="{{$microProject[0]->english->MPE_Name}}">
                                            <img class="w-100 h-100" style="object-fit: cover" src="{{$images[$j]->MPI_Path}}">
                                        </a>
                                    </div>
                                @endif
                            @endfor
                        </div>
                        <button class="carousel-control-prev" data-bs-target="#project-carousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" data-bs-target="#project-carousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                    <div style="padding-left: .6vw">
                        <div class="row d-flex align-items-center" style="margin-top: 1vw">
                            <div class="col-9">
                                <div class="card-title">{{ucfirst($microProject[0]->english->MPE_Name)}}
                                    <textarea id="txt1210" style="display: none;"></textarea>
                                </div>
                            </div>
                            <div class="col-3 gap-3 d-flex justify-content-end align-items-baseline">
                                {{--@if(($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))--}}
                                {{--&& $microProject[0]['MPE_Published'] == '0'--}}
                                {{--&& $microProject[0]['english_check'] == '1' )--}}
                                {{--<img src="/images/ico/copy-icon.svg" onclick="copyTextA(1210)" class="copy-icon">--}}
                                {{--@endif--}}
                                @if($microProject[0]->latitude != '0' && $microProject[0]->longtitude)
                                    <a href="https://www.google.com/maps/search/?api=1&query={{$microProject[0]->latitude}},{{$microProject[0]->longtitude}}"
                                       target="_blank">
                                        <img class="location-icon"
                                             src="/images/ico/location-icon.svg">
                                    </a>
                                @endif
                                @if($microProject[0]->MPE_Video != '0')
                                    <a href="{{$microProject[0]->MPE_Video}}"
                                       id="microVideoA-{{$microProject[0]->id}}"
                                       data-fancybox="microVideoA-{{$microProject[0]->id}}">
                                        <img class="video-icon"
                                             src="/images/ico/video-ini-icon.svg">
                                    </a>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="card-title-section"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                <ul>
                                    <li>
                                        <strong class="card-subtitle">Beneficiary:</strong>
                                        <span>{{ucfirst($microProject[0]['MPE_BeneficiaryName'])}}</span>
                                    </li>
                                    <li><strong class="card-subtitle">Fund Date:</strong>
                                        <span> {{date('d/m/Y',strtotime($microProject[0]['MPE_FundedDate']))}}</span>
                                    </li>
                                    <li><strong class="card-subtitle">Age:</strong>
                                        <span> {{\Carbon\Carbon::createFromDate($microProject[0]['DOB'])->diff(\Carbon\Carbon::now())->format('%y')}}</span>
                                    </li>
                                    <li><strong class="card-subtitle">Family members:</strong>
                                        <span>{{$microProject[0]['FamilyMembers']}}</span>
                                    </li>
                                    <br>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start">
                                <div class="project-donor-logo">
                                    @if($microProject[0]->MPE_Donor==13)
                                        <div class="missio-donor-logo">
                                            <img class="w-100 h-100"
                                                 src="{{$microProject[0]->donor->logo}}">
                                        </div>
                                    @elseif($microProject[0]->MPE_Donor== 5)
                                        <div class="kerk-donor-logo">
                                            <img class="w-100 h-100"
                                                 src="{{$microProject[0]->donor->logo}}">
                                        </div>
                                    @elseif($microProject[0]->MPE_Donor== 3)
                                        <div class="louvre-donor-logo">
                                            <img class="w-100 h-100"
                                                 src="{{$microProject[0]->donor->logo}}">
                                        </div>
                                    @elseif($microProject[0]->MPE_Donor== 8)
                                        <div class="hungary-donor-logo">
                                            <img class="w-100 h-100"
                                                 src="{{$microProject[0]->donor->logo}}">
                                        </div>
                                    @else
                                        <div class="project-donor-logo">
                                            <img class="w-100 h-100"
                                                 src="{{$microProject[0]->donor->logo}}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div><strong class="card-subtitle">Skills and experience:</strong>
                                <span>{{ $microProject[0]->english->MPE_ExpSkill }}</span>
                            </div>
                            <div class="card-content">
                                @if(strlen($microProject[0]->english->MPE_Suffering)>30)
                                    <p>{!!implode(' ', array_slice(explode(' ', strip_tags($microProject[0]->english->MPE_Suffering)), 0, 20)).'...'!!}</p>
                                @else
                                    <p>{!! $microProject[0]->english->MPE_Suffering !!}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <button class="readmore-btn" id="btn-primary-0" data-toggle="modal"
                                        data-target="#project-detail-1872">Read More
                                </button>
                                <div class="modal fade project-detail" id="project-detail-1872" tabindex="-1"
                                     role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" id="close-0" data-dismiss="modal"
                                                        aria-hidden="true">
                                                    ×
                                                </button>
                                                <div class="row">
                                                    <div class="col-9">
                                                        <div class="card-title">{{ucfirst($microProject[0]->english->MPE_Name)}}
                                                            <textarea id="txt1210" style="display: none;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 gap-3 d-flex justify-content-end align-items-baseline">
                                                        <img src="/images/ico/copy-icon.svg"
                                                             onclick="copyTextA({{$microProject[0]['id']}})"
                                                             class="copy-icon">
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="card-title-section"></div>
                                                    </div>
                                                </div>
                                                <div id="project-carousel-{{$microProject[0]->id}}"
                                                     class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <?php $i = 0 ?>
                                                        @for($j = 0; $j<$iCount; $j++)
                                                            <li data-target="#project-carousel-{{$microProject[0]->id}}"
                                                                data-slide-to="{{$i++}}"
                                                                @if($i == 1)class="active" @endif>
                                                            </li>
                                                        @endfor
                                                    </div>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-inner project-carousel">
                                                            <?php $i = 0 ?>
                                                            @for($j = 0; $j<$iCount; $j++)
                                                                @if($microProject[0]->id == $images[$j]->project_id)
                                                                    <div class="carousel-item @if($i++ == 0) active @endif">
                                                                        {{--<p id="p-date">{{date('d/m/Y',strtotime(exif_read_data(ltrim($images[$j]->MPI_Path, '/'))['DateTimeOriginal']))}}</p>--}}
                                                                        <a href="{{substr($images[$j]->MPI_Path, 0, -4).'b.jpg'}}"
                                                                           data-fancybox="gallery-0"
                                                                           data-caption="{{$microProject[0]->english->MPE_Name}}">
                                                                            <img class="w-100 h-100" style="object-fit: cover" src="{{$images[$j]->MPI_Path}}">
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev"
                                                            data-bs-target="#project-carousel-{{$microProject[0]->id}}"
                                                            data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next"
                                                            data-bs-target="#project-carousel-{{$microProject[0]->id}}"
                                                            data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                                <div id="modal-swipe-0">
                                                    <div class="row mt-5">
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <strong class="card-subtitle">Beneficiary:</strong>
                                                                    <span>{{ucfirst($microProject[0]['MPE_BeneficiaryName'])}}</span>
                                                                    <div><strong class="card-subtitle">Fund
                                                                            Date:</strong><span> {{date('d/m/Y',strtotime($microProject[0]['MPE_FundedDate']))}}</span>
                                                                    </div>
                                                                    <div><strong
                                                                                class="card-subtitle">Age:</strong><span> {{\Carbon\Carbon::createFromDate($microProject[0]['DOB'])->diff(\Carbon\Carbon::now())->format('%y')}}</span>
                                                                    </div>
                                                                    <div><strong class="card-subtitle">Family
                                                                            members:</strong>
                                                                        <span>{{$microProject[0]['FamilyMembers']}}</span>
                                                                    </div>
                                                                    <br>
                                                                    <div><strong class="card-subtitle">Skills and
                                                                            experience:</strong>
                                                                        <span>{{ $microProject[0]->english->MPE_ExpSkill }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                             style="margin-top: .5vw">
                                                            <div class="project-donor-logo">
                                                                <img class="w-100 h-100"
                                                                     src="{{$microProject[0]->donor->logo}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="p-justify"></p>
                                                        <p>{{ $microProject[0]->english->MPE_ExpSkill }}</p>
                                                        <p></p>
                                                    </div>
                                                    <div class="card-content">
                                                        <p class="p-justify">{!!$microProject[0]->english->MPE_Suffering!!}</p>
                                                    </div>
                                                    <br>
                                                    {{--<div id="fb-root"></div>--}}
                                                    {{--<div class="fb-comments"--}}
                                                         {{--data-href="https://hcsyria.org/micro-projects#project{{$microProject[0]->MicroProject_ID}}"--}}
                                                         {{--data-width="100%"--}}
                                                         {{--data-numposts="3">--}}
                                                    {{--</div>--}}
                                                    <div class="swipe-to-close"
                                                         id="swipe-to-close-xopy"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stack('navbar_scripts')
<script>
    $(document).ready(function () {
        if ("ontouchstart" in document.documentElement) {
            $('.swipe-arrows').css('display', 'block');
            $(".touch-slide").swiperight(function () {
                $(this).carousel('prev');
            });
            $(".touch-slide").swipeleft(function () {
                $(this).carousel('next');
            });
        }
    });
</script>
<script>
    function copyTextA(id) {
        let el = document.getElementById('txt' + id);
        el.value = "https://hcsyria.org/projects/micro-projects?tab=aleppo&projectA=" + id;
        el.style.display = 'block';
        el.select();
        el.focus();
        document.execCommand('copy');
        el.style.display = 'none';
    }
</script>
<script>
    $(".readmore-btn").click(function () {
        $(this).next().modal('show');
    });
</script>
<script>
    $(".close").on('click', function () {
        $(".close").closest(".modal").modal('hide');
    });
</script>
@stack('fancyVideo')
</body>
</html>
