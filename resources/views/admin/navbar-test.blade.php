@push('navbar_styles')
    <link href="/css/dashboard.css" rel="stylesheet">
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
                <span class="navbar-brand"><span class="fa fa-cog" aria-hidden="true"></span> Hope Center Dashboard </span>
            </div>
            {{--<div>--}}
            {{--<a style="position: absolute;display: block;left:48%; float: none; text-align:center; padding-top: 3px" href="/">--}}
            {{--<img src="/images/logos/hc.svg" style="width: 80px;"/></a>--}}
            {{--</div>--}}
            <div id="navbar" class="collapse navbar-collapse" style="overflow-x: hidden;max-height: 615px;">

                <ul class="nav navbar-nav navbar-right"  style="margin-right: -10px;">
                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
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
                    <li><a href="{{route('study_index')}}"
                           @if(isset($page)) @if($page == 'study') class="active" @endif @endif>Study Zone</a></li>
            </ul>
        </div>
    </div>
    <div style="height: 70px;"></div>
@endpush
@push('navbar_scripts')
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
@endpush
