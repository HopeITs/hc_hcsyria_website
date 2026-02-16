<div id="projects-carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#projects-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#projects-carousel" data-slide-to="1"></li>
        <li data-target="#projects-carousel" data-slide-to="2"></li>
        <li data-target="#projects-carousel" data-slide-to="3"></li>
        <li data-target="#projects-carousel" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item item-disc active">
            <div class="first-skew"></div>
            <div class="second-skew"></div>
            <div class="no-skew"></div>
            <div class="carousel-caption carousel-caption-left">
                <h4 class="animated fadeInDown delay">@lang('what_we_do.disc2')</h4>
                <hr class="animated fadeInLeft delay">
                <h6 class="animated fadeInUp delay">@lang('what_we_do.devProject')</h6>
            </div>
            <div class="carousel-caption carousel-caption-right">
                <img src="/images/logos/disc.svg" class="bg-disc-logo animated fadeInRight delay">
                <a href="{{route('public.disc')}}" class="projects-link animated bounceInRight delay">@lang('development.previewProgram') ></a>
            </div>
        </div>
        <div class="item item-micro">
            <div class="first-skew"></div>
            <div class="second-skew"></div>
            <div class="no-skew"></div>
            <div class="carousel-caption carousel-caption-left">
                <h3 class="animated fadeInDown delay">@lang('what_we_do.micro')</h3>
                <hr class="animated fadeInLeft delay">
                <h6 class="animated fadeInUp delay">@lang('what_we_do.devProject')</h6>
            </div>
            <div class="carousel-caption carousel-caption-right">
                <img src="/images/logos/micro.svg" class="bg-micro-logo animated fadeInRight delay">
                <a href="{{route('public.micro_project')}}" class="projects-link animated bounceInRight delay">@lang('development.previewProgram') ></a>
            </div>
        </div>
        <div class="item item-family">
            <div class="first-skew"></div>
            <div class="second-skew"></div>
            <div class="no-skew"></div>
            <div class="carousel-caption carousel-caption-left">
                <h3 class="animated fadeInDown delay">@lang('what_we_do.family')</h3>
                <hr class="animated fadeInLeft delay">
                <h6 class="animated fadeInUp delay">@lang('what_we_do.reliefProject')</h6>
            </div>
            <div class="carousel-caption carousel-caption-right">
                <img src="/images/logos/family.svg" class="bg-family-logo animated fadeInRight delay">
                <a href="{{route('public.family2family')}}" class="projects-link animated bounceInRight delay">@lang('development.previewProgram') ></a>
            </div>
        </div>
        <div class="item item-school">
            <div class="first-skew"></div>
            <div class="second-skew"></div>
            <div class="no-skew"></div>
            <div class="carousel-caption carousel-caption-left">
                <h3 class="animated fadeInDown delay">@lang('what_we_do.school')</h3>
                <hr class="animated fadeInLeft delay">
                <h6 class="animated fadeInUp delay">@lang('what_we_do.devProject')</h6>
            </div>
            <div class="carousel-caption carousel-caption-right">
                <img src="/images/logos/school.svg" class="bg-school-logo animated fadeInRight delay">
                <a href="{{route('public.school2school')}}" class="projects-link animated bounceInRight delay">@lang('development.previewProgram') ></a>
            </div>
        </div>
        <div class="item item-study">
            <div class="first-skew"></div>
            <div class="second-skew"></div>
            <div class="no-skew"></div>
            <div class="carousel-caption carousel-caption-left">
                <h3 class="animated fadeInDown delay">@lang('what_we_do.study')</h3>
                <hr class="animated fadeInLeft delay">
                <h6 class="animated fadeInUp delay">@lang('what_we_do.devProject')</h6>
            </div>
            <div class="carousel-caption carousel-caption-right">
                <img src="/images/logos/study.svg" class="bg-study-logo animated fadeInRight delay">
                <a href="{{route('public.studyzone')}}" class="projects-link animated bounceInRight delay">@lang('development.previewProgram') ></a>
            </div>
        </div>
    </div>
    <a class="carousel-left member-carousel-control hidden-xs" href="#projects-carousel" data-slide="prev"><i
            class="fa fa-angle-left"></i></a>
    <a class="carousel-right member-carousel-control hidden-xs" href="#projects-carousel" data-slide="next"><i
            class="fa fa-angle-right"></i></a>
</div>
<div class="container ">
    <div class="row other-projects">
        <div class="col-xs-6 col-sm-3 text-center development">
            <img src="/images/programs/what/development.jpg" class="projects-pic">
            <a href="{{route('public.initiatives.type', 'development')}}" class="text-left">
            @if(app()->isLocale('fr'))
                <div class="carousel-caption carousel-caption-fr">
                    <div class="text-wrapper animated fadeInDown">
                        <p>PROJETS DU</p>
                        <h3>DÉVELOPPEMENT</h3>
                    </div>
                </div>
            @else
                <div class="carousel-caption">
                    <div class="text-wrapper animated fadeInDown">
                        <h3>DEVELOPMENT</h3>
                        <p>PROJECTS</p>
                    </div>
                </div>
            @endif
            </a>
        </div>
        <div class="col-xs-6 col-sm-3 text-center relief">
            <img src="/images/programs/what/relief.jpg" class="projects-pic">
            <a href="{{route('public.initiatives.type', 'relief')}}">
            @if(app()->isLocale('fr'))
                <div class="carousel-caption carousel-caption-fr">
                    <div class="text-wrapper animated fadeInDown">
                        <p>PROJETS D'</p>
                        <h3>AIDES</h3>
                    </div>
                </div>
            @else
                <div class="carousel-caption">
                    <div class="text-wrapper animated fadeInDown">
                        <h3>RELIEF</h3>
                        <p>PROJECTS</p>
                    </div>
                </div>
            @endif
            </a>
        </div>
        <div class="col-xs-6 col-sm-3 text-center rehabilitation">
            <img src="/images/programs/what/rehabilitation.jpg" class="projects-pic">
            <a href="{{route('public.initiatives.type', 'rehabilitation')}}">
            @if(app()->isLocale('fr'))
                <div class="carousel-caption carousel-caption-fr">
                    <div class="text-wrapper animated fadeInDown">
                        <p>PROJETS DE</p>
                        <h3>RÉHABILITATION</h3>
                    </div>
                </div>
            @else
                <div class="carousel-caption">
                    <div class="text-wrapper animated fadeInDown">
                        <h3>REHABILITATION</h3>
                        <p>PROJECTS</p>
                    </div>
                </div>
            @endif
            </a>
        </div>
        <div class="col-xs-6 col-sm-3 text-center social-activities">
            <img src="/images/programs/what/organizations.jpg" class="projects-pic">
            <a href="{{route('public.initiatives.type', 'social-activities')}}">
            @if(app()->isLocale('fr'))
                <div class="carousel-caption carousel-caption-fr">
                    <div class="text-wrapper animated fadeInDown">
                        <p>PROJETS D'</p>
                        <h3>ACTIVITÉS SOCIALES</h3>
                    </div>
                </div>
            @else
                <div class="carousel-caption">
                    <div class="text-wrapper animated fadeInDown">
                        <h3>SOCIAL ACTIVITIES</h3>
                        <p>PROJECTS</p>
                    </div>
                </div>
            @endif
            </a>
        </div>
    </div>
</div>
