<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | Add project image</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .small-image,
        #add-image-group,
        #remove-image-group,
        #images-count {
            margin: 30px 0 10px 0;
        }
        .buttons-div{
            margin-top: 20px
        }
        #images-count {
            color: #333;
            background-color: #fff;
            padding: 4px 8px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            vertical-align: middle;
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
        <h3 class="title">Add Image</h3>
        {!! Form::open(['route' => 'store.image', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::hidden('project_id', $project->id)}}

        <div class="row">
            <div class="form-group col-md-2">
                {{Form::label('MicroProject_ID', 'City of Project')}}
                {{Form::text('City', ($project->place->name), ['class' => 'form-control', 'placeholder' => 'City', 'required', 'readonly'])}}
            </div>
            <div class="form-group col-md-2">
                {{Form::label('MicroProject_ID', 'Project Number')}}
                {{Form::number('MicroProject_ID', $project->MicroProject_ID, ['class' => 'form-control', 'placeholder' => 'Project Number', 'required', 'readonly'])}}
            </div>
            <div class="form-group col-md-4">
                {{Form::label('name', 'Project Name')}}
                {{Form::text('name', $project->english->MPE_Name, ['class' => 'form-control', 'placeholder' => 'Project Name', 'readonly'])}}
            </div>
            <div class="form-group col-md-4">
                {{Form::label('beneficiary', 'Beneficiary Name')}}
                {{Form::text('beneficiary', $project->MPE_BeneficiaryName, ['class' => 'form-control', 'placeholder' => 'Project Manager', 'readonly'])}}
            </div>

            <div class="form-group col-md-12">
                {{--{{Form::label('image_count', 'Number of images you want to upload')}}--}}
                <div class="" id="images-count">3</div>
                <button class="btn btn-danger" id="remove-image-group" onclick="event.preventDefault();"><span class="fa fa-minus"></span></button>
                <button class="btn btn-success" id="add-image-group" onclick="event.preventDefault();"><span class="fa fa-plus"></span></button>
            </div>

            <div class="row" id="images-group">
                <div class="image-group">
                <div class="form-group col-md-12" style="padding-top: 20px">
                    {{Form::label('small_image', 'Small Image')}}
                    {{Form::file('small_image[]', ['accept' => 'image/jpeg', 'required'])}}
                </div>
                <div class="form-group col-md-12">
                    {{Form::label('big_image', 'Big Image')}}
                    {{Form::file('big_image[]', ['accept' => 'image/jpeg', 'required'])}}
                </div>
                </div>
                <div class="image-group">
                    <div class="form-group col-md-12 small-image">
                        {{Form::label('small_image', 'Small Image')}}
                        {{Form::file('small_image[]', ['accept' => 'image/jpeg', 'required'])}}
                    </div>
                    <div class="form-group col-md-12">
                        {{Form::label('big_image', 'Big Image')}}
                        {{Form::file('big_image[]', ['accept' => 'image/jpeg', 'required'])}}
                    </div>
                </div>
                <div class="image-group">
                    <div class="form-group col-md-12 small-image">
                        {{Form::label('small_image', 'Small Image')}}
                        {{Form::file('small_image[]', ['accept' => 'image/jpeg', 'required'])}}
                    </div>
                    <div class="form-group col-md-12">
                        {{Form::label('big_image', 'Big Image')}}
                        {{Form::file('big_image[]', ['accept' => 'image/jpeg', 'required'])}}
                    </div>
                </div>
            </div>
        </div>


        <div class="buttons-div">
            <button class="btn btn-default" onclick="event.preventDefault();window.history.back();" style="margin-top: 15px"><i class="fa fa-arrow-left"></i> Back</button>
            {{--<button class="btn btn-success" onclick="event.preventDefault();window.location = '/admin/home';" style="margin-top: 15px; float: right"><i class="fa fa-arrow-right"></i> Finished</button>--}}
            <a href="{{route('admin_project', $project['id'])}}" class="btn btn-primary" style="margin-top: 15px;"><i class="fa fa-eye"></i>&nbsp;View</a>

            {{Form::button('<i class="fa fa-external-link"></i> Upload', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-top: 15px;'])}}
        </div>
        {!! Form::close() !!}
     </div>

    @if(!$images->isEmpty())
        <hr>
        <div class="container">
            <h3 class="title" style="margin: 0">Uploaded Images</h3>
            {!! Form::open(['route' => ['delete.images', $project->id] , 'method' => 'delete', 'enctype' => 'multipart/form-data']) !!}
            <br><br>
            <div class="row">
                <div class="form-group col-md-12">
                    @foreach($images as $img)
                        {{Form::text('project_id', $project->id, ['class' => 'hidden'])}}
                        <label style="margin-right: 30px">
                            <input type="checkbox" name="{{$img['id']}}" value="1"/>
                            <img src="{{$img['MPI_Path']}}" style="height: 100px; margin: 0 5px 5px 0">
                        </label>
                    @endforeach
                </div>
            </div>
            {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger'])}}
            {!! Form::close() !!}

            <div style="margin-top: 15px;"></div>
        </div>
    @endif
</section>

@stack('navbar_scripts')

<script>
    let image_group = '<div class="image-group">'+
        '<div class="form-group col-md-12 small-image">'+
        '<label for="small_image">Small Image</label>'+
        '<input accept="image/jpeg" required="" name="small_image[]" type="file">'+
        '</div><div class="form-group col-md-12">'+
        '<label for="big_image">Big Image</label>'+
        '<input accept="image/jpeg" required="" name="big_image[]" type="file">'+
        '</div>'+
        '</div>';
    let images_count = 3;
    $('#add-image-group').click(function () {
        images_count++;
        $('#images-group').append(image_group);
        $('#images-count').html(images_count);
    });
    $('#remove-image-group').click(function () {
        if (images_count!==1){
            images_count--;
            $('#images-group').children().last().remove();
            $('#images-count').html(images_count);
        }
    })
</script>