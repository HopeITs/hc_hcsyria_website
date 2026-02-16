<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Editions</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/selectize.min.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .btn-group > .btn {
            border-radius: 0;
            margin: 0 !important;
            width: 50%;
        }
        .select-width {
            width: 100%;
        }
        .form-group {
            margin-bottom: 20px;
        }
        #micro_projects_group {
            display: none;
        }
        .selectize-control .option.active {
            color: #fff;
            background-color: #428bca;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<section style="padding-top: 30px;">
    <div class="container">
        @include('admin.messages')
    </div>
    <div class="container">
        <h3 class="title">Edition</h3>
        {!! Form::open(['route' => 'news.edition.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="form-group col-sm-4 col-sm-offset-0">
                {{Form::label('name', 'Name')}} <span class="red-color">*</span>
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name', 'required'])}}
            </div>
            <div class="form-group col-sm-4 col-sm-offset-0">
                {{Form::label('name_french', 'Name in French')}} <span class="red-color">*</span>
                {{Form::text('name_french', '', ['class' => 'form-control', 'placeholder' => 'Name in French', 'required'])}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-1">
                <button class="btn btn-default" onclick="event.preventDefault();window.history.back();"
                        style="margin-top: 15px"><i class="fa fa-arrow-left"></i> Back  ..
                </button>
            </div>
            <div class="form-group col-md-1">
                {{Form::button('<i class="fa fa-external-link"></i> Create',
                    ['type' => 'submit',
                     'class' => 'btn btn-primary',
                      'style' => 'margin-top: 15px;'] ) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</section>

<div style="margin-top: 30px;"></div>

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="tableHope" style="width: 100%">
            @if($editions)
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>French Name</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach($editions as $edition)
                <tbody>
                    <tr>
                        <td>{{$edition['id']}}</td>
                        <td>{{$edition['name']}}</td>
                        <td>{{$edition['name_french']}}</td>
                        <td>@if($edition['online'] == '0') Offline @else Online @endif </td>

                        <td class="text-right">
                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                @if($edition['online'] == '0')
                                    {!! Form::open(['route' => 'news.edition.online' , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                    {{Form::text('ID', $edition['id'], ['class' => 'hidden'])}}
                                    {{Form::button('<i class="fa fa-globe"></i> Online', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['route' => 'news.edition.offline' , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                    {{Form::text('ID', $edition['id'], ['class' => 'hidden'])}}
                                    {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-basic'])}}
                                    {!! Form::close() !!}
                                @endif
                            @endif
                            @if($user->roles->contains('name', 'Admin'))
                                <form action="{{ route('news.edition.destroy', $edition['id']) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$edition['id']}})">
                                        <i class="fa fa-trash-o"></i> Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                </tbody>
                @endforeach
            @endif
        </table>
    </div>
</div>


@stack('navbar_scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
<script type="text/javascript" src="/js/selectize.min.js"></script>

<script>
    $(document).ready(function () {
        $('#link-microproject').selectize();
    });
    $("input[name='what_category_id']").change(function () {
        if($("input[value='13']").is(':checked')) {     //products
            $('#micro_projects_group').show();
            $('#link-microproject').attr('required', true);
        }else {
            $('#micro_projects_group').hide();
            $('#link-microproject').attr('required', false);
        }
    });
</script>
<script>
    $('.btn-funded-conversion').click(function () {
        let id = this.dataset.content;
        if($(this).hasClass("btn-default")) {
            $.get('/mark_online/'+id);
        }else {
            $.get('/mark_offline/'+id);
        }
        $('button[data-content = "'+id+'"]').toggleClass("btn-success").toggleClass("btn-default");
    });
</script>
</body>
</html>
