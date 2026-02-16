<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | Translate Project</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

@stack('navbar_body')

<section style="padding-top: 30px;">
    <div class="container">
        @include('admin.messages')
    </div>
    <div class="container">
        <h3 class="title">Translate Project</h3>
        {!! Form::open(['route' => 'store.french.project', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::hidden('project_id', $project->id)}}
        <div class="row">
            <div class="col-md-4 col-md-offset-2" style="margin-bottom: 10px;">
                {{Form::label('MicroProject_ID', 'Project Number')}}
                {{Form::number('MicroProject_ID', $project->MicroProject_ID, ['class' => 'form-control', 'placeholder' => 'Project Number', 'required', 'readonly'])}}
            </div>

            <div class="form-group col-md-4">
                {{Form::label('beneficiary', 'Beneficiary Name')}}
                {{Form::text('beneficiary', $project->MPE_BeneficiaryName, ['class' => 'form-control', 'placeholder' => 'Project Manager', 'readonly'])}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('name', 'Project Name')}}
                {{Form::text('', $project->english->MPE_Name, ['class' => 'form-control', 'placeholder' => 'Project Name', 'readonly'])}}
                <br>
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Project Name', 'required'])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('expSkill', 'Skills and Experiences')}}
                <div class="readonly-div">{!!$project->english->MPE_ExpSkill!!}</div>
                <br>
                {{Form::textarea('expSkill', '', ['class' => 'form-control', 'id' => 'editor2', 'placeholder' => 'Skills and Experiences'])}}
            </div>


            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('suffering', 'Suffering and Need')}}
                <div class="readonly-div">{!!$project->english->MPE_Suffering!!}</div>
                <br>
                {{Form::textarea('suffering', '', ['class' => 'form-control', 'id' => 'editor', 'placeholder' => 'Suffering and Need'])}}
            </div>

        </div>
        <button class="btn btn-default" onclick="event.preventDefault();window.history.back();" style="margin-top: 15px"><i class="fa fa-arrow-left"></i> back</button>
        {{Form::button('<i class="fa fa-external-link"></i> Translate', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-top: 15px;'])}}
        {!! Form::close() !!}
    </div>
</section>

@stack('navbar_scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
