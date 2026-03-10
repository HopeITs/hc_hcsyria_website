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
        <form action="{{ route('initiatives.testimonies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="initiative_id" value="{{ $initiative->id }}">
            <input type="hidden" name="what_category_id" value="{{ $initiative->whatCategory->id }}">

            <div class="row">
                <div class="form-group col-md-8 col-md-offset-2">
                    <label for="image_path">Image</label>
                    <input type="file" name="image_path" id="image_path" accept="image/jpeg" required>
                </div>

                <div class="form-group col-md-8 col-md-offset-2">
                    <label for="name">Testimoniar Name</label>
                    <input type="text" name="name" id="name" class="form-control clear_values" placeholder="Testimoniar Name" required>
                </div>

                <div class="form-group col-md-8 col-md-offset-2">
                    <label for="text">Content</label>
                    <textarea name="text" id="text" class="form-control clear_values" placeholder="Content" required></textarea>
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="button" class="btn btn-default" onclick="window.history.back();">
                    <i class="fa fa-arrow-left"></i> Back
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-external-link"></i> Add
                </button>
            </div>
        </form>
    </div>
    @if(!$testimonies->isEmpty())
        <div class="container" style="padding-top: 30px;">
            <h3 class="title">Initiative Testimonies</h3>
            @foreach($testimonies as $testimony)
                <!-- Update Testimony Form -->
                <form action="{{ route('initiatives.testimonies.update', $testimony->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="initiative_id" value="{{ $initiative->id }}">
                    <input type="hidden" name="what_category_id" value="{{ $initiative->whatCategory->id }}">

                    <div class="row">
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label for="image_path_{{ $testimony->id }}">Image</label>
                            <input type="file" name="image_path" id="image_path_{{ $testimony->id }}" accept="image/jpeg" class="hidden testimony1{{ $testimony->id }}">
                            @if($testimony->image_path)
                                <i class="hidden testimony1{{ $testimony->id }}" style="color: #777;">(Choosing an image will erase the current one)</i>
                                <br>
                                <img src="{{ $testimony->image_path }}" style="height: 50px;">
                                <br>
                            @endif
                        </div>

                        <div class="form-group col-md-8 col-md-offset-2">
                            <label for="name_{{ $testimony->id }}">Testimoniar Name</label>
                            <input type="text" name="name" id="name_{{ $testimony->id }}" value="{{ $testimony->english['name'] }}"
                                   class="form-control testimonyReadonly{{ $testimony->id }}" placeholder="Testimoniar Name" readonly required>
                        </div>

                        <div class="form-group col-md-8 col-md-offset-2">
                            <label for="text_{{ $testimony->id }}">Content</label>
                            <textarea name="text" id="text_{{ $testimony->id }}" class="form-control testimonyReadonly{{ $testimony->id }}" placeholder="Content" readonly required>{{ $testimony->english['text'] }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <button type="button" class="btn btn-default hidden testimony1{{ $testimony->id }}"
                                onclick="cancel_edit({{ $testimony->id }});">
                            <i class="fa fa-times"></i> Cancel
                        </button>

                        <button type="submit" class="btn btn-primary hidden testimony1{{ $testimony->id }}">
                            <i class="fa fa-refresh"></i> Update
                        </button>
                    </div>
                </form>

                <!-- Delete Testimony Form -->
                <form action="{{ route('initiatives.testimonies.destroy', $testimony->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex gap-2 mt-3">
                        <button type="button" class="btn btn-default testimony2{{ $testimony->id }}"
                                onclick="edit({{ $testimony->id }});">
                            <i class="fa fa-arrow-left"></i><i class="fa fa-external-link"></i> Edit
                        </button>

                        <button type="submit" class="btn btn-danger testimony2{{ $testimony->id }}"
                                onclick="return ConfirmDelete({{ $testimony->id }});">
                            <i class="fa fa-trash-o"></i> Delete
                        </button>
                    </div>
                </form>
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
