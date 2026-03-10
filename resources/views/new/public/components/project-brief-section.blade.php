<div id="about-section">
    <div class="seperator-line" style="background: white;height: 1vw;"></div>
    <div class="horizontal-line"></div>
    <div style="margin-top: 7vw" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid">
            <div class="row">
                @if( $project->name <> "Family to Family")
                    {{-- Left Section --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="mt-lg-0 mt-md-0 mt-sm-0 padding-screen">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-start" data-aos="fade-up"
                                     data-aos-duration="600">
                                    <img src="{{ $project->logo }}" class="d-lg-block d-none project-logo">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 3vw;">
                                <div class="col d-flex justify-content-end flex-column">
                                    <div class="project-brief" data-aos="fade-up" data-aos-duration="800">
                                        Project Brief
                                    </div>
                                    <font class="project-brief-desc" data-aos="fade-up" data-aos-duration="1000">
                                        {!! $project->description !!}
                                    </font>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Right Section: Either video or image --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-start video-spaces">
                        <div class="video position-relative w-100 h-100" data-aos="fade-up" data-aos-duration="600">
                            @php
                                $hasVideo = collect($project->media)->contains(fn($m) => $m->mediaType === 'video');
                            @endphp

                            {{-- Show video if available --}}
                            @if($hasVideo)
                                @foreach($project->media as $item)
                                    @if($item->mediaType === 'video')
                                        <iframe width="560" height="315"
                                                src="{{ $item->mediaURL }}"
                                                frameborder="0"
                                                allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                    @endif
                                @endforeach
                            @else
                                {{-- Only ONE carousel --}}
                                <div id="DynamicCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner position-relative">
                                        @foreach($project->media as $index => $item)
                                            @if($item->mediaType === 'image')
                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                    <img class="w-100 h-100 d-block" style="object-fit: cover;"
                                                         src="{{ $item->mediaURL }}" alt="Slide {{ $index + 1 }}"/>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <button class="carousel-control-prev" type="button"
                                            data-bs-target="#DynamicCarousel"
                                            data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                            data-bs-target="#DynamicCarousel"
                                            data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                    <div class="carousel-indicators">
                                        @foreach($project->media as $index => $item)
                                            @if($item->mediaType === 'image')
                                                <button type="button"
                                                        data-bs-target="#DynamicCarousel"
                                                        data-bs-slide-to="{{ $index }}"
                                                        class="{{ $index === 0 ? 'active' : '' }}"
                                                        aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                                        aria-label="Slide {{ $index + 1 }}"></button>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <img src="/images/home/image-mask.png" class="image-mask"/>
                        </div>
                    </div>
                @else
                    {{-- Left Section --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 video-spaces">
                        <div class=" position-relative w-100 h-100" data-aos="fade-up" data-aos-duration="600">
                            @php
                                $hasVideo = collect($project->media)->contains(fn($m) => $m->mediaType === 'video');
                            @endphp

                            {{-- Show video if available --}}
                            @if($hasVideo)
                                @foreach($project->media as $item)
                                    @if($item->mediaType === 'video')
                                        <iframe width="560" height="315"
                                                src="{{ $item->mediaURL }}"
                                                frameborder="0"
                                                allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                    @endif
                                @endforeach
                            @else
                                {{-- Only ONE carousel --}}
                                <div id="DynamicCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner position-relative">
                                        @foreach($project->media as $index => $item)
                                            @if($item->mediaType === 'image')
                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                    <img class="w-100 h-100 d-block" style="object-fit: cover;"
                                                         src="{{ $item->mediaURL }}" alt="Slide {{ $index + 1 }}"/>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <button class="carousel-control-prev" type="button"
                                            data-bs-target="#DynamicCarousel"
                                            data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                            data-bs-target="#DynamicCarousel"
                                            data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                    <div class="carousel-indicators">
                                        @foreach($project->media as $index => $item)
                                            @if($item->mediaType === 'image')
                                                <button type="button"
                                                        data-bs-target="#DynamicCarousel"
                                                        data-bs-slide-to="{{ $index }}"
                                                        class="{{ $index === 0 ? 'active' : '' }}"
                                                        aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                                        aria-label="Slide {{ $index + 1 }}"></button>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <img src="/images/home/image-mask.png" class="image-mask"/>
                        </div>
                    </div>
                    {{-- Right Section --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-start ">
                        <div class="mt-lg-0 mt-md-0 mt-sm-0 padding-screen">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-start" data-aos="fade-up"
                                     data-aos-duration="600">
                                    <img src="{{ $project->logo }}" class="d-lg-block d-none project-logo">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 3vw;">
                                <div class="col d-flex justify-content-end flex-column">
                                    <div class="project-brief" data-aos="fade-up" data-aos-duration="800">
                                        Project Brief
                                    </div>
                                    <font class="project-brief-desc" data-aos="fade-up" data-aos-duration="1000">
                                        {!! $project->description !!}
                                    </font>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
