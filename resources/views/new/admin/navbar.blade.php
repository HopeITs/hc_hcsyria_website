@push('navbar_styles')
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
@endpush
@push('navbar_body')
    <nav class="navbar navbar-light navbar-expand-md navbar-expand-sm fixed-top" aria-label="navbar">
        <div class="container">
            <a class="navbar-brand" href="https://hcsyria.org/home">
                {{--<span class="fa fa-cog"--}}
                <img class="h-100" href="hcsyria.org" src="/images/ico/Hope center Dashboard Logo 1.svg">
            </a>
            <button class="navbar-toggler" id="my-navbar-toggle" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample04"
                    aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav me-auto align-items-center">
                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
                        <li class="nav-item d-flex align-items-center dropdown">
                            {{--<button type="button" id="notifications-btn" data-bs-toggle="dropdown" aria-haspopup="true"--}}
                            {{--aria-expanded="false">--}}


                            <div class="dropdown" id="notifications-dropdown">
                                <a class="btn dropdown-toggle" role="button" id="notifications-btn"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell-o"></i>
                                    <span></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="notifications-btn" id="notifications-body">
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li class="nav-item d-flex align-items-center"><a style="pointer-events: none">Welcome {{ Auth::user()->name }}</a></li>
                    <li class="nav-item d-flex align-items-center"><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Logout <i class="fa fa-sign-out"
                                                                                   aria-hidden="true"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item d-flex align-items-center" id="switch-mode">
                        <input type="checkbox" id="switch"/>
                        <div class="switch-btn">
                            <label for="switch">
                                <div class="icons">
                                    <span class="material-symbols-rounded">
                    <img src="/images/ico/dark_mode.png" style="height: 17px;transform: rotate(275deg);">
                </span>
                                    <span class="material-symbols-rounded">
                    <img src="/images/ico/light_mode.png" style="height: 20px;">
                </span>
                                </div>
                            </label>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <div type="button" class="guide_btn" data-toggle="tooltip" data-placement="top"
                             title="Dashboard Guide">
                            <a class="d-flex" target="_blank" href="/files/Dashboard Guide.pdf">
                                <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 13.5 13.5">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #444;
                                                stroke-width: 0px;
                                            }
                                        </style>
                                    </defs>
                                    <g id="Layer_1-2" data-name="Layer 1">
                                        <path class="cls-1"
                                              d="M6.75,0C3.02,0,0,3.02,0,6.75s3.02,6.75,6.75,6.75,6.75-3.02,6.75-6.75S10.47,0,6.75,0ZM7.66,10.42c-.06.15-.15.28-.27.38-.11.11-.24.19-.39.25-.15.06-.31.09-.48.09s-.34-.03-.48-.09c-.15-.06-.28-.15-.39-.25-.11-.11-.2-.24-.26-.38-.06-.15-.1-.31-.1-.47s.03-.33.1-.47c.06-.14.15-.27.26-.38.11-.11.24-.19.39-.25.29-.12.67-.13.97,0,.14.06.28.15.39.25.11.11.2.24.27.38.06.15.1.31.1.47s-.03.32-.09.47ZM9.17,5.4c-.09.23-.2.43-.34.6-.13.17-.28.31-.44.44l-.41.31c-.12.09-.22.18-.31.26-.06.06-.09.12-.11.19l-.2.98h-1.6l-.15-1.11s0-.05,0-.08c0-.03,0-.06,0-.09,0-.21.05-.4.16-.56.09-.14.21-.27.34-.39.13-.11.26-.21.41-.31.13-.09.25-.18.36-.29.1-.09.18-.2.25-.31.06-.1.09-.22.09-.36,0-.15-.04-.27-.14-.35-.19-.17-.63-.16-.87-.09-.11.04-.21.08-.3.12-.09.05-.17.09-.24.13-.34.19-.73.08-.9-.24l-.57-.87.17-.14c.15-.12.31-.24.48-.34.17-.11.36-.2.56-.28.2-.08.42-.15.65-.19.55-.11,1.25-.09,1.77.08.31.1.58.25.8.45.22.2.4.44.52.71.12.28.18.58.18.91s-.05.59-.13.83Z"/>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="breadcrumb">
        <div class="container">
            <ul class="dashboard-nav">
                <li><a href="{{route('home')}}"
                       @if(isset($page)) @if($page == 'home') class="active" @endif @endif>Home</a></li>
                @if($user->permissions->contains('name','Micro Projects') || ($user->roles->contains('name', 'Admin')))
                    <li><a href="{{route('projects_index')}}"
                           @if(isset($page)) @if($page == 'projects') class="active" @endif @endif>Micro Projects</a>
                    </li>
                @endif
                @if($user->permissions->contains('name','School To School') || ($user->roles->contains('name', 'Admin')))
                    <li><a href="{{route('school_index')}}"
                           @if(isset($page)) @if($page == 'school') class="active" @endif @endif>School To School</a>
                    </li>
                @endif
                @if($user->permissions->contains('name','Children University') || ($user->roles->contains('name', 'Admin')))
                    <li><a href="{{route('children_index')}}"
                           @if(isset($page)) @if($page == 'children') class="active" @endif @endif>Children
                            University</a>
                    </li>
                @endif
                @if($user->permissions->contains('name','DISC') || ($user->roles->contains('name', 'Admin')))
                    <li><a href="{{route('disc_index')}}"
                           @if(isset($page)) @if($page == 'disc') class="active" @endif @endif>DISC</a></li>
                @endif
                @if($user->permissions->contains('name','Study Zone') || ($user->roles->contains('name', 'Admin')))
                    <li><a href="{{route('study_index')}}"
                           @if(isset($page)) @if($page == 'study') class="active" @endif @endif>Study Zone</a></li>
                @endif
                @if($user->permissions->contains('name','LEAP') || ($user->roles->contains('name', 'Admin')))
                    <li><a href="{{route('leap_index')}}"
                           @if(isset($page)) @if($page == 'leap') class="active" @endif @endif>LEAP</a></li>
                @endif
                @if($user->permissions->contains('name','Initiatives') || ($user->roles->contains('name', 'Admin')))
                    <li><a href="{{route('initiatives.index')}}"
                           @if(isset($page)) @if($page == 'initiatives-index') class="active" @endif @endif>Initiatives</a>
                    </li>
                @endif
                @if($user->permissions->contains('name','Newsletter') || ($user->roles->contains('name', 'Admin')))
                    <li><a href="{{route('news.index')}}"
                           @if(isset($page)) @if($page == 'news-index') class="active" @endif @endif>News</a></li>
                @endif
                @if($user->permissions->contains('name','Roots')))
                    <li><a href="{{route('roots.index')}}"
                           @if(isset($page)) @if($page == 'roots-index') class="active" @endif @endif>Roots Of Hope</a></li>
                @endif
                @if($user->roles->contains('name', 'Admin'))
                    <li><a href="{{route('team.index')}}"
                           @if(isset($page)) @if($page == 'team') class="active" @endif @endif>Our Team</a></li>
                    <li><a href="{{route('users_index')}}"
                           @if(isset($page)) @if($page == 'users') class="active" @endif @endif>Users</a></li>
                @endif
                @if($user->roles->contains('name', 'Admin') || ($user->roles->contains('name', 'English Editor')))
                    <li><a href="{{route('log')}}" @if(isset($page)) @if($page == 'log') class="active" @endif @endif>Log</a>
                    </li>
                @endif
                @if($user->roles->contains('name','Publisher') || ($user->roles->contains('name','Admin') && $user->permissions->contains('name','Cover Photos')  ))
                    <li><a href="{{route('covers')}}"
                           @if(isset($page)) @if($page == 'covers') class="active" @endif @endif>Cover Photos</a>
                    </li>
                @endif
                @if($user->roles->contains('name','Publisher') || ($user->roles->contains('name','Admin') && $user->permissions->contains('name','Public Content') || $user->permissions->contains('name','Public Content') ))
                    <li><a href="{{route('content')}}"
                           @if(isset($page)) @if($page == 'content') class="active" @endif @endif>Public Content</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    {{--<livewire:offline/>--}}

