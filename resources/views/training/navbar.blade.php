@push('navbar_styles')
<link href="/css/training.css" rel="stylesheet">
@endpush
@push('navbar_body')
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand"><span class="fa fa-cog" aria-hidden="true"></span> Hope Center Orientation </span>
        </div>
        {{--<div>--}}
            {{--<a style="position: absolute;display: block;left:48%; float: none; text-align:center; padding-top: 3px" href="/">--}}
                {{--<img src="/images/logos/hc.svg" style="width: 80px;"/></a>--}}
        {{--</div>--}}
        <div id="navbar" class="collapse navbar-collapse" style="overflow-x: hidden;max-height: 615px;">
            <ul class="nav navbar-nav navbar-right"  style="margin-right: -10px;">
                @if($user->roles->contains('name', 'Admin'))
                    <li>
                        <div class="dropdown" id="notifications-dropdown">
                            <button type="button" id="notifications-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell-o"></i>
                                <span></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notifications-btn" id="notifications-body">
                            </div>
                        </div>
                    </li>
                @endif
                <li><a style="pointer-events: none">Welcome {{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="breadcrumb" style="padding-top: 20px;margin-top: 33px;position: fixed;top: 0px;width: 100%;Z-index: 1111;">
    <div class="container">
        <ul class="dashboard-nav">
            <li><a href="{{route('training.home')}}" @if(isset($page)) @if($page == 'home') class="active" @endif @endif>Home</a></li>
            {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'Photos Editor')  || $user->roles->contains('name', 'Viewer'))--}}
            <li><a href="{{route('training.chat.add')}}" @if(isset($page)) @if($page == 'add') class="active" @endif @endif>Add Note</a></li>
            {{--<li><a href="{{route('training.chat.add','strategy')}}" @if(isset($page)) @if($page == 'add strategy') class="active" @endif @endif>Add Project Strategy</a></li>--}}

            {{--@endif--}}
            {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'French Editor'))--}}
                {{--<li><a href="{{route('projects_french_index')}}" @if(isset($page)) @if($page == 'french') class="active" @endif @endif>French</a></li>--}}
            {{--@endif--}}
            {{--@if($user->roles->contains('name', 'Admin'))--}}
                {{--<li><a href="{{route('users_index')}}" @if(isset($page)) @if($page == 'users') class="active" @endif @endif>Users</a></li>--}}
                {{--<li><a href="{{route('log')}}" @if(isset($page)) @if($page == 'log') class="active" @endif @endif>Log</a></li>--}}
            {{--@endif--}}
        </ul>
    </div>
</div>
    <div style="height: 70px;"></div>
@endpush
@push('navbar_scripts')
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    @if($user->roles->contains('name', 'Admin'))
        <script>
            $(document).ready(function () {
                getNotifications();
                window.setInterval(getNotifications, 30 * 1000);
                $('#notifications-btn').click(function () {
                    $('#notifications-btn span').hide();
                    $.post('/clearNotificationsData', {_token: '{{ csrf_token() }}'});
                });
                $('#notifications-dropdown').on('hide.bs.dropdown', function () {
                    $('.not-seen').addClass('seen').removeClass('not-seen');
                });
            });
            let notificationPrevCount = 0;
            function getNotifications() {
                if ($('#notifications-dropdown').hasClass('open')) {
                    return;
                }
                $.get('/notificationsCount', function (data) {
                    if (data > 0) {
                        if (data < 10) {
                            $('#notifications-btn span').text(data);
                        }else {
                            $('#notifications-btn span').text('+9');
                        }
                        $('#notifications-btn span').show();
                    }
                });
                $.get('/notificationsData', function (data) {
                    if (data.length > notificationPrevCount) {
                        console.log(data);
                        $('#no-notification').hide();
                        for (let i = notificationPrevCount; i<data.length; i++) {
                            let notification;
                            let projectType;
                            if (data[i]['category'] == 0) {
                                projectType = 'Project';
                            } else if (data[i]['category'] == 1) {
                                projectType = 'Initiative';
                            } else if (data[i]['category'] == 2) {
                                projectType = 'Success';
                            }
                             else if (data[i]['category'] == 3) {
                                projectType = 'News';
                            }

                            if (data[i]['seen'] == 0) {
                                notification = '<div class="not-seen"><li><p class="notification-item">'+ projectType +' '+ data[i]['project_id'] +' '+ data[i]['operation'].toString().replace(projectType,'') +' by '+ data[i]['user']['name'] +'</p></li><div>'
                            }else {
                                notification = '<div class="seen"><li><p class="notification-item">'+ projectType +' '+ data[i]['project_id'] +' '+ data[i]['operation'].toString().replace(projectType,'') +' by '+ data[i]['user']['name'] +'</p></li></div>'
                            }
                            $('#notifications-body').prepend(notification);
                        }
                        notificationPrevCount = data.length;
                    }else if (data.length == 0){
                        $('#notifications-body').html('<p class="text-center" id="no-notification" style="margin:14px">There are no new notifications</p>');
                        $('#notifications-btn span').hide();
                    }
                });
            }
        </script>
    @endif
@endpush
