<div class="container who_we_serve_container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h2 class="text-center main_title_white">@lang('who_we_serve.title2')</h2>
        </div>
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <p class="wws-description">@lang('who_we_serve.description')</p>
        </div>
    </div>
    <div class="row">
        <div class="horizontal-margin col-xs-6 col-sm-2 col-sm-offset-1 text-center img__wrap animated fadeInUp fadeInUp-delay1 wow">
            <a href="{{route('public.successes.category', 'men')}}">
                <div class="inner__wrap">
                    <img src="/images/programs/who/men.jpg" class="who_category_image img__img">
                    <div class="details img__description_layer">
                        <p class="img__description">@lang('who_we_serve.MEN')</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="horizontal-margin col-xs-6 col-sm-2 text-center img__wrap animated fadeInUp fadeInUp-delay2 wow">
            <a href="{{route('public.successes.category', 'elderlies')}}">
                <div class="inner__wrap">
                    <img src="/images/programs/who/elders.jpg" class="who_category_image img__img">
                    <div class="details img__description_layer">
                        <p class="img__description">@lang('who_we_serve.ELDERS')</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="horizontal-margin col-xs-6 col-sm-2 text-center img__wrap animated fadeInUp fadeInUp-delay3 wow">
            <a href="{{route('public.successes.category', 'children')}}">
                <div class="inner__wrap">
                    <img src="/images/programs/who/children.jpg" class="who_category_image img__img">
                    <div class="details img__description_layer">
                        <p class="img__description">@lang('who_we_serve.CHILDREN')</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="horizontal-margin col-xs-6 col-sm-2 text-center img__wrap animated fadeInUp fadeInUp-delay4 wow">
            <a href="{{route('public.successes.category', 'youth')}}">
                <div class="inner__wrap">
                    <img src="/images/programs/who/youth.jpg" class="who_category_image img__img">
                    <div class="details img__description_layer">
                        <p class="img__description">@lang('who_we_serve.YOUTH')</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="horizontal-margin col-xs-6 col-xs-offset-3 col-sm-2 col-sm-offset-0 text-center img__wrap animated fadeInUp fadeInUp-delay5 wow">
            <a href="{{route('public.successes.category', 'women')}}">
                <div class="inner__wrap">
                    <img src="/images/programs/who/women.jpg" class="who_category_image img__img">
                    <div class="details img__description_layer">
                        <p class="img__description">@lang('who_we_serve.WOMEN')</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
