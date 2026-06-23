<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    <?php $page = 'projects' ?>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="mai youssef">
    <title>Admin | Projects</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    {{--<link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">--}}
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    {{--<link href="{{asset('css/main-new.css')}}" rel="stylesheet">--}}
    <link href="/css/tabs.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    {{--@stack('navbar_styles')--}}
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/js/html5shiv.js"></script>
    <script type="text/javascript" src="/js/respond.min.js"></script> <![endif]-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link rel="stylesheet" href="/css/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/js/buttons.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="/css/buttons.bootstrap5.min.css">
    <script type="text/javascript" src="/js/jszip.min.js"></script>
    <script type="text/javascript" src="/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="/js/buttons.colVis.min.js"></script>
</head>
<body>
@stack('navbar_body')
<div id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('new.admin.messages')
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                    <a class="btn btn-success" href="{{route('projects_create')}}"><i
                            class="fa fa-plus-square"></i>&nbsp; Create new Project</a>
                @endif
            </div>
        </div>
        <div>
            <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative mt-5" id="tabList"
                role="tablist">
                @php $activeSet = false; @endphp
                @foreach($allPlacesProjects as $placeName => $projects)
                    @if($user->roles->contains('name', 'Admin') || $user->places->contains('name', $placeName) || $user->places->contains('name', 'All'))
                        <li class="nav-item " role="presentation">
                            <button id="{{ str_replace(' ', '', $placeName) }}Tab"
                                    class="nav-link projectTab {{ !$activeSet ? 'active' : '' }}"
                                    data-bs-toggle="tab"
                                    data-tab="{{ str_replace(' ', '', $placeName) }}"
                                    data-bs-target="#{{ str_replace(' ', '', $placeName) }}"
                                    role="tab"
                                    aria-controls="{{ str_replace(' ', '', $placeName) }}"
                                    aria-selected="{{ !$activeSet ? 'true' : 'false' }}">
                                {{$placeName}}
                                <small>({{ $projects->count() }})</small>
                            </button>
                        </li>
                        @php $activeSet = true; @endphp
                    @endif
                @endforeach

                {{-- Static Tabs --}}
                <li class="nav-item" role="presentation">
                    <button id="CanceledTab" class="nav-link projectTab" data-bs-toggle="tab"
                            data-bs-target="#Canceled" role="tab" data-tab="Canceled"
                            aria-controls="Canceled" aria-selected="false">
                        Canceled <small>({{ $allProjectsCanceled->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="PendingTab" class="nav-link projectTab" data-bs-toggle="tab" data-tab="Pending"
                            data-bs-target="#Pending" role="tab"
                            aria-controls="Pending" aria-selected="false">
                        Pending <small>({{ $allProjectsPending->count() }})</small>
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-3" id="tabContent">
                @foreach ($allPlacesProjects as $city => $projects)
                    <div class="tab-pane fade @if ($loop->first) show active @endif" id="{{ str_replace(' ', '', $city) }}" role="tabpanel">
                        <table id="table-{{ str_replace(' ', '', $city) }}" class="table table-bordered table-striped " style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Published</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Beneficiary</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Funded Date</th>
                                <th class="text-center">Donor</th>
                                <th class="text-center">Mobile</th>
                                <th class="text-center">Map</th>
                                <th class="text-center">Video</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="text-center">{{ $project->id }}</td>
                                    <td class="text-center">{{ $project->MicroProject_ID }}</td>
                                    <td class="text-center">{{ $project->MPE_Published ? 'Yes' : 'No' }}</td>
                                    <td class="text-center">{{ $project->english->MPE_Name }}</td>
                                    <td class="text-center">{{ $project->MPE_BeneficiaryName }}</td>
                                    <td class="text-center">{{ $project->type->name ?? '' }}</td>
                                    <td class="text-center">{{ $project->MPE_FundedDate }}</td>
                                    <td class="text-center">{{ $project->donor->code ?? '' }}</td>
                                    <td class="text-center">{{ $project->Mobile }}</td>
                                    <td class="text-center">
                                        @if ($project->latitude != '0' && $project->longtitude != '0')
                                            <a href="https://www.google.com/maps/search/?api=1&query={{ $project->latitude }},{{ $project->longtitude }}"
                                               class="btn btn-success" target="_blank">
                                                <i class="fa fa-map-marker"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($project->MPE_Video != '0')
                                            <a href="#" class="btn btn-success">
                                                <i class="fa fa-video-camera"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin/project/{{ $project->id }}" class="btn btn-primary mb-2">
                                            <span class="fa fa-eye"></span> View
                                        </a>

                                        @if ($user->roles->contains('name', 'Admin')|| $user->roles->contains('name', 'English Editor'))
                                            <a href="/admin/projects/edit/{{ $project->id }}"
                                               class="btn btn-primary mb-2">
                                                <span class="fa fa-edit"></span> Edit
                                            </a>
                                        @endif

                                        @if ($user->roles->contains('name', 'Admin')|| $user->roles->contains('name', 'Photos Editor'))
                                            <a href="/admin/projects/images/{{ $project->id }}"
                                               class="btn btn-primary mb-2">
                                                <i class="fa-solid fa-plus-minus"></i> Image
                                            </a>
                                        @endif

                                        @if ($user->roles->contains('name', 'Admin'))
                                            <form action="{{route('delete.project')}}" method="POST" style="display:inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mb-2 btn-delete-confirm" type="button" data-id="{{$project['id']}}" data-tag="{{$project['MicroProject_ID']}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        @endif
                                            @if ($project->MPE_Published == 1 && ($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher')))
                                                <form action="/admin/projects/unpublish/{{ $project->id }}" method="POST" style="display:inline;" class="form-offline">
                                                    @csrf
                                                    <button type="button" class="btn btn-danger mb-2 btn-offline-confirm">
                                                        <i class="fa fa-power-off"></i>
                                                    </button>
                                                </form>
                                            @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
                <div class="tab-pane fade" id="Canceled" role="tabpanel" aria-labelledby="Canceled" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="table-canceled"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center hidden-col">NO</th>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Published</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">City</th>
                            <th scope="col" class="text-center">Beneficiary</th>
                            <th scope="col" class="text-center">Type</th>

                            <th scope="col" class="text-center">Fund Date</th>
                            <th scope="col" class="text-center">Donor</th>

                            <th scope="col" class="text-center">Mobile</th>
                            <th scope="col" class="text-center">Location</th>
                            <th scope="col" class="text-center">Video</th>
                            <th scope="col" class="text-center"> Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allProjectsCanceled as $project)
                            <tr>
                                <td class="text-center ">{{ $project['id'] }}</td>
                                <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                                <td class="text-center">{{ $project->MPE_Published ? 'Yes' : 'No' }}</td>
                                <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                                <td class="text-center">{{$project['place']['name']}}</td>
                                <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>
                                <td class="text-center">{{ $project['type']['name'] ?? '' }}</td>

                                <td class="text-center">{{$project['MPE_FundedDate']}}</td>
                                <td class="text-center">
                                    @if($project['MPE_Donor'] == '')
                                        N/A
                                    @else
                                        {{ $project->donor->code ?? 'N/A' }}
                                    @endif
                                </td>

                                <td class="text-center">{{$project['Mobile']}}</td>
                                <td class="text-center">
                                    @if ($project['latitude'] != '0' && $project['longtitude'] != '0')
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ $project['latitude'] }},{{ $project['longtitude'] }}"
                                           class="btn btn-success" target="_blank">
                                            <i class="fa fa-map-marker"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($project['MPE_Video'] != '0')
                                        <a href="#" class="btn btn-success icon-btn ">
                                            <i class="fa fa-video-camera"></i>
                                        </a>
                                    @endif
                                    @if($project['MPE_Video'] != '0')
                                        <a href="{{$project['MPE_Video']}}" class="btn btn-success icon-btn"
                                           id="microVideo-{{$project['id']}}"
                                           data-fancybox="microVideo-{{$project['id']}}">
                                            <i class="fa fa-video-camera"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(count($project->images) != 0)
                                        <i class="fa fa-picture-o"
                                           style="padding: 0.3vw 0.6vw;"></i>
                                    @endif
                                    <a href="{{route('admin_project', $project['id'])}}"
                                       class="btn btn-primary mb-2"><span
                                            class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('edit.project', $project['id'])}}"
                                           class="btn btn-primary edit-btn mb-2"><span
                                                class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                        <a href="{{route('add.image', $project['id'])}}"
                                           class="btn btn-primary edit-btn mb-2">
                                            <i class='fa-solid fa-plus-minus'></i>
                                            Image</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{route('delete.project') }}"
                                              method="POST" style="float: right; padding-left: 10px"
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger mb-2 btn-delete-confirm" type="button" data-id="{{$project['id']}}" data-tag="{{$project['MicroProject_ID']}}">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                            @if ($project->MPE_Published == 1 && ($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher')))
                                                <form action="/admin/projects/unpublish/{{ $project->id }}" method="POST" style="display:inline;" class="form-offline">
                                                    @csrf
                                                    <button type="button" class="btn btn-danger mb-2 btn-offline-confirm">
                                                        <i class="fa fa-power-off"></i>
                                                    </button>
                                                </form>
                                            @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="Pending" role="tabpanel" aria-labelledby="Pending" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="table-pending"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center hidden-col">NO</th>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Published</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">City</th>
                            <th scope="col" class="text-center">Beneficiary</th>
                            <th scope="col" class="text-center">Type</th>

                            <th scope="col" class="text-center">Fund Date</th>
                            <th scope="col" class="text-center">Donor</th>

                            <th scope="col" class="text-center">Mobile</th>
                            <th scope="col" class="text-center">Location</th>
                            <th scope="col" class="text-center">Video</th>
                            <th scope="col" class="text-center"> Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allProjectsPending as $project)
                            <tr>
                                <td class="text-center">{{ $project->id }}</td>
                                <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                                <td class="text-center">{{ $project->MPE_Published ? 'Yes' : 'No' }}</td>
                                <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                                <td class="text-center">{{$project['place']['name']}}</td>
                                <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>
                                <td class="text-center">{{ $project['type']['name'] ?? '' }}</td>

                                <td class="text-center">{{$project['MPE_FundedDate']}}</td>
                                <td class="text-center">
                                    @if($project['MPE_Donor'] == '')
                                        N/A
                                    @else
                                        {{ $project->donor->code ?? 'N/A' }}
                                    @endif
                                </td>

                                <td class="text-center">{{$project['Mobile']}}</td>
                                <td class="text-center">
                                    @if ($project['latitude'] != '0' && $project['longtitude'] != '0')
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ $project['latitude'] }},{{ $project['longtitude'] }}"
                                           class="btn btn-success" target="_blank">
                                            <i class="fa fa-map-marker"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($project['MPE_Video'] != '0')
                                        <a href="#" class="btn btn-success icon-btn ">
                                            <i class="fa fa-video-camera"></i>
                                        </a>
                                    @endif
                                    @if($project['MPE_Video'] != '0')
                                        <a href="{{$project['MPE_Video']}}" class="btn btn-success icon-btn"
                                           id="microVideo-{{$project['id']}}"
                                           data-fancybox="microVideo-{{$project['id']}}">
                                            <i class="fa fa-video-camera"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(count($project->images) != 0)
                                        <i class="fa fa-picture-o"
                                           style="padding: 0.3vw 0.6vw;"></i>
                                    @endif
                                    <a href="{{route('admin_project', $project['id'])}}"
                                       class="btn btn-primary mb-2"><span
                                            class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('edit.project', $project['id'])}}"
                                           class="btn btn-primary edit-btn mb-2"><span
                                                class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                        <a href="{{route('add.image', $project['id'])}}"
                                           class="btn btn-primary edit-btn mb-2">
                                            <i class='fa-solid fa-plus-minus'></i> Image</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{route('delete.project') }}"
                                              method="POST"
                                              style="float: right;padding-left: 10px;"
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger mb-2 btn-delete-confirm" type="button" data-id="{{$project['id']}}" data-tag="{{$project['MicroProject_ID']}}">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                            @if ($project->MPE_Published == 1 && ($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher')))
                                                <form action="/admin/projects/unpublish/{{ $project->id }}" method="POST" style="display:inline;" class="form-offline">
                                                    @csrf
                                                    <button type="button" class="btn btn-danger mb-2 btn-offline-confirm">
                                                        <i class="fa fa-power-off"></i>
                                                    </button>
                                                </form>
                                            @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stack('navbar_scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // 1. GLOBAL SUCCESS ALERT (Centered)
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{!! session('success') !!}",
                position: 'center',
                showConfirmButton: false,
                timer: 4000
            });
        @endif

        // 2. EDIT CONFIRMATION
        $('.btn-edit-confirm').click(function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            Swal.fire({
                title: 'Edit Project?',
                text: "Are you sure you want to edit this project?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, edit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });

        // 3. MAKE OFFLINE CONFIRMATION
        $('.btn-offline-confirm').click(function (e) {
            e.preventDefault();
            let form = $(this).closest("form");
            Swal.fire({
                title: 'Make Offline?',
                text: "This project will no longer be visible to the public.",
                icon: 'error',
                iconSize: 'small',
                showCancelButton: true,
                confirmButtonColor: '#f39c12',
                cancelButtonColor: '#676768',
                confirmButtonText: 'Yes, make offline'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // 4. DESTROY CONFIRMATION (AJAX)
        $('.btn-delete-confirm').click(function (e) {
            e.preventDefault();
            let id = $(this).data("id");
            let micro_id = $(this).data("tag");

            Swal.fire({
                title: `Delete Project ID ${micro_id}?`,
                text: "You won't be able to revert this!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        url: "{{ route('delete.project') }}",
                        data: { "form": id },
                        dataType: "json",
                        beforeSend: function () {
                            Swal.fire({ title: 'Deleting...', allowOutsideClick: false, didOpen: () => { Swal.showLoading() } });
                        },
                        success: function (data) {
                            // Centered Success Alert on successful delete
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: data.message,
                                position: 'center',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function () {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
<script>

    $('.btn-funded-conversion').click(function () {
        let id = this.dataset.content;
        if ($(this).hasClass("btn-default")) {
            $.post('/makeFundedRequest/' + id, {_token: $('meta[name="csrf-token"]').attr('content')});
        } else {
            $.post('/cancelMakeFundedRequest/' + id, {_token: $('meta[name="csrf-token"]').attr('content')});
        }
        $('button[data-content = "' + id + '"]').toggleClass("btn-success").toggleClass("btn-default");
    });
</script>
<script>
    $(document).ready(function () {
        @foreach ($allPlacesProjects as $city => $projects)
        new DataTable('#table-{{ str_replace(' ', '', $city) }}', {
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            buttons: ['excel', 'pdf', 'colvis'],
            columnDefs: [
                {targets: [0, 2], visible: false},
                {targets: 1, searchable: false}
            ]
        });
        @endforeach
        new DataTable('#table-pending', {
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            buttons: ['excel', 'pdf', 'colvis'],
            columnDefs: [
                {targets: [0, 2], visible: false},
                {targets: 1, searchable: false}
            ]
        });
        new DataTable('#table-canceled', {
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            buttons: ['excel', 'pdf', 'colvis'],
            columnDefs: [
                {targets: [0, 2], visible: false},
                {targets: 1, searchable: false}
            ]
        });
    });
</script>
<script>
    $(document).on('click', '.projectTab', function () {
        const tabValue = $(this).data('tab');
        let url = new URL(window.location.href);
        url.searchParams.set('tab', tabValue.replace(/\s+/g, ''));
        window.history.pushState({path: url.href}, '', url.href);
    });

</script>
<script>
    $(document).ready(function () {
        let url1 = window.location.href;
        let url2 = new URL(url1);
        let tab = url2.searchParams.get("tab") + "Tab";
        let t = document.getElementById(tab);
        let tt = new bootstrap.Tab(t);
        tt.show();
    });
</script>
@stack('fancyVideo')
@include('new.admin.scripts.popup-messages')
</body>
