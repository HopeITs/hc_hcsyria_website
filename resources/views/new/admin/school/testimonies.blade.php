<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | Initiative Testimonies</title>
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
        <h3 class="title">Create Testimony</h3>
        {!! Form::open(['route' => 'initiatives.testimonies.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::hidden('initiative_id', $initiative->id) }}
        {{Form::hidden('what_category_id', $initiative->whatCategory->id)}}
        <div class="row">
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('image_path', 'Image')}}
                {{Form::file('image_path', ['accept' => 'image/jpeg', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('name', 'Testimoniar Name')}}
                {{Form::text('name', '', ['class' => 'form-control clear_values', 'placeholder' => 'Testimoniar Name', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('text', 'Content')}}
                {{Form::textarea('text', '', ['class' => 'form-control clear_values', 'placeholder' => 'Content', 'required'])}}
            </div>
        </div>
        <button class="btn btn-default" onclick="event.preventDefault();window.history.back();" style="margin-top: 15px"><i class="fa fa-arrow-left"></i> back</button>
        {{Form::button('<i class="fa fa-external-link"></i> Add', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-top: 15px;'])}}
        {!! Form::close() !!}
    </div>
    @if(!$testimonies->isEmpty())
        <div class="container" style="padding-top: 30px;">
            <h3 class="title">Initiative Testimonies</h2>
            @foreach($testimonies as $testimony)
                {!! Form::open(['route' => ['initiatives.testimonies.update', $testimony->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                {{ Form::hidden('initiative_id', $initiative->id) }}
                {{Form::hidden('what_category_id', $initiative->whatCategory->id)}}
                <div class="row">
                    <div class="form-group col-md-8 col-md-offset-2">
                        {{Form::label('image_path', 'Image')}}
                        {{Form::file('image_path', ['accept' => 'image/jpeg', 'class' => 'hidden testimony1'.$testimony->id])}}
                        @if($testimony->image_path)
                            <i class="hidden testimony1{{$testimony->id}}" style="color: #777;">(Choosing an image will erase the current one)</i>
                            <br>
                            <img src="{{$testimony->image_path}}" style="height: 50px;">
                            <br>
                        @endif
                    </div>
                    <div class="form-group col-md-8 col-md-offset-2">
                        {{Form::label('name', 'Testimoniar Name')}}
                        {{Form::text('name', $testimony->english['name'], ['class' => 'form-control testimonyReadonly'.$testimony->id, 'placeholder' => 'Testimoniar Name', 'readonly', 'required'])}}
                    </div>
                    <div class="form-group col-md-8 col-md-offset-2">
                        {{Form::label('text', 'Content')}}
                        {{Form::textarea('text', $testimony->english['text'], ['class' => 'form-control testimonyReadonly'.$testimony->id, 'placeholder' => 'Content', 'readonly', 'required'])}}
                    </div>
                </div>
                <button class="btn btn-default hidden testimony1{{$testimony->id}}" onclick="event.preventDefault();cancel_edit({{$testimony->id}});" style="margin-top: 15px"><i class="fa fa-times"></i> Cancel</button>
                {{Form::button('<i class="fa fa-refresh"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary hidden testimony1'.$testimony->id, 'style' => 'margin-top: 15px;'])}}
                {!! Form::close() !!}
                {!! Form::open(['route' => ['initiatives.testimonies.destroy', $testimony->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) !!}
                <button class="btn btn-default testimony2{{$testimony->id}}" onclick="event.preventDefault();edit({{$testimony->id}});"><i class="fa fa-arrow-lef"></i><i class="fa fa-external-link"></i> Edit</button>
                {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger testimony2'.$testimony->id, 'onclick' => 'return ConfirmDelete('.$testimony->id.')'])}}
                {!! Form::close() !!}
                <hr style="border-color: #999">
            @endforeach
        </div>
    @endif
</section>

@stack('navbar_scripts')

<script>
    $('.clear_values').val('');
    function edit(id) {
        $('.testimony1'+id).removeClass('hidden');
        $('.testimony2'+id).addClass('hidden');
        $('.testimonyReadonly'+id).attr('readonly', false);
    }
    function cancel_edit(id) {
        $('.testimony1'+id).addClass('hidden');
        $('.testimony2'+id).removeClass('hidden');
        $('.testimonyReadonly'+id).attr('readonly', true);
    }
    function ConfirmDelete(e) {
        if (confirm("Do you really want to: \nDelete " + e + " ?"))
            return true;
        else
            return false;
    }
</script>

</body>
</html>
