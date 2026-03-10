<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:url" content="https://hcsyria.org/micro-projects"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Hope Center"/>
    <meta property="og:image" content="https://hcsyria.org/images/logos/hc.svg"/>
    <title>{{$microProject[0]->french->MPE_Name}}</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/projects.css" rel="stylesheet">
    <link href="/css/micro_page.css" rel="stylesheet">

    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        form {
            display: inline;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<section id="projects" style="margin-top: 5%;">
    <div class="modal-dialog" style="z-index: 1">
        <button class="btn btn-default" onclick="window.history.back();" style="display: inherit;margin: -50px 0 30px 0;"><i class="fa fa-arrow-left"></i> back</button>
        <div style="float: right;margin-top: -60px">
            <a href="{{route('admin_project', $microProject[0]['id'])}}" class="btn btn-primary"><span
                    class="fa fa-eye"></span>&nbsp; English</a>
            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'French Editor'))
                <a href="{{route('edit.french.project', $microProject[0]['id'])}}" class="btn btn-primary edit-btn"><span
                        class="fa fa-edit"></span>&nbsp;Edit</a>
            @endif
            @if($user->roles->contains('name', 'Admin') && $microProject[0]['MPE_Published'] == '0')
                {!! Form::open(['route' => 'publish.project', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                {{Form::text('MicroProject_ID', $microProject[0]['MicroProject_ID'], ['class' => 'hidden'])}}
                {{Form::text('id', $microProject[0]['id'], ['class' => 'hidden'])}}
                {{Form::button('<i class="fa fa-upload"></i> Publish', ['type' => 'submit', 'class' => 'btn btn-success'])}}
                {!! Form::close() !!}
            @endif
        </div>

    </div>
    <div class="container">
        <div class="row" style="overflow: hidden;">
            <div class="col-xs-10 col-md-6">
                <h3 class="project-title">{{ucfirst($microProject[0]->french->MPE_Name)}}
                    <a  onclick="copyTextA({{$microProject[0]['id']}})"
                        class="video-ico cpy-link" >
                        <i class="fa fa-copy" aria-hidden="true"></i>
                    </a>
                    @if($microProject[0]['MPE_Location'] != '0')
                        <a  href="https://www.google.com/maps/search/?api=1&query={{$microProject[0]['MPE_Location']}}"
                            class="video-ico" target="_blank">
                            <i class="fa fa-map-marker" ></i>
                        </a>
                    @endif
                    @if($microProject[0]['MPE_Video'] != '0')
                        <a  href="#" class="video-ico launch-modal" data-modal-id="modal-video-{{$microProject[0]['id']}}">
                            <i class="fa fa-video-camera"></i>
                        </a>
                        <!-- VIDEO MODAL -->
                        <div class="modal fade" id="modal-video-{{$microProject[0]['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-video-label">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-video">
                                            <div class="video ">
                                                <iframe class="embed-responsive-item" src="{{$microProject[0]['MPE_Video']}}"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen
                                                        webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <textarea id="txt{{$microProject[0]->MicroProject_ID}}" style="display: none;"></textarea>
                </h3>
            </div>
        </div>
        <div class=" projects-height" style="margin-bottom: 0px;">
            <div class=" single-project">
                <div class="col-md-5">
                    <div id="project-carousel" class="carousel slide touch-slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $i = 0 ?>
                            @for($j = 0; $j<$iCount; $j++)
                                <li data-target="#project-carousel" data-slide-to="{{$i++}}"
                                    @if($i == 1)class="active" @endif>
                                </li>
                            @endfor
                        </ol>
                        <div class="carousel-inner">
                            <?php $i = 0 ?>
                            @for($j = 0; $j<$iCount; $j++)
                                @if($microProject[0]->MicroProject_ID == $images[$j]->MicroProject_ID)
                                    <div class="item @if($i++ == 0) active @endif">
                                        <p id="p-date">{{date('d/m/Y',strtotime(exif_read_data(ltrim($images[$j]->MPI_Path, '/'))['DateTimeOriginal']))}}</p>
                                        <a href="{{substr($images[$j]->MPI_Path, 0, -4).'b.jpg'}}"
                                           data-fancybox="gallery-0"
                                           data-caption="{{$microProject[0]->french->MPE_Name}}">
                                            <img src="{{$images[$j]->MPI_Path}}">
                                        </a>
                                    </div>
                                @endif
                            @endfor
                        </div><!--/.carousel-inner-->
                        <a class="left carousel-control" href="#project-carousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#project-carousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-xs-10 " style="margin-left: -15px;">
                            <ul class="post-meta" >
                                <li>
                                    @if($microProject[0]['MPE_PartnerName'] == '0')
                                        <strong> @lang('main.beneficiary')</strong> {{ucfirst($microProject[0]['MPE_BeneficiaryName'])}}
                                    @elseif($microProject[0]['MPE_PartnerName2'] == '0')
                                        <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProject[0]['MPE_BeneficiaryName']) .', '. ucfirst($microProject[0]['MPE_PartnerName'])}}
                                    @else
                                        <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProject[0]['MPE_BeneficiaryName']) .', '. ucfirst($microProject[0]['MPE_PartnerName']) .', '.ucfirst($microProject[0]['MPE_PartnerName2'])}}
                                    @endif
                                </li>
                                @if($microProject[0]['MPE_FundedDate'] !=  NULL)
                                    <li><strong> @lang('projects.fundDate')</strong> {{date('d/m/Y',strtotime($microProject[0]['MPE_FundedDate']))}}</li>
                                @endif
                                @if($microProject[0]['DOB'] != '0')
                                    <li> <strong> @lang('projects.age') </strong> {{\Carbon\Carbon::createFromDate($microProject[0]['DOB'])->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years') </li>
                                @endif
                                @if($microProject[0]['FamilyMembers'] != '0')
                                    <li> <strong> @lang('projects.family')  </strong> {{$microProject[0]['FamilyMembers']}} </li>
                                @endif
                                @if($microProject[0]->french->MPE_ExpSkill != '')
                                    <li> <strong> @lang('projects.skills') </strong> {{ $microProject[0]->french->MPE_ExpSkill }}</li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-xs-2">
                            <br>
                            @if($microProject[0]->MPE_Donor=='0')
                                <img class="donor-logo2 donor-logo-caritas " src="/images/logos/caritas.svg">
                            @elseif($microProject[0]->MPE_Donor=='1')
                                <img class="donor-logo2 donor-logo-salt " src="/images/logos/salt.svg">
                            @elseif($microProject[0]->MPE_Donor=='2')
                                <img class="donor-logo2 donor-logo-louver " src="/images/logos/loeuvre.svg">
                            @elseif($microProject[0]->MPE_Donor=='3')
                                <img class="donor-logo2 donor-logo-kia " src="/images/logos/kia.svg">
                            @elseif($microProject[0]->MPE_Donor=='5')
                                <img class="donor-logo2 donor-logo-salt " src="/images/logos/if.svg">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="project-content" >
                            @if(strlen($microProject[0]->french->MPE_Suffering)>800)
                                <p>{!!implode(' ', array_slice(explode(' ', $microProject[0]->french->MPE_Suffering), 0, 80)).'...'!!}</p>
                                <br>
                                <a href="#" class="btn btn-primary" id="btn-primary-{{$microProject[0]->MicroProject_ID}}"
                                   data-toggle="modal"
                                   data-target="#project-detail-{{ $microProject[0]->MicroProject_ID}}">@lang('main.readMore')
                                </a>
                                {{--MODAL--}}
                                <div class="modal fade project-detail" id="project-detail-{{ $microProject[0]->MicroProject_ID}}"
                                     tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" id="close-{{$microProject[0]['id']}}"
                                                        data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <div id="project-carousel-{{$microProject[0]['id']}}"
                                                     class="carousel slide touch-slide"
                                                     data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <?php $k = 0 ?>
                                                        @foreach($microProject[0]->images as $image)
                                                            <li data-target="#project-carousel-{{$microProject[0]['id']}}" data-slide-to="{{$k++}}"
                                                                @if($k == 1)class="active" @endif></li>
                                                        @endforeach
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <?php $k = 0 ?>
                                                        @foreach($microProject[0]->images as $image)
                                                            <div class="item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-{{$microProject[0]['id']}}"
                                                                   data-caption="{{ucfirst($microProject[0]->french->MPE_Name)}}" >
                                                                    <img src="{{$image->MPI_Path}}">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div><!--/.carousel-inner-->
                                                    <a class="left carousel-control"
                                                       href="#project-carousel-{{$microProject[0]['id']}}"
                                                       data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control"
                                                       href="#project-carousel-{{$microProject[0]['id']}}"
                                                       data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div id="modal-swipe-{{$microProject[0]['id']}}">
                                                    <h2>{{ucfirst( $microProject[0]->french->MPE_Name )}}</h2>
                                                    <br>
                                                    @if($microProject[0]->MPE_Donor=='0')
                                                        <img class="donor-logo-caritas" src="/images/logos/caritas.svg">
                                                    @elseif($microProject[0]->MPE_Donor=='1')
                                                        <img class="donor-logo-salt" src="/images/logos/salt.svg">
                                                    @elseif($microProject[0]->MPE_Donor=='2')
                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                    @elseif($microProject[0]->MPE_Donor=='3')
                                                        <img class="donor-logo-kia" src="/images/logos/kia.svg">
                                                    @elseif($microProject[0]->MPE_Donor=='5')
                                                        <img class="donor-logo-salt" src="/images/logos/if.svg">
                                                    @endif
                                                    @if($microProject[0]->MPE_PartnerName == '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiary')</strong> {{ucfirst($microProject[0]->MPE_BeneficiaryName)}}
                                                        </p>
                                                    @elseif($microProject[0]->MPE_PartnerName2 == '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProject[0]->MPE_BeneficiaryName) .', '. ucfirst($microProject[0]->MPE_PartnerName)}}
                                                        </p>
                                                    @else
                                                        <p>
                                                            <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProject[0]->MPE_BeneficiaryName) .', '. ucfirst($microProject[0]->MPE_PartnerName) .', '.ucfirst($microProject[0]->MPE_PartnerName2)}}
                                                        </p>
                                                    @endif
                                                    <p>
                                                        <strong> @lang('projects.fundDate')</strong> {{date('d/m/Y',strtotime($microProject[0]->MPE_FundedDate))}}
                                                    </p>

                                                    @if($microProject[0]->DOB != '0')
                                                        <p>
                                                            <strong> @lang('projects.age') </strong> {{ \Carbon\Carbon::parse($microProject[0]->DOB)->age}} @lang('projects.years')
                                                        </p>
                                                    @endif
                                                    @if($microProject[0]->FamilyMembers != '0')
                                                        <p>
                                                            <strong> @lang('projects.family')  </strong> {{$microProject[0]->FamilyMembers}}
                                                        </p>
                                                    @endif
                                                    @if($microProject[0]->french->MPE_ExpSkill != '')
                                                        <p>
                                                            <strong> @lang('projects.skills') </strong> {{$microProject[0]->french->MPE_ExpSkill}}
                                                        </p>
                                                    @endif
                                                    <br>
                                                    <div class="clearfix">
                                                        <p class="p-justify">{!!$microProject[0]->french->MPE_Suffering!!}</p>
                                                    </div>
                                                    <br>
                                                    <a class="cpy-link" onclick="copyTextA({{$microProject[0]->MicroProject_ID}})">@lang('main.cpyLink')</a>
                                                    <textarea id="txt{{$microProject[0]->MicroProject_ID}}" style="display: none;"></textarea>
                                                    @if($microProject[0]->MPE_Location != '0')
                                                        <img src="/images/projects/tracker.png" id="tracker-img">
                                                        <a href="https://www.google.com/maps/search/?api=1&query={{$microProject[0]->MPE_Location}}"
                                                           id="info-link"
                                                           target="_blank"> @lang('main.seeOnMap')
                                                        </a>
                                                    @endif
                                                    <br>
                                                    <br>
                                                    @if($microProject[0]->MPE_Video != '0')
                                                        <div class="video">
                                                            <iframe
                                                                    src="{{$microProject[0]->MPE_Video}}"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen>
                                                            </iframe>
                                                        </div>
                                                        <hr style="border-color: #43484E;">
                                                    @endif
                                                    {{--<div id="fb-root"></div>--}}
                                                    {{--<div class="fb-comments"--}}
                                                         {{--data-href="https://hcsyria.org/micro-projects#project{{$microProject[0]->MicroProject_ID}}"--}}
                                                         {{--data-width="100%" data-numposts="3">--}}
                                                    {{--</div>--}}
                                                    <br>
                                                    <div class="text-center swipe-arrows">
                                                        <i class="fa fa-angle-double-up"></i>
                                                        <p>@lang('main.swipeUp')</p>
                                                    </div>
                                                    <div class="swipe-to-close" id="swipe-to-close-{{$microProject[0]['id']}}"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p>{!!$microProject[0]->french->MPE_Suffering !!}</p>
                            @endIf
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stack('navbar_scripts')
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
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
</body>
</html>