@endpush
@push('navbar_scripts')
    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
        <script>
            $(document).ready(function () {
                const toggleSwitch = document.getElementById('switch');
                const currentTheme = localStorage.getItem('theme');

                if (currentTheme) {
                    document.documentElement.setAttribute('data-bs-theme', currentTheme);

                    if (currentTheme === 'dark') {
                        toggleSwitch.checked = true;
                    }
                }

                function switchTheme(e) {
                    if (e.target.checked) {
                        document.documentElement.setAttribute('data-bs-theme', 'dark');
                        localStorage.setItem('theme', 'dark');
                    }
                    else {
                        document.documentElement.setAttribute('data-bs-theme', 'light');
                        localStorage.setItem('theme', 'light');
                    }
                }

                toggleSwitch.addEventListener('change', switchTheme, false);
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
                        } else {
                            $('#notifications-btn span').text('+9');
                        }
                        $('#notifications-btn span').show();
                        // $('.toast').style.display = "block";
                    }
                });
                $.get('/notificationsData', function (data) {
                    if (data.length > notificationPrevCount) {
                        $('#no-notification').hide();
                        for (let i = notificationPrevCount; i < data.length; i++) {
                            let category = data[i]['category'];
                            let projectType = '';
                            let prefix = '';

                            // EMERGENCY CLEANUP: This fixes the broken "Project 0" notifications already in your database
                            if (category == 0 && data[i]['operation'].includes('Tag')) {
                                category = 7; 
                            }

                            // Define the categories (7 is now Tags)
                            if (category == 0) projectType = 'Project';
                            else if (category == 1) projectType = 'Initiative';
                            else if (category == 2) projectType = 'Success';
                            else if (category == 3) projectType = 'News';
                            else if (category == 4) projectType = 'Editions';
                            else if (category == 5) projectType = 'Team Member';
                            else if (category == 6) projectType = 'Subscriber';
                            else if (category == 7) projectType = ''; // <--- Tags are left completely blank
                            else if (category == 9) projectType = 'Cover';
                            else if (category == 10) projectType = 'Project Content';
                            else if (category == 11) projectType = 'Magazine';

                            // SAFEGUARD: Only print the Category Word and ID if the ID is NOT 0
                            if (projectType !== '' && data[i]['project_id'] !== null && data[i]['project_id'] != 0) {
                                prefix = projectType + ' ' + data[i]['project_id'] + ' ';
                            }

                            // Clean up the text
                            let operationText = data[i]['operation'].toString();
                            if (projectType !== '') {
                                operationText = operationText.replace(projectType, '').trim();
                            }

                            // Build the final text string
                            let notificationText = prefix + operationText + ' by ' + data[i]['user']['name'];

                            let notification;
                            if (data[i]['seen'] == 0) {
                                notification = '<div class="not-seen"><li><p class="notification-item">' + notificationText + '</p></li></div>';
                            } else {
                                notification = '<div class="seen"><li><p class="notification-item">' + notificationText + '</p></li></div>';
                            }

                            $('#notifications-body').prepend(notification);
                        }
                        notificationPrevCount = data.length;
                    } else if (data.length == 0) {
                        $('#notifications-body').html('<p class="text-center" id="no-notification" style="margin:14px">There are no new notifications</p>');
                        $('#notifications-btn span').hide();
                    }
                });
            }
        </script>
        {{--delay: 5000--}}
        {{--// Show toast--}}
    @endif
@endpush
@push('preloader')
    <script>
        $(window).on('load', function () {
            setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
        });

        function removeLoader() {
            $(".preloader").fadeOut(500, function () {
                // fadeOut complete. Remove the loading div
                $(".preloader").remove(); //makes page more lightweight
            });
            AOS.init({
                duration: 1200,
            })
        };
    </script>
@endpush
@push('imageOrder')
    <script src="vendor/jquery/jquery-ui/jquery-ui.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        //Reorder with jQuery Drag and Drop
        $(document).ready(function () {
            let dropIndex;
            let url = location.href;

            $("#image-list").sortable({
                update: function (event, ui) {
                    dropIndex = ui.item.index();
                }
            });
            $('.image-sortable').each(function () {
                $(this).sortable({
                    update: function (event, ui) {
                        dropIndex = ui.item.index();
                    }
                });
            });
            $('.submit-order-btn').click(function (e) {
                e.preventDefault();

                let imageIdsArray = [];
                let categoryId = $(this).data("id");

                $('#image-list-' + categoryId + ' li').each(function () {
                    let id = $(this).attr('id');
                    let split_id = id.split("_");
                    imageIdsArray.push(split_id[1]);
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: "/admin/covers/order/" + categoryId,
                    data: {
                        imageIds: imageIdsArray,
                        what_category_id: categoryId,
                    },
                    success: function (response) {
                        swal('Images has successfully reordered !!');
                        let res = document.getElementById('txtresponse');
                        res.style.display = 'inline-block';
                        $('#txtresponse').text(response);
                        res.classList.add('alert');
                        res.classList.add('alert-success');
                    }
                });
            });
            $('#submit').click(function (e) {
                let imageIdsArray = [];

                $('#image-list li').each(function (index) {
                    let id = $(this).attr('id');
                    let split_id = id.split("_");
                    imageIdsArray.push(split_id[1]);
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                if (url.includes('children/images')) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('childrenorder.images') }}",
                        data: {imageIds: imageIdsArray},
                        success: function (response) {
                            swal('Images has successfully reordered !!');
                            let res = document.getElementById('txtresponse');
                            res.style.display = 'inline-block';
                            $('#txtresponse').text(response);
                            res.classList.add('alert');
                            res.classList.add('alert-success');
                        }
                    });
                }
                else if (url.includes('projects/images')) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('order.images') }}",
                        data: {imageIds: imageIdsArray},
                        success: function (response) {
                            swal('Images has successfully reordered !!');
                            let res = document.getElementById('txtresponse');
                            res.style.display = 'inline-block';
                            $('#txtresponse').text(response);
                            res.classList.add('alert');
                            res.classList.add('alert-success');
                        }
                    });
                }
                else if (url.includes('disc/images')) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('discorder.images') }}",
                        data: {imageIds: imageIdsArray},
                        success: function (response) {
                            swal('Images has successfully reordered !!');
                            let res = document.getElementById('txtresponse');
                            res.style.display = 'inline-block';
                            $('#txtresponse').text(response);
                            res.classList.add('alert');
                            res.classList.add('alert-success');
                        }
                    });
                }
                else if (url.includes('leap/images')) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('leaporder.images') }}",
                        data: {imageIds: imageIdsArray},
                        success: function (response) {
                            swal('Images has successfully reordered !!');
                            let res = document.getElementById('txtresponse');
                            res.style.display = 'inline-block';
                            $('#txtresponse').text(response);
                            res.classList.add('alert');
                            res.classList.add('alert-success');
                        }
                    });
                }
                else if (url.includes('school/images')) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('schoolorder.images') }}",
                        data: {imageIds: imageIdsArray},
                        success: function (response) {
                            swal('Images has successfully reordered !!');
                            let res = document.getElementById('txtresponse');
                            res.style.display = 'inline-block';
                            $('#txtresponse').text(response);
                            res.classList.add('alert');
                            res.classList.add('alert-success');
                        }
                    });
                }
                else if (url.includes('study/images')) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('studyorder.images') }}",
                        data: {imageIds: imageIdsArray},
                        success: function (response) {
                            swal('Images has successfully reordered !!');
                            let res = document.getElementById('txtresponse');
                            res.style.display = 'inline-block';
                            $('#txtresponse').text(response);
                            res.classList.add('alert');
                            res.classList.add('alert-success');
                        }
                    });
                }
                else if (url.includes('news/images')) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('newsorder.images') }}",
                        data: {imageIds: imageIdsArray},
                        success: function (response) {
                            swal('Images has successfully reordered !!');
                            let res = document.getElementById('txtresponse');
                            res.style.display = 'inline-block';
                            $('#txtresponse').text(response);
                            res.classList.add('alert');
                            res.classList.add('alert-success');
                        }
                    });
                }
                else if (url.includes('initiatives/images')) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('initiativesorder.images') }}",
                        data: {imageIds: imageIdsArray},
                        success: function (response) {
                            swal('Images has successfully reordered !!');
                            let res = document.getElementById('txtresponse');
                            res.style.display = 'inline-block';
                            $('#txtresponse').text(response);
                            res.classList.add('alert');
                            res.classList.add('alert-success');
                        }
                    });
                }

                e.preventDefault();
            });
        });

    </script>

@endpush
