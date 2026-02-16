<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'home' ?>
    @include('training.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .alert {
            margin-top: 2rem;
        }

        th,
        td {
            text-align: center;
        }

        .edit-btn {
            margin-left: 6px;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<div id="main">
     <div class="container">
         <br>
         <h1 id="h11" class="text-center"> OUR VISION </h1>
         <h1 class="text-center" style="color: #aa0719;">
             "الحفاظ على الوجود المسيحي"
         </h1>
        <br><br>

         <div id="values">
             <div class="row text-center">
                 @for($i = 0; $i<count($values); $i = $i + 1)
                     {{--@for($j = 0; $j<1; $j++)--}}
                         <div class="col-md-2 @if($i == 0) col-md-offset-1 @endif col-sm-4 col-xs-6">
                             <div class="thumbnail static" >
                                <a class="value_link" id="v-{{$values[$i]->id}}" onclick="clickLink({{$values[$i]->id}})">
                                    <img src="/images/mission/mission1.png" alt="values" width="100%" height="100%">
                                </a>
                                <h4 class=""><strong>{{ucfirst($values[$i]->name)}}</strong></h4>
                                 {{--<p class="caption" style="text-align: center;">{{ucfirst($values[$i]->description)}}</p>--}}
                             </div>
                         </div>
                     {{--@endfor--}}
                 @endfor
             </div>
         </div>
         <div style="margin: 150px;"></div>

         <div id="projects">
             <div class="row text-center" style="display: flex; flex-wrap: wrap;">
                 @for($i = 0; $i<count($projects); $i = $i + 1)
                     <div style="display: flex; flex-direction: column;justify-content: center;"
                             class="col-md-2 col-sm-4 col-xs-6" >
                         <div class="thumbnail static" >
                             <a href="" id="p-{{$projects[$i]->id}}">
                                 <img class="" src="{{$projects[$i]->logo}}" alt="projects"
                                      @if($i >=1 && $i<=2) style="width: 150%;" @endif
                                      @if($i >3 ) style="width: 50%;" @endif >
                             </a>
                             <h4 class=""><strong>{{ucfirst($projects[$i]->name)}}</strong></h4>
                         </div>
                     </div>
                 @endfor
             </div>
         </div>

     </div>
</div>

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
<script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

<script type="text/javascript">
    {{--$('.value_link').on("click",function () {--}}
        {{--var el = document.getElementById('txt'+id);--}}
        {{--$('#projects').hide();--}}
            {{--// projects.css('visibility', 'hidden');--}}
            {{--// projects.css('visibility', 'visible');--}}
    {{--});--}}
    function clickLink(id)
    {
        {{--@foreach($values as $v)--}}
             {{--@for($i = 0; $i<count($v->projects); $i = $i + 1)--}}
                {{--@if($v->projects[$i]->id == id)--}}
                    {{--var el = document.getElementById('p-'+id);--}}
                    {{--el.hide();--}}
                {{--@endif--}}
             {{--@endfor--}}
        {{--@endforeach--}}

        {{--if($('#h11').is(':visible'))--}}
            {{--$('#h11').hide();--}}
        {{--else--}}
            {{--$('#h11').show();--}}
    };

        {{--var el = document.getElementById('txt'+id);--}}
        {{--el.value = "https://hcsyria.org/projects/micro-projects/?projectA="+id;--}}
        {{--el.style.display = 'block';--}}
        {{--el.select();--}}
        {{--el.focus();--}}
        {{--document.execCommand('copy');--}}
        {{--el.style.display = 'none';--}}
</script>
<script>
    {{--$(window).load(function () {--}}
        {{--@foreach($imagesRehabilitation as $i=>$image)--}}
        {{--@if($i != 0)--}}
        {{--$("#container{{$image->id}}").hide();--}}
        {{--@endif--}}
        {{--@endforeach--}}
    {{--});--}}
    {{--@foreach($imagesRehabilitation as $i=>$image)--}}
    {{--$('#btn-{{$i}}').click(function () {--}}
        {{--$('#btn-{{$i}}').addClass('active');--}}
        {{--@foreach($imagesRehabilitation as $j=>$imageJ)--}}
        {{--@if($i != $j)--}}
        {{--$('#btn-{{$j}}').removeClass('active');--}}
        {{--$('#container{{$imageJ->id}}').hide();--}}
        {{--@endif--}}
        {{--@endforeach--}}
        {{--$('#container{{$image->id}}').show();--}}
    {{--});--}}
    {{--@endforeach--}}
    {{--@if(count($imagesRehabilitation) < 2)--}}
    {{--$('.pagination').hide();--}}
    {{--@endif--}}
</script>

</body>