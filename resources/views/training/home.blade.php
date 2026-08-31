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
                         <div class="col-md-2 @if($i == 0) col-md-offset-1 @endif col-sm-4 col-xs-6">
                             <div class="thumbnail static" >
                                <a class="value_link" id="v-{{$values[$i]->id}}" onclick="clickLink({{$values[$i]->id}})">
                                    <img src="/images/mission/mission1.png" alt="values" width="100%" height="100%">
                                </a>
                                <h4 class=""><strong>{{ucfirst($values[$i]->name)}}</strong></h4>
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
    function clickLink(id)
    {
             {{--@endfor--}}

    };

</script>
<script>
</script>

</body>