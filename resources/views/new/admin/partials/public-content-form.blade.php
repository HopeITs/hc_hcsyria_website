<div class="card">
    <h3 class="title position-relative">Project Brief
        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
            <a href="{{route('projectBrief.images.create', $what->id)}}"
               class="position-absolute btn mb-2 btn-primary edit-btn" style="right: 1vw">
                <i class='fa fa-image'></i> Media</a>
        @endif
        @if(optional($what->content->first())->description)
            <a href="{{route('projectBrief.show', $what->id)}}" class="position-absolute btn btn-primary"
               style="right: 7vw; margin-left: 15px;">
                <i class="fa fa-eye"></i>&nbsp;View
            </a>
        @endif
    </h3>
    <div class="card-body">
        <form action="{{ route('project-content.update', $what->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

{{--             Logo--}}
{{--                <div class="mb-3">--}}
{{--                    <label class="form-label">Logo</label><br>--}}
{{--                    @if($what->content[0]->logo)--}}
{{--                        <img src="{{ asset($what->content[0]->logo) }}" alt="Logo" height="100" class="mb-2 d-block">--}}
{{--                    @endif--}}
{{--                    <input type="file" name="logo" class="form-control">--}}
{{--                </div>--}}

{{--             Description--}}
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4"
                          class="form-control">{!! $what->content->first()->description ?? '' !!}</textarea>
            </div>
            <div class="row mb-3">
                <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-refresh"></i> Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <h3 class="title position-relative">Project Partners
        @if($partners_previous || $partners_ongoing)
            <a href="{{ route('project.show_partners', $what->id) }}" class="position-absolute btn btn-primary"
               style="right: 1vw;">
                <i class="fa fa-eye"></i>&nbsp;View
            </a>
        @endif
    </h3>
    <form id="donorsForm" action="{{ route('project.save_partners', $what->id) }}" method="POST">
        @csrf
        <div class="card-body">
            {{-- Ongoing Partners --}}
            <div class="row mb-3">
                <div class="form-group col">
                    <label>Ongoing Partners <span class="red-color">*</span></label><br>
                    <div class="btn-group flex-wrap w-100" role="group">
                        @foreach($donors as $donor)
                            <input type="checkbox" class="btn-check" value="{{$donor->id}}" name="partners_ongoing[]"
                                   id="partners_ongoing_{{$donor->id}}"
                                   autocomplete="off" @if(in_array($donor->id, $partners_ongoing)) checked @endif>
                            <label class="btn btn-outline-primary"
                                   for="partners_ongoing_{{$donor->id}}">{{$donor->name}}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Previous Partners --}}
            <div class="row mb-3">
                <div class="form-group col">
                    <label>Previous Partners <span class="red-color">*</span></label><br>
                    <div class="btn-group flex-wrap w-100" role="group">
                        @foreach($donors as $donor)
                            <input type="checkbox" class="btn-check" value="{{$donor->id}}" name="partners_previous[]"
                                   id="partners_previous_{{$donor->id}}"
                                   autocomplete="off" @if(in_array($donor->id, $partners_previous)) checked @endif>
                            <label class="btn btn-outline-primary"
                                   for="partners_previous_{{$donor->id}}">{{$donor->name}}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-refresh"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
