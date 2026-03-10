{{-- resources/views/components/partials/carousel.blade.php --}}
@php $isPhone = $agent->isPhone(); @endphp

<div id="HomeCarousel" class="carousel slide" data-bs-ride="carousel" @if($isPhone) data-aos="fade-up" data-aos-duration="800" @endif>
    @if(count($carouselImages) > 1)
        <div class="carousel-indicators">
            @foreach($carouselImages as $index => $image)
                <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}"
                        @if($index === 0) aria-current="true" @endif
                        aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
    @endif

    <div class="carousel-inner">
        @foreach($carouselImages as $index => $image)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }} position-relative">
                <img src="{{ $image->image_path }}" class="d-block w-100 h-100" style="object-fit: cover;">
                <img src="/images/home/image-mask.png" class="image-mask" />
            </div>
        @endforeach
    </div>

    @if(count($carouselImages) > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#HomeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#HomeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    @endif
</div>
