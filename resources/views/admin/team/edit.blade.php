<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Edit Team Member</title>
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
        .btn-group{
            display: block;
        }
        #discSubCategories{
            display: none;
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
        <h3 class="title">Edit Team Member</h3>
        {!! Form::open(['route' => ['team.update', $profileData->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="form-group col-md-8 col-md-offset-2">
                <label>Belong To <span class="red-color">*</span></label><br>
                <div class="btn-group donors-list" data-toggle="buttons">
                    <label class="btn btn-primary @if($profileData->belong_to=='hope') active @endif ">
                        <input name="belong_to" type="radio" value="hope" @if($profileData->belong_to=='hope') checked @endif>
                        Hope Aleppo</label>
                    <label class="btn btn-primary @if($profileData->belong_to=='hope_h') active @endif ">
                        <input name="belong_to" type="radio" value="hope_h" @if($profileData->belong_to=='hope_h') checked @endif>
                        Hope Homs</label>
                    <label class="btn btn-primary @if($profileData->belong_to=='hope_d') active @endif ">
                        <input name="belong_to" type="radio" value="hope_d" @if($profileData->belong_to=='hope_d') checked @endif>
                        Hope Damascus</label>
                    <label class="btn btn-primary @if($profileData->belong_to=='study') active @endif ">
                        <input name="belong_to" type="radio" value="study" @if($profileData->belong_to=='study') checked @endif>
                        Study Zone</label>
                    <label class="btn btn-primary @if($profileData->belong_to=='disc') active @endif ">
                        <input name="belong_to" type="radio" value="disc" @if($profileData->belong_to=='disc') checked @endif>
                        DISC</label>
                    <label class="btn btn-primary @if($profileData->belong_to=='children') active @endif ">
                        <input name="belong_to" type="radio" value="children" @if($profileData->belong_to=='children') checked @endif>
                        Children Uni</label>
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('first_name', 'First Name')}} <span class="red-color">*</span>
                {{Form::text('first_name', $profileData->first_name, ['class' => 'form-control', 'placeholder' => 'First Name', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('last_name', 'Last Name')}} <span class="red-color">*</span>
                {{Form::text('last_name', $profileData->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required'])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('image_path', 'Image')}} <span class="red-color">*</span> <span><small>  (must be 300x300 and maximum: 50KB-100KB)</small></span>
                {{Form::file('image_path', ['accept' => 'image/jpeg'])}}
                <i style="color: #777;">(Choosing an image will erase the current one)</i>
                <br>
                <img src="{{$profileData->image_path}}" style="height: 100px;">
                <br>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('position', 'Position')}} <span class="red-color">*</span>
                {!!Form::textarea('position', $profileData->position, ['class' => 'form-control', 'rows' => '2', 'placeholder' => 'Position'])!!}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', $profileData->email == '0' ? '' : $profileData->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('facebook_link', 'Facebook Link')}}
                {{Form::text('facebook_link', $profileData->facebook_link == '0' ? '' : $profileData->facebook_link, ['class' => 'form-control', 'placeholder' => 'facebook link Link'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('linkedin_link', 'Linkedin Link')}}
                {{Form::text('linkedin_link', $profileData->linkedin_link == '0' ? '' : $profileData->linkedin_link, ['class' => 'form-control', 'placeholder' => 'linkedin link'])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('phone', 'Phone')}}
                {{Form::text('phone', $profileData->phone == '0' ? '' : $profileData->phone, ['class' => 'form-control', 'placeholder' => '+963 ### ### ###'])}}
            </div>
            <div class="form-group col-md-2 col-md-offset-2">
                {{Form::label('rank', 'Rank')}} <span class="red-color">*</span>
                {{Form::number('rank', $profileData->rank == '0' ? '' : $profileData->rank, ['class' => 'form-control', 'placeholder' => 'rank','min="1"','max="100"', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('inactive', 'Date of resignation')}}
                {{Form::text('inactive', $profileData->inactive == '0' ? '' : $profileData->inactive, ['class' => 'form-control', 'placeholder' => '00/00/0000'])}}
            </div>

        </div>
        <button class="btn btn-default" onclick="event.preventDefault();window.history.back();"
                style="margin-top: 15px"><i class="fa fa-arrow-left"></i> back
        </button>
        {{Form::button('<i class="fa fa-refresh"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-top: 15px;'])}}
        {!! Form::close() !!}
    </div>
</section>

@stack('navbar_scripts')

<script type="text/javascript" src="/js/selectize.min.js"></script>
<script>

</script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
</body>
</html>
