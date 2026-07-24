<div class="container-fluid">
    <div id="projects-section">
        <div class="filters-section">
            <div class="projects-filter-layout">
                <div class="projects-filter-city dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="cityDropdown"
                            data-bs-toggle="dropdown">
                        <span>
                            {{ $tempCity
                                ? 'City-' . (optional($cities->firstWhere('id', $tempCity))->name ?? 'All')
                                : 'City-All' }}
                        </span>
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="cityDropdown">
                        <li>
                            <a class="dropdown-item @if(!$tempCity) active @endif" href="#"
                               wire:click.prevent="$set('tempCity', '')">All</a>
                        </li>
                        @foreach($cities as $city)
                            <li>
                                <a class="dropdown-item @if((string) $tempCity === (string) $city->id) active @endif"
                                   href="#" wire:click.prevent="$set('tempCity', {{ $city->id }})">
                                    {{ $city->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="projects-filter-title section-title">Projects</div>

                <div class="projects-filter-donor dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="donorDropdown"
                            data-bs-toggle="dropdown">
                        <span>
                            {{ $tempDonor
                                ? 'Donor-' . (optional($donors->firstWhere('id', $tempDonor))->name ?? 'All')
                                : 'Donor-All' }}
                        </span>
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="donorDropdown">
                        <li>
                            <a class="dropdown-item @if(!$tempDonor) active @endif" href="#"
                               wire:click.prevent="$set('tempDonor', '')">All</a>
                        </li>
                        @foreach($donors as $donor)
                            <li>
                                <a class="dropdown-item @if((string) $tempDonor === (string) $donor->id) active @endif"
                                   href="#" wire:click.prevent="$set('tempDonor', {{ $donor->id }})">
                                    {{ $donor->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="projects-filter-view">
                    <div class="filter-container">
                        <label>View</label>
                        <img
                            src="{{ $activeView === 'tiles' ? '/images/ico/tiles-active.png' : '/images/ico/tiles.png' }}"
                            id="tiles"
                            wire:click.prevent="$set('activeView', 'tiles')"
                            class="cursor-pointer"
                            alt="Tile view">
                        <img
                            src="{{ $activeView === 'grid' ? '/images/ico/grid-active.png' : '/images/ico/grid.png' }}"
                            id="grid"
                            wire:click.prevent="$set('activeView', 'grid')"
                            class="cursor-pointer"
                            alt="Grid view">
                    </div>
                    <div class="search-container">
                        <label class="switch" id="switchvideo"
                               style="background: {{ $tempHasVideo ? '#BC1818' : '#f7f7f7' }}">
                            <input type="checkbox"
                                   id="videoFilter"
                                   wire:model.live="tempHasVideo"
                                   aria-label="Project with Video">
                            <img id="videoIcon" class="search-icons"
                                 src="{{ $tempHasVideo ? '/images/ico/reverst-video.svg' : '/images/ico/search-video-icon.svg' }}"
                                 alt="">
                        </label>
                    </div>
                </div>

                <div class="projects-filter-search">
                    <input type="text"
                           id="search-input"
                           class="form-control"
                           placeholder="Search"
                           wire:model.live.debounce.400ms="tempSearch"
                           wire:keydown.enter="applyFilters">
                    <button type="button"
                            class="apply-btn {{ $this->isDirty ? 'is-dirty' : '' }}"
                            wire:click="applyFilters"
                            wire:target="applyFilters"
                            wire:loading.attr="disabled"
                            x-data="{ applied: false }"
                            @filters-applied.window="applied = true; setTimeout(() => applied = false, 1600)"
                            :class="{ 'is-applied': applied }">
                        <span class="apply-label" wire:loading.remove wire:target="applyFilters" x-show="!applied">Apply</span>
                        <span class="apply-label apply-applied" wire:loading.remove wire:target="applyFilters"
                              x-show="applied" x-cloak>
                            <i class="fa fa-check"></i> Applied
                        </span>
                        <span class="apply-label apply-loading" wire:loading wire:target="applyFilters">
                            <span class="apply-spinner"></span> Applying…
                        </span>
                    </button>
                </div>

                <div class="result">
                    Filter Result: <span>{{ $totalCount }} ({{ $totalProjectsCount }}) Projects |
                    {{ $this->city ? optional($cities->firstWhere('id', $this->city))->name ?? "All Cities" : "All Cities" }}
                    |
                    {{ $this->donor ? optional($donors->firstWhere('id', $this->donor))->name ?? "All Donors" : "All Donors" }}@if($this->search) | {{ $this->search }}@endif @if($this->hasVideo)| Video @endif</span>
                </div>
            </div>
        </div>
        <div class="page-margin">
            <div class="page-margin">
                <!-- Placeholder -->
                @if($activeView == 'tiles')
                    <div wire:loading.class="d-block" wire:loading.remove.class="d-none" wire:target="applyFilters"
                         class="row d-none">
                        @for($i = 0; $i < 6; $i++)
                            <div wire:loading wire:target="applyFilters" class="justify-center">
                                <div class="page-margin">
                                    <div class="row w-100">
                                        @for ($i = 0; $i < 6; $i++)
                                            <div class="col-md-6 col-lg-4 col-12 mb-4">
                                                <div class="project-placeholder p-3">
                                                    <div class="image mb-3"></div>
                                                    <div class="line long"></div>
                                                    <div class="line medium"></div>
                                                    <div class="line short"></div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                @else
                    <div class="page-margin grid-placeholder" wire:loading.class="d-block"
                         wire:loading.remove.class="d-none" wire:target="applyFilters">
                        <div wire:loading wire:target="applyFilters" class="w-100">
                            <div class="row w-100 mt-5">
                                <div
                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end ps-0"
                                    style="background: #e9e9e9;">
                                    <div class="project-placeholder">
                                        <div class="image"></div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative ps-0 pe-0">
                                    <div class="project-placeholder" style="height: 100%">
                                        <div class="line medium m-3"></div>
                                        <br>
                                        <div class="line short m-3"></div>
                                        <div class="line medium m-3"></div>
                                        <div class="line short m-3"></div>
                                        <br>
                                        <div class="line long m-3"></div>
                                        <div class="line long m-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row w-100 mt-5">
                                <div
                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-0 ps-0">
                                    <div class="project-placeholder w-100">
                                        <div class="project-placeholder" style="height: 100%">
                                            <div class="line medium m-3"></div>
                                            <br>
                                            <div class="line short m-3"></div>
                                            <div class="line medium m-3"></div>
                                            <div class="line short m-3"></div>
                                            <br>
                                            <div class="line long m-3"></div>
                                            <div class="line long m-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative ps-0 pe-0">
                                    <div class="project-placeholder">
                                        <div class="image"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="page-margin">
                <div class="page-margin" wire:loading.remove wire:target="applyFilters">
                    @if($projects->isNotEmpty())
                        @if($activeView == 'tiles')
                            <div id="tiles-section">
                                <div class="row mt-5">
                                    @foreach($projects as $project)
                                        <div class="col-md-6 col-lg-4 col-12 mb-4">
                                            <div class="project-card">
                                                <div class="card-body">
                                                    <div id="project-carousel-{{ $project->id }}" class="carousel slide w-100">
                                                        <div class="carousel-inner h-auto">
                                                            @foreach($project->images as $index => $image)
                                                                <a href="{{ substr($image->MPI_Path, 0, -4) . 'b.jpg' }}"
                                                                   class="carousel-item @if($index == 0) active @endif"
                                                                   data-fancybox="gallery-grid{{ $project->id }}"
                                                                   data-caption="{{ ucfirst($project->$language->MPE_Name) }}"
                                                                   @if($index > 0) style="display:none;" @endif>
                                                                    <img src="{{ $image->MPI_Path }}" class="w-100 h-100"
                                                                         loading="lazy" style="object-fit: cover;">
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="card-title">
                                                        @if(strlen($project->$language->MPE_Name)<=35)
                                                            {{ $project->$language->MPE_Name ?? '' }}
                                                        @else
                                                            {{ Str::limit($project->$language->MPE_Name, 34, '...') }}
                                                        @endif
                                                    </div>
                                                    <div class="card-subtitle">
                                                        @if($project->MPE_PartnerName == '0' && $project->MPE_PartnerName2 == '0')
                                                            <span>{{ucfirst($project->MPE_BeneficiaryName)}}</span>
                                                        @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 == '0')
                                                            <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName)}}</span>
                                                        @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 != '0')
                                                            <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName) .', '.ucfirst($project->MPE_PartnerName2)}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="row d-flex align-items-center">
                                                        <div class="col-auto card-content">
                                                            {{$project->place['name']}} , {{$project->donor['name']}}
                                                        </div>
                                                        <div
                                                            class="col d-flex justify-content-end align-items-baseline gap-1">
                                                            @if($project->MPE_Video && $project->MPE_Video !== '0')
                                                                <a href="{{$project->MPE_Video}}"
                                                                   id="project-{{$project->id}}"
                                                                   data-fancybox="project-{{$project->id}}">
                                                                    <img class="video-icon"
                                                                         data-hover="/images/ico/project-videoH.svg"
                                                                         data-tooltip="video"
                                                                         src="/images/ico/project-video.svg">
                                                                </a>
                                                            @endif
                                                            @if($project->latitude != '0' && $project->longtitude != '0')
                                                                <a href="https://www.google.com/maps/search/?api=1&query={{$project->latitude}},{{$project->longtitude}}"
                                                                   target="_blank">
                                                                    <img class="video-icon"
                                                                         data-hover="/images/ico/project-locationH.svg"
                                                                         src="/images/ico/project-location.svg">
                                                                </a>
                                                            @endif
                                                            <img src="/images/ico/project-copy.svg" data-tooltip="copy"
                                                                 onclick="copyText({{ $project->id }})"
                                                                 data-hover="/images/ico/project-copyH.svg"
                                                                 class="copy-icon">
                                                            <img src="/images/ico/project-readmore.svg"
                                                                 data-tooltip="read more"
                                                                 data-bs-toggle="modal"
                                                                 data-hover="/images/ico/project-readmoreH.svg"
                                                                 data-bs-target="#projectDetailsModal-{{ $project->id }}"
                                                                 class="video-icon"
                                                                 style="cursor:pointer;">
                                                        </div>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade project-detail"
                                                         id="projectDetailsModal-{{ $project->id }}"
                                                         tabindex="-1"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <button type="button" class="close"
                                                                        data-bs-dismiss="modal">&times;
                                                                </button>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-9">
                                                                            <div
                                                                                class="card-title">{{ucfirst($project->$language->MPE_Name)}}
                                                                                <textarea
                                                                                    id="txt{{$project->id}}"
                                                                                    style="display: none;"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-3 gap-1 d-flex justify-content-end align-items-baseline">

                                                                            @if($project->latitude != '0' && $project->longtitude != '0')
                                                                                <a href="https://www.google.com/maps/search/?api=1&query={{$project->latitude}},{{$project->longtitude}}"
                                                                                   target="_blank">
                                                                                    <img class="location-icon"
                                                                                         data-hover="/images/ico/project-locationH.svg"
                                                                                         data-tooltip="location"
                                                                                         src="/images/ico/project-location.svg">
                                                                                </a>
                                                                            @endif
                                                                            <img src="/images/ico/project-copy.svg"
                                                                                 data-hover="/images/ico/project-copyH.svg"
                                                                                 onclick="copyText({{$project->id}},{{$project->MPE_City}})"
                                                                                 data-tooltip="copy"
                                                                                 class="copy-icon">
                                                                            @if($project->MPE_Video != '0')
                                                                                <a href="{{$project->MPE_Video}}"
                                                                                   id="microVideoAA-{{$project->id}}"
                                                                                   data-fancybox="microVideoAA-{{$project->id}}">
                                                                                    <img class="video-icon"
                                                                                         data-tooltip="video"
                                                                                         data-hover="/images/ico/project-videoH.svg"
                                                                                         src="/images/ico/project-video.svg">
                                                                                </a>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="card-title-section"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="carousel-{{$project->id}}"
                                                                         class="carousel slide"
                                                                         data-bs-ride="carousel">
                                                                        <div class="carousel-indicators">
                                                                                <?php $k = 0 ?>
                                                                            @foreach($project->images as $image)
                                                                                <button type="button"
                                                                                        data-bs-target="#carousel-{{$project->id}}"
                                                                                        data-bs-slide-to="{{$k++}}"
                                                                                        @if($k == 1)class="active" @endif>
                                                                                </button>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="carousel-inner">
                                                                                <?php $k = 0 ?>
                                                                            @foreach($project->images as $image)
                                                                                <div
                                                                                    class="carousel-item @if($k++ == 0) active @endif">
                                                                                    <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                       data-fancybox="gallery-{{$project->id}}"
                                                                                       data-caption="{{ucfirst($project->$language->MPE_Name)}}">
                                                                                        <img src="{{$image->MPI_Path}}"
                                                                                             loading="lazy"
                                                                                             class="d-block w-100 h-auto"
                                                                                             style="object-fit: cover;">
                                                                                    </a>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <button class="carousel-control-prev"
                                                                                data-bs-target="#carousel-{{$project->id}}"
                                                                                data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                                            <span
                                                                                class="visually-hidden">Previous</span>
                                                                        </button>
                                                                        <button class="carousel-control-next"
                                                                                data-bs-target="#carousel-{{$project->id}}"
                                                                                data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                                            <span class="visually-hidden">Next</span>
                                                                        </button>
                                                                    </div>
                                                                    <div id="modal-swipe-{{$project->id}}">
                                                                        <div class="row mt-5">
                                                                            <div
                                                                                class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                                <ul>
                                                                                    @if($project->MPE_PartnerName == '0' && $project->MPE_PartnerName2 == '0')
                                                                                        <li class="card-subtitle">
                                                                                            <Strong>@lang('main.beneficiary')</strong>
                                                                                            <span>{{ucfirst($project->MPE_BeneficiaryName)}}</span>
                                                                                        </li>
                                                                                    @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 == '0')
                                                                                        <li class="card-subtitle">
                                                                                            <Strong>@lang('main.beneficiaries')</strong>
                                                                                            <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName)}}</span>
                                                                                        </li>
                                                                                    @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 != '0')
                                                                                        <li class="card-subtitle">
                                                                                            <Strong>@lang('main.beneficiaries')</strong>
                                                                                            <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName) .', '.ucfirst($project->MPE_PartnerName2)}}</span>
                                                                                        </li>
                                                                                    @endif
                                                                                    @if($project->MPE_FundedDate !=  NULL)
                                                                                        <li class="card-subtitle">
                                                                                            <Strong
                                                                                            >@lang('projects.fundDate')</Strong>
                                                                                            <span> {{date('m/Y',strtotime($project->MPE_FundedDate))}}</span>
                                                                                        </li>
                                                                                    @endif
                                                                                    @if($project->MPE_City !=  NULL)
                                                                                        <li class="card-subtitle">
                                                                                            <Strong
                                                                                            >City:</Strong>
                                                                                            <span> {{$project->place['name']}}</span>
                                                                                        </li>
                                                                                    @endif
                                                                                    @if($project->DOB != '0')
                                                                                        <li class="card-subtitle">
                                                                                            <strong
                                                                                            >@lang('projects.age')</strong>
                                                                                            <span> {{\Carbon\Carbon::createFromDate($project->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                                        </li>
                                                                                    @endif
                                                                                    @if($project->FamilyMembers != '0')
                                                                                        <li class="card-subtitle">
                                                                                            <strong
                                                                                            >@lang('projects.family')</strong>
                                                                                            <span>{{$project->FamilyMembers}}</span>
                                                                                        </li>
                                                                                    @endif
                                                                                    @if($project->$language->MPE_ExpSkill != '')
                                                                                        <div><strong
                                                                                                class="card-subtitle">@lang('projects.skills')</strong>
                                                                                            <span>{{$project->$language->MPE_ExpSkill}}</span>
                                                                                        </div>
                                                                                    @endif
                                                                                </ul>
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                                            >
                                                                                @if($project->MPE_Donor==13 || $project->MPE_Donor==12)
                                                                                    <div class="missio-donor-logo">
                                                                                        <img class="w-100 h-100"
                                                                                             src="{{$project->donor['logo']}}">
                                                                                    </div>
                                                                                @elseif($project->MPE_Donor== 5)
                                                                                    <div class="kerk-donor-logo">
                                                                                        <img class="w-100 h-100"
                                                                                             src="{{$project->donor['logo']}}">
                                                                                    </div>
                                                                                @elseif($project->MPE_Donor== 3)
                                                                                    <div class="louvre-donor-logo">
                                                                                        <img class="w-100 h-100"
                                                                                             src="{{$project->donor['logo']}}">
                                                                                    </div>
                                                                                @elseif($project->MPE_Donor== 8)
                                                                                    <div class="hungary-donor-logo">
                                                                                        <img class="w-100 h-100"
                                                                                             src="{{$project->donor['logo']}}">
                                                                                    </div>
                                                                                @else
                                                                                    <div class="project-donor-logo">
                                                                                        <img class="w-100 h-100"
                                                                                             src="{{$project->donor['logo']}}">
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-content">
                                                                            <p class="p-justify">{!!$project->$language->MPE_Suffering!!}</p>
                                                                        </div>

                                                                        <textarea
                                                                            id="txt{{$project->id}}"
                                                                            style="display: none;">
                                                                                    </textarea>
                                                                        <div class="text-center swipe-arrows">
                                                                            <i class="fa fa-angle-double-up"></i>
                                                                            <p>@lang('main.swipeUp')</p>
                                                                        </div>
                                                                        <div class="swipe-to-close"
                                                                             id="swipe-to-close-{{$project->id}}"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End modal -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div id="grid-section">
                                @php
                                    $numOfProjects = 0;
                                @endphp
                                @foreach($projects as $project)
                                    <div class="mt-5">
                                        @if($isMobile)
                                            <div class="row  m-2" style="background: #f4f4f4;">
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end p-0">
                                                    <div id="project-carousel{{$project->id}}"
                                                         class="carousel slide w-100 project-carousel"
                                                         data-bs-ride="carousel" data-interval="1000">
                                                        <div class="carousel-inner project-carousel">
                                                                <?php $k = 0 ?>
                                                            @foreach($project->images as $image)
                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                   class="carousel-item @if($k++ == 0) active @endif"
                                                                   data-fancybox="gallery-grid-{{$project->id}}"
                                                                   data-caption="{{ucfirst($project->$language->MPE_Name)}}">
                                                                    <img src="{{$image->MPI_Path}}" class="w-100 h-100"
                                                                         loading="lazy"
                                                                         style="object-fit: cover">
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                        <button class="carousel-control-prev"
                                                                data-bs-target="#project-carousel{{$project->id}}"
                                                                data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next"
                                                                data-bs-target="#project-carousel{{$project->id}}"
                                                                data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative " style="padding: 1.5vw;">
                                                    <div class="row d-flex align-items-center">
                                                        <div class="col-9">
                                                            <div
                                                                class="card-title">{{ucfirst($project->$language->MPE_Name)}}
                                                                <textarea id="txt{{$project->id}}"
                                                                          style="display: none;"></textarea>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-3 gap-1 d-flex justify-content-end align-items-baseline">
                                                            <img src="/images/ico/project-copy.svg"
                                                                 data-hover="/images/ico/project-copyH.svg"
                                                                 onclick="copyText({{$project->id}})"
                                                                 class="copy-icon">
                                                            @if($project->latitude != '0' && $project->longtitude != '0')
                                                                <a href="https://www.google.com/maps/search/?api=1&query={{$project->latitude}},{{$project->longtitude}}"
                                                                   target="_blank">
                                                                    <img class="location-icon"
                                                                         src="/images/ico/project-location.svg">
                                                                </a>
                                                            @endif
                                                            @if($project->MPE_Video != '0')
                                                                <a href="{{$project->MPE_Video}}"
                                                                   id="microVideo-{{$project->id}}"
                                                                   data-fancybox="microVideo-{{$project->id}}">
                                                                    <img class="video-icon"
                                                                         data-hover="/images/ico/project-videoH.svg"
                                                                         src="/images/ico/project-video.svg">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card-title-section"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-9">

                                                            @if($project->MPE_PartnerName == '0' && $project->MPE_PartnerName2 == '0')
                                                                <div class="card-subtitle">
                                                                    <Strong>@lang('main.beneficiary')</strong>
                                                                    <span>{{ucfirst($project->MPE_BeneficiaryName)}}</span>
                                                                </div>
                                                            @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 == '0')
                                                                <div class="card-subtitle">
                                                                    <Strong>@lang('main.beneficiaries')</strong>
                                                                    <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName)}}</span>
                                                                </div>
                                                            @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 != '0')
                                                                <div class="card-subtitle">
                                                                    <Strong>@lang('main.beneficiaries')</strong>
                                                                    <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName) .', '.ucfirst($project->MPE_PartnerName2)}}</span>
                                                                </div>
                                                            @endif
                                                            @if($project->MPE_FundedDate !=  NULL)
                                                                <div class="card-subtitle"><Strong
                                                                    >@lang('projects.fundDate')</Strong>
                                                                    <span> {{date('m/Y',strtotime($project->MPE_FundedDate))}}</span>
                                                                </div>
                                                            @endif
                                                            @if($project->MPE_City !=  NULL)
                                                                <div class="card-subtitle"><Strong
                                                                    >City:</Strong>
                                                                    <span> {{$project->place['name']}}</span>
                                                                </div>
                                                            @endif
                                                            @if($project->DOB != '0')
                                                                <div class="card-subtitle"><strong
                                                                    >@lang('projects.age')</strong>
                                                                    <span> {{\Carbon\Carbon::createFromDate($project->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                </div>
                                                            @endif
                                                            @if($project->FamilyMembers != '0')
                                                                <div class="card-subtitle"><strong
                                                                    >@lang('projects.family')</strong>
                                                                    <span>{{$project->FamilyMembers}}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div
                                                            class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start">
                                                            @if($project->MPE_Donor==13 || $project->MPE_Donor==12)
                                                                <div class="missio-donor-logo">
                                                                    <img class="w-100 h-100"
                                                                         src="{{$project->donor['logo']}}">
                                                                </div>
                                                            @elseif($project->MPE_Donor== 5)
                                                                <div class="kerk-donor-logo">
                                                                    <img class="w-100 h-100"
                                                                         src="{{$project->donor['logo']}}">
                                                                </div>
                                                            @elseif($project->MPE_Donor== 3)
                                                                <div class="louvre-donor-logo">
                                                                    <img class="w-100 h-100"
                                                                         src="{{$project->donor['logo']}}">
                                                                </div>
                                                            @elseif($project->MPE_Donor== 8)
                                                                <div class="hungary-donor-logo">
                                                                    <img class="w-100 h-100"
                                                                         src="{{$project->donor['logo']}}">
                                                                </div>
                                                            @else
                                                                <div class="project-donor-logo">
                                                                    <img class="w-100 h-100"
                                                                         src="{{$project->donor['logo']}}">
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        @if($project->$language->MPE_ExpSkill != '')
                                                            <div class="card-subtitle"><strong
                                                                >@lang('projects.skills')</strong>
                                                                <span>{{$project->$language->MPE_ExpSkill}}</span>
                                                            </div>
                                                        @endif
                                                        <div class="card-content">
                                                            @if(strlen($project->$language->MPE_Suffering)>15)
                                                                <p>{!!implode(' ', array_slice(explode(' ', strip_tags($project->$language->MPE_Suffering)), 0, 15)).'...'!!}</p>
                                                            @else
                                                                <p>{!! $project->$language->MPE_Suffering !!}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            @if(strlen($project->$language->MPE_Suffering)>15)
                                                                <button class="readmore-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#projectDetailsModal-{{ $project->id }}">@lang('main.readMore')
                                                                </button>
                                                                <!-- Modal -->
                                                                <div class="modal fade project-detail"
                                                                     id="projectDetailsModal-{{ $project->id }}"
                                                                     tabindex="-1"
                                                                     aria-hidden="true">
                                                                    <div
                                                                        class="modal-dialog modal-lg modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <button type="button" class="close"
                                                                                    data-bs-dismiss="modal">&times;
                                                                            </button>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-9">
                                                                                        <div
                                                                                            class="card-title">{{ucfirst($project->$language->MPE_Name)}}
                                                                                            <textarea
                                                                                                id="txt{{$project->id}}"
                                                                                                style="display: none;"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-3 gap-1 d-flex justify-content-end align-items-baseline">

                                                                                        @if($project->latitude != '0' && $project->longtitude != '0')
                                                                                            <a href="https://www.google.com/maps/search/?api=1&query={{$project->latitude}},{{$project->longtitude}}"
                                                                                               target="_blank">
                                                                                                <img
                                                                                                    class="location-icon"
                                                                                                    data-hover="/images/ico/project-locationH.svg"
                                                                                                    data-tooltip="location"
                                                                                                    src="/images/ico/project-location.svg">
                                                                                            </a>
                                                                                        @endif
                                                                                        <img
                                                                                            src="/images/ico/project-copy.svg"
                                                                                            data-hover="/images/ico/project-copyH.svg"
                                                                                            onclick="copyText({{$project->id}},{{$project->MPE_City}})"
                                                                                            data-tooltip="copy"
                                                                                            class="copy-icon">
                                                                                        @if($project->MPE_Video != '0')
                                                                                            <a href="{{$project->MPE_Video}}"
                                                                                               id="microVideoAA-{{$project->id}}"
                                                                                               data-fancybox="microVideoAA-{{$project->id}}">
                                                                                                <img class="video-icon"
                                                                                                     data-tooltip="video"
                                                                                                     data-hover="/images/ico/project-videoH.svg"
                                                                                                     src="/images/ico/project-video.svg">
                                                                                            </a>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div
                                                                                            class="card-title-section"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    id="project-carousel-{{$project->id}}"
                                                                                    class="carousel slide"
                                                                                    data-bs-ride="carousel">
                                                                                    <div class="carousel-indicators">
                                                                                            <?php $k = 0 ?>
                                                                                        @foreach($project->images as $image)
                                                                                            <button type="button"
                                                                                                    data-bs-target="#project-carousel-{{$project->id}}"
                                                                                                    data-bs-slide-to="{{$k++}}"
                                                                                                    @if($k == 1)class="active" @endif>
                                                                                            </button>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="carousel-inner">
                                                                                            <?php $k = 0 ?>
                                                                                        @foreach($project->images as $image)
                                                                                            <div
                                                                                                class="carousel-item @if($k++ == 0) active @endif">
                                                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                                   data-fancybox="gallery{{$project->id}}"
                                                                                                   data-caption="{{ucfirst($project->$language->MPE_Name)}}">
                                                                                                    <img loading="lazy"
                                                                                                         src="{{$image->MPI_Path}}"
                                                                                                         class="d-block w-100 h-auto"
                                                                                                         style="object-fit: cover;">
                                                                                                </a>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <button
                                                                                        class="carousel-control-prev"
                                                                                        data-bs-target="#project-carousel-{{$project->id}}"
                                                                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                                                        <span
                                                                                            class="visually-hidden">Previous</span>
                                                                                    </button>
                                                                                    <button
                                                                                        class="carousel-control-next"
                                                                                        data-bs-target="#project-carousel-{{$project->id}}"
                                                                                        data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                                                        <span
                                                                                            class="visually-hidden">Next</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div id="modal-swipe-{{$project->id}}">
                                                                                    <div class="row mt-5">
                                                                                        <div
                                                                                            class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                                            <ul>
                                                                                                @if($project->MPE_PartnerName == '0' && $project->MPE_PartnerName2 == '0')
                                                                                                    <li class="card-subtitle">
                                                                                                        <Strong>@lang('main.beneficiary')</strong>
                                                                                                        <span>{{ucfirst($project->MPE_BeneficiaryName)}}</span>
                                                                                                    </li>
                                                                                                @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 == '0')
                                                                                                    <li class="card-subtitle">
                                                                                                        <Strong>@lang('main.beneficiaries')</strong>
                                                                                                        <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName)}}</span>
                                                                                                    </li>
                                                                                                @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 != '0')
                                                                                                    <li class="card-subtitle">
                                                                                                        <Strong>@lang('main.beneficiaries')</strong>
                                                                                                        <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName) .', '.ucfirst($project->MPE_PartnerName2)}}</span>
                                                                                                    </li>
                                                                                                @endif
                                                                                                @if($project->MPE_FundedDate !=  NULL)
                                                                                                    <div
                                                                                                        class="card-subtitle">
                                                                                                        <Strong
                                                                                                        >@lang('projects.fundDate')</Strong>
                                                                                                        <span> {{date('m/Y',strtotime($project->MPE_FundedDate))}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($project->MPE_City !=  NULL)
                                                                                                    <div
                                                                                                        class="card-subtitle">
                                                                                                        <Strong
                                                                                                        >City:</Strong>
                                                                                                        <span> {{$project->place['name']}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($project->DOB != '0')
                                                                                                    <li class="card-subtitle">
                                                                                                        <strong
                                                                                                        >@lang('projects.age')</strong>
                                                                                                        <span> {{\Carbon\Carbon::createFromDate($project->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                                                    </li>
                                                                                                @endif
                                                                                                @if($project->FamilyMembers != '0')
                                                                                                    <li class="card-subtitle">
                                                                                                        <strong
                                                                                                        >@lang('projects.family')</strong>
                                                                                                        <span>{{$project->FamilyMembers}}</span>
                                                                                                    </li>
                                                                                                @endif

                                                                                                @if($project->$language->MPE_ExpSkill != '')
                                                                                                    <div><strong
                                                                                                            class="card-subtitle">@lang('projects.skills')</strong>
                                                                                                        <span>{{$project->$language->MPE_ExpSkill}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                                                        >
                                                                                            @if($project->MPE_Donor==13 || $project->MPE_Donor==12)
                                                                                                <div
                                                                                                    class="missio-donor-logo">
                                                                                                    <img
                                                                                                        class="w-100 h-100"
                                                                                                        src="{{$project->donor['logo']}}">
                                                                                                </div>
                                                                                            @elseif($project->MPE_Donor== 5)
                                                                                                <div
                                                                                                    class="kerk-donor-logo">
                                                                                                    <img
                                                                                                        class="w-100 h-100"
                                                                                                        src="{{$project->donor['logo']}}">
                                                                                                </div>
                                                                                            @elseif($project->MPE_Donor== 3)
                                                                                                <div
                                                                                                    class="louvre-donor-logo">
                                                                                                    <img
                                                                                                        class="w-100 h-100"
                                                                                                        src="{{$project->donor['logo']}}">
                                                                                                </div>
                                                                                            @elseif($project->MPE_Donor== 8)
                                                                                                <div
                                                                                                    class="hungary-donor-logo">
                                                                                                    <img
                                                                                                        class="w-100 h-100"
                                                                                                        src="{{$project->donor['logo']}}">
                                                                                                </div>
                                                                                            @else
                                                                                                <div
                                                                                                    class="project-donor-logo">
                                                                                                    <img
                                                                                                        class="w-100 h-100"
                                                                                                        src="{{$project->donor['logo']}}">
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card-content">
                                                                                        <p class="p-justify">{!!$project->$language->MPE_Suffering!!}</p>
                                                                                    </div>

                                                                                    <textarea
                                                                                        id="txt{{$project->id}}"
                                                                                        style="display: none;">
                                                                                    </textarea>
                                                                                    <div
                                                                                        class="text-center swipe-arrows">
                                                                                        <i class="fa fa-angle-double-up"></i>
                                                                                        <p>@lang('main.swipeUp')</p>
                                                                                    </div>
                                                                                    <div class="swipe-to-close"
                                                                                         id="swipe-to-close-{{$project->id}}"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End modal -->
                                                            @else
                                                                <p>{!! $project->$language->MPE_Suffering !!}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @php $numOfProjects++ ;@endphp
                                            </div>
                                        @else
                                            <div class="row m-2" style="background: #f4f4f4;">
                                                @if($numOfProjects %2 ==0)
                                                    <div
                                                        class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end p-0">
                                                        <div id="project-carousel{{$project->id}}"
                                                             class="carousel slide w-100 project-carousel"
                                                             data-bs-ride="carousel" data-interval="1000">
                                                            <div class="carousel-inner project-carousel">
                                                                    <?php $k = 0 ?>
                                                                @foreach($project->images as $image)
                                                                    <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                       class="carousel-item @if($k++ == 0) active @endif"
                                                                       data-fancybox="gallery-grid-{{$project->id}}"
                                                                       data-caption="{{ucfirst($project->$language->MPE_Name)}}">
                                                                        <img src="{{$image->MPI_Path}}"
                                                                             class="w-100 h-100"
                                                                             loading="lazy"
                                                                             style="object-fit: cover">
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                            <button class="carousel-control-prev"
                                                                    data-bs-target="#project-carousel{{$project->id}}"
                                                                    data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                                <span class="visually-hidden">Previous</span>
                                                            </button>
                                                            <button class="carousel-control-next"
                                                                    data-bs-target="#project-carousel{{$project->id}}"
                                                                    data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                                <span class="visually-hidden">Next</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative " style="padding: 1.5vw;">
                                                        <div class="row d-flex align-items-center">
                                                            <div class="col-9">
                                                                <div
                                                                    class="card-title">{{ucfirst($project->$language->MPE_Name)}}
                                                                    <textarea id="txt{{$project->id}}"
                                                                              style="display: none;"></textarea>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-3 gap-1 d-flex justify-content-end align-items-baseline">
                                                                <img src="/images/ico/project-copy.svg"
                                                                     data-hover="/images/ico/project-copyH.svg"
                                                                     onclick="copyText({{$project->id}})"
                                                                     class="copy-icon">
                                                                @if($project->latitude != '0' && $project->longtitude != '0')
                                                                    <a href="https://www.google.com/maps/search/?api=1&query={{$project->latitude}},{{$project->longtitude}}"
                                                                       target="_blank">
                                                                        <img class="location-icon"
                                                                             src="/images/ico/project-location.svg">
                                                                    </a>
                                                                @endif
                                                                @if($project->MPE_Video != '0')
                                                                    <a href="{{$project->MPE_Video}}"
                                                                       id="microVideo-{{$project->id}}"
                                                                       data-fancybox="microVideo-{{$project->id}}">
                                                                        <img class="video-icon"
                                                                             data-hover="/images/ico/project-videoH.svg"
                                                                             src="/images/ico/project-video.svg">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="card-title-section"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">

                                                                @if($project->MPE_PartnerName == '0' && $project->MPE_PartnerName2 == '0')
                                                                    <div class="card-subtitle">
                                                                        <Strong>@lang('main.beneficiary')</strong>
                                                                        <span>{{ucfirst($project->MPE_BeneficiaryName)}}</span>
                                                                    </div>
                                                                @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 == '0')
                                                                    <div class="card-subtitle">
                                                                        <Strong>@lang('main.beneficiaries')</strong>
                                                                        <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName)}}</span>
                                                                    </div>
                                                                @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 != '0')
                                                                    <div class="card-subtitle">
                                                                        <Strong>@lang('main.beneficiaries')</strong>
                                                                        <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName) .', '.ucfirst($project->MPE_PartnerName2)}}</span>
                                                                    </div>
                                                                @endif
                                                                @if($project->MPE_FundedDate !=  NULL)
                                                                    <div class="card-subtitle"><Strong
                                                                        >@lang('projects.fundDate')</Strong>
                                                                        <span> {{date('m/Y',strtotime($project->MPE_FundedDate))}}</span>
                                                                    </div>
                                                                @endif
                                                                @if($project->MPE_City !=  NULL)
                                                                    <div class="card-subtitle"><Strong
                                                                        >City:</Strong>
                                                                        <span> {{$project->place['name']}}</span>
                                                                    </div>
                                                                @endif
                                                                @if($project->DOB != '0')
                                                                    <div class="card-subtitle"><strong
                                                                        >@lang('projects.age')</strong>
                                                                        <span> {{\Carbon\Carbon::createFromDate($project->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                    </div>
                                                                @endif
                                                                @if($project->FamilyMembers != '0')
                                                                    <div class="card-subtitle"><strong
                                                                        >@lang('projects.family')</strong>
                                                                        <span>{{$project->FamilyMembers}}</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start">
                                                                @if($project->MPE_Donor==13 || $project->MPE_Donor==12)
                                                                    <div class="missio-donor-logo">
                                                                        <img class="w-100 h-100"
                                                                             src="{{$project->donor['logo']}}">
                                                                    </div>
                                                                @elseif($project->MPE_Donor== 5)
                                                                    <div class="kerk-donor-logo">
                                                                        <img class="w-100 h-100"
                                                                             src="{{$project->donor['logo']}}">
                                                                    </div>
                                                                @elseif($project->MPE_Donor== 3)
                                                                    <div class="louvre-donor-logo">
                                                                        <img class="w-100 h-100"
                                                                             src="{{$project->donor['logo']}}">
                                                                    </div>
                                                                @elseif($project->MPE_Donor== 8)
                                                                    <div class="hungary-donor-logo">
                                                                        <img class="w-100 h-100"
                                                                             src="{{$project->donor['logo']}}">
                                                                    </div>
                                                                @else
                                                                    <div class="project-donor-logo">
                                                                        <img class="w-100 h-100"
                                                                             src="{{$project->donor['logo']}}">
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @if($project->$language->MPE_ExpSkill != '')
                                                                <div class="card-subtitle"><strong
                                                                    >@lang('projects.skills')</strong>
                                                                    <span>{{$project->$language->MPE_ExpSkill}}</span>
                                                                </div>
                                                            @endif
                                                            <div class="card-content">
                                                                @if(strlen($project->$language->MPE_Suffering)>15)
                                                                    <p>{!!implode(' ', array_slice(explode(' ', strip_tags($project->$language->MPE_Suffering)), 0, 8)).'...'!!}</p>
                                                                @else
                                                                    <p>{!! $project->$language->MPE_Suffering !!}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col d-flex justify-content-end">
                                                                @if(strlen($project->$language->MPE_Suffering)>15)
                                                                    <button class="readmore-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#projectDetailsModal-{{ $project->id }}">@lang('main.readMore')
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade project-detail"
                                                                         id="projectDetailsModal-{{ $project->id }}"
                                                                         tabindex="-1"
                                                                         aria-hidden="true">
                                                                        <div
                                                                            class="modal-dialog modal-lg modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <button type="button" class="close"
                                                                                        data-bs-dismiss="modal">&times;
                                                                                </button>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col-9">
                                                                                            <div
                                                                                                class="card-title">{{ucfirst($project->$language->MPE_Name)}}
                                                                                                <textarea
                                                                                                    id="txt{{$project->id}}"
                                                                                                    style="display: none;"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-3 gap-1 d-flex justify-content-end align-items-baseline">

                                                                                            @if($project->latitude != '0' && $project->longtitude != '0')
                                                                                                <a href="https://www.google.com/maps/search/?api=1&query={{$project->latitude}},{{$project->longtitude}}"
                                                                                                   target="_blank">
                                                                                                    <img
                                                                                                        class="location-icon"
                                                                                                        data-hover="/images/ico/project-locationH.svg"
                                                                                                        data-tooltip="location"
                                                                                                        src="/images/ico/project-location.svg">
                                                                                                </a>
                                                                                            @endif
                                                                                            <img
                                                                                                src="/images/ico/project-copy.svg"
                                                                                                data-hover="/images/ico/project-copyH.svg"
                                                                                                onclick="copyText({{$project->id}},{{$project->MPE_City}})"
                                                                                                data-tooltip="copy"
                                                                                                class="copy-icon">
                                                                                            @if($project->MPE_Video != '0')
                                                                                                <a href="{{$project->MPE_Video}}"
                                                                                                   id="microVideoAA-{{$project->id}}"
                                                                                                   data-fancybox="microVideoAA-{{$project->id}}">
                                                                                                    <img
                                                                                                        class="video-icon"
                                                                                                        data-tooltip="video"
                                                                                                        data-hover="/images/ico/project-videoH.svg"
                                                                                                        src="/images/ico/project-video.svg">
                                                                                                </a>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="card-title-section"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        id="project-carousel-{{$project->id}}"
                                                                                        class="carousel slide"
                                                                                        data-bs-ride="carousel">
                                                                                        <div
                                                                                            class="carousel-indicators">
                                                                                                <?php $k = 0 ?>
                                                                                            @foreach($project->images as $image)
                                                                                                <button type="button"
                                                                                                        data-bs-target="#project-carousel-{{$project->id}}"
                                                                                                        data-bs-slide-to="{{$k++}}"
                                                                                                        @if($k == 1)class="active" @endif>
                                                                                                </button>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        <div class="carousel-inner">
                                                                                                <?php $k = 0 ?>
                                                                                            @foreach($project->images as $image)
                                                                                                <div
                                                                                                    class="carousel-item @if($k++ == 0) active @endif">
                                                                                                    <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                                       data-fancybox="gallery{{$project->id}}"
                                                                                                       data-caption="{{ucfirst($project->$language->MPE_Name)}}">
                                                                                                        <img
                                                                                                            loading="lazy"
                                                                                                            src="{{$image->MPI_Path}}"
                                                                                                            class="d-block w-100 h-auto"
                                                                                                            style="object-fit: cover;">
                                                                                                    </a>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        <button
                                                                                            class="carousel-control-prev"
                                                                                            data-bs-target="#project-carousel-{{$project->id}}"
                                                                                            data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                                                            <span
                                                                                                class="visually-hidden">Previous</span>
                                                                                        </button>
                                                                                        <button
                                                                                            class="carousel-control-next"
                                                                                            data-bs-target="#project-carousel-{{$project->id}}"
                                                                                            data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                                                            <span
                                                                                                class="visually-hidden">Next</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        id="modal-swipe-{{$project->id}}">
                                                                                        <div class="row mt-5">
                                                                                            <div
                                                                                                class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                                                <ul>
                                                                                                    @if($project->MPE_PartnerName == '0' && $project->MPE_PartnerName2 == '0')
                                                                                                        <li class="card-subtitle">
                                                                                                            <Strong>@lang('main.beneficiary')</strong>
                                                                                                            <span>{{ucfirst($project->MPE_BeneficiaryName)}}</span>
                                                                                                        </li>
                                                                                                    @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 == '0')
                                                                                                        <li class="card-subtitle">
                                                                                                            <Strong>@lang('main.beneficiaries')</strong>
                                                                                                            <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName)}}</span>
                                                                                                        </li>
                                                                                                    @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 != '0')
                                                                                                        <li class="card-subtitle">
                                                                                                            <Strong>@lang('main.beneficiaries')</strong>
                                                                                                            <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName) .', '.ucfirst($project->MPE_PartnerName2)}}</span>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if($project->MPE_FundedDate !=  NULL)
                                                                                                        <li class="card-subtitle">
                                                                                                            <Strong
                                                                                                            >@lang('projects.fundDate')</Strong>
                                                                                                            <span> {{date('m/Y',strtotime($project->MPE_FundedDate))}}</span>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if($project->MPE_City !=  NULL)
                                                                                                        <li
                                                                                                            class="card-subtitle">
                                                                                                            <Strong
                                                                                                            >City:</Strong>
                                                                                                            <span> {{$project->place['name']}}</span>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if($project->DOB != '0')
                                                                                                        <li class="card-subtitle">
                                                                                                            <strong
                                                                                                            >@lang('projects.age')</strong>
                                                                                                            <span> {{\Carbon\Carbon::createFromDate($project->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if($project->FamilyMembers != '0')
                                                                                                        <li class="card-subtitle">
                                                                                                            <strong
                                                                                                            >@lang('projects.family')</strong>
                                                                                                            <span>{{$project->FamilyMembers}}</span>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if($project->$language->MPE_ExpSkill != '')
                                                                                                        <div><strong
                                                                                                                class="card-subtitle">@lang('projects.skills')</strong>
                                                                                                            <span>{{$project->$language->MPE_ExpSkill}}</span>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                                                            >
                                                                                                @if($project->MPE_Donor==13 || $project->MPE_Donor==12)
                                                                                                    <div
                                                                                                        class="missio-donor-logo">
                                                                                                        <img
                                                                                                            class="w-100 h-100"
                                                                                                            src="{{$project->donor['logo']}}">
                                                                                                    </div>
                                                                                                @elseif($project->MPE_Donor== 5)
                                                                                                    <div
                                                                                                        class="kerk-donor-logo">
                                                                                                        <img
                                                                                                            class="w-100 h-100"
                                                                                                            src="{{$project->donor['logo']}}">
                                                                                                    </div>
                                                                                                @elseif($project->MPE_Donor== 3)
                                                                                                    <div
                                                                                                        class="louvre-donor-logo">
                                                                                                        <img
                                                                                                            class="w-100 h-100"
                                                                                                            src="{{$project->donor['logo']}}">
                                                                                                    </div>
                                                                                                @elseif($project->MPE_Donor== 8)
                                                                                                    <div
                                                                                                        class="hungary-donor-logo">
                                                                                                        <img
                                                                                                            class="w-100 h-100"
                                                                                                            src="{{$project->donor['logo']}}">
                                                                                                    </div>
                                                                                                @else
                                                                                                    <div
                                                                                                        class="project-donor-logo">
                                                                                                        <img
                                                                                                            class="w-100 h-100"
                                                                                                            src="{{$project->donor['logo']}}">
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-content">
                                                                                            <p class="p-justify">{!!$project->$language->MPE_Suffering!!}</p>
                                                                                        </div>

                                                                                        <textarea
                                                                                            id="txt{{$project->id}}"
                                                                                            style="display: none;">
                                                                                    </textarea>
                                                                                        <div
                                                                                            class="text-center swipe-arrows">
                                                                                            <i class="fa fa-angle-double-up"></i>
                                                                                            <p>@lang('main.swipeUp')</p>
                                                                                        </div>
                                                                                        <div class="swipe-to-close"
                                                                                             id="swipe-to-close-{{$project->id}}"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End modal -->
                                                                @else
                                                                    <p>{!! $project->$language->MPE_Suffering !!}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div
                                                        class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative " style="padding: 1.5vw;">
                                                        <div class="row d-flex align-items-center">
                                                            <div class="col-9">
                                                                <div
                                                                    class="card-title">{{ucfirst($project->$language->MPE_Name)}}
                                                                    <textarea id="txt{{$project->id}}"
                                                                              style="display: none;"></textarea>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-3 gap-1 d-flex justify-content-end align-items-baseline">
                                                                <img src="/images/ico/project-copy.svg"
                                                                     data-hover="/images/ico/project-copyH.svg"
                                                                     onclick="copyText({{$project->id}})"
                                                                     class="copy-icon">
                                                                @if($project->latitude != '0' && $project->longtitude != '0')
                                                                    <a href="https://www.google.com/maps/search/?api=1&query={{$project->latitude}},{{$project->longtitude}}"
                                                                       target="_blank">
                                                                        <img class="location-icon"
                                                                             src="/images/ico/project-location.svg">
                                                                    </a>
                                                                @endif
                                                                @if($project->MPE_Video != '0')
                                                                    <a href="{{$project->MPE_Video}}"
                                                                       id="microVideo-{{$project->id}}"
                                                                       data-fancybox="microVideo-{{$project->id}}">
                                                                        <img class="video-icon"
                                                                             data-hover="/images/ico/project-videoH.svg"
                                                                             src="/images/ico/project-video.svg">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="card-title-section"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                @if($project->MPE_PartnerName == '0' && $project->MPE_PartnerName2 == '0')
                                                                    <div class="card-subtitle">
                                                                        <Strong>@lang('main.beneficiary')</strong>
                                                                        <span>{{ucfirst($project->MPE_BeneficiaryName)}}</span>
                                                                    </div>
                                                                @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 == '0')
                                                                    <div class="card-subtitle">
                                                                        <Strong>@lang('main.beneficiaries')</strong>
                                                                        <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName)}}</span>
                                                                    </div>
                                                                @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 != '0')
                                                                    <div class="card-subtitle">
                                                                        <Strong>@lang('main.beneficiaries')</strong>
                                                                        <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName) .', '.ucfirst($project->MPE_PartnerName2)}}</span>
                                                                    </div>
                                                                @endif
                                                                @if($project->MPE_FundedDate !=  NULL)
                                                                    <div class="card-subtitle"><Strong
                                                                        >@lang('projects.fundDate')</Strong>
                                                                        <span> {{date('m/Y',strtotime($project->MPE_FundedDate))}}</span>
                                                                    </div>
                                                                @endif
                                                                @if($project->MPE_City !=  NULL)
                                                                    <div class="card-subtitle"><Strong
                                                                        >City:</Strong>
                                                                        <span> {{$project->place['name']}}</span>
                                                                    </div>
                                                                @endif
                                                                @if($project->DOB != '0')
                                                                    <div class="card-subtitle"><strong
                                                                        >@lang('projects.age')</strong>
                                                                        <span> {{\Carbon\Carbon::createFromDate($project->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                    </div>
                                                                @endif
                                                                @if($project->FamilyMembers != '0')
                                                                    <div class="card-subtitle"><strong
                                                                        >@lang('projects.family')</strong>
                                                                        <span>{{$project->FamilyMembers}}</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start">
                                                                @if($project->MPE_Donor==13 || $project->MPE_Donor==12)
                                                                    <div class="missio-donor-logo">
                                                                        <img class="w-100 h-100"
                                                                             src="{{$project->donor['logo']}}">
                                                                    </div>
                                                                @elseif($project->MPE_Donor== 5)
                                                                    <div class="kerk-donor-logo">
                                                                        <img class="w-100 h-100"
                                                                             src="{{$project->donor['logo']}}">
                                                                    </div>
                                                                @elseif($project->MPE_Donor== 3)
                                                                    <div class="louvre-donor-logo">
                                                                        <img class="w-100 h-100"
                                                                             src="{{$project->donor['logo']}}">
                                                                    </div>
                                                                @elseif($project->MPE_Donor== 8)
                                                                    <div class="hungary-donor-logo">
                                                                        <img class="w-100 h-100"
                                                                             src="{{$project->donor['logo']}}">
                                                                    </div>
                                                                @else
                                                                    <div class="project-donor-logo">
                                                                        <img class="w-100 h-100"
                                                                             src="{{$project->donor['logo']}}">
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @if($project->$language->MPE_ExpSkill != '')
                                                                <div class="card-subtitle"><strong
                                                                    >@lang('projects.skills')</strong>
                                                                    <span>{{$project->$language->MPE_ExpSkill}}</span>
                                                                </div>
                                                            @endif
                                                            <div class="card-content">
                                                                @if(strlen($project->$language->MPE_Suffering)>15)
                                                                    <p>{!!implode(' ', array_slice(explode(' ', strip_tags($project->$language->MPE_Suffering)), 0, 15)).'...'!!}</p>
                                                                @else
                                                                    <p>{!! $project->$language->MPE_Suffering !!}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col d-flex justify-content-end">
                                                                @if(strlen($project->$language->MPE_Suffering)>15)
                                                                    <button class="readmore-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#projectDetailsModal-{{ $project->id }}">@lang('main.readMore')
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade project-detail"
                                                                         id="projectDetailsModal-{{ $project->id }}"
                                                                         tabindex="-1"
                                                                         aria-hidden="true">
                                                                        <div
                                                                            class="modal-dialog modal-lg modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <button type="button" class="close"
                                                                                        data-bs-dismiss="modal">&times;
                                                                                </button>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col-9">
                                                                                            <div
                                                                                                class="card-title">{{ucfirst($project->$language->MPE_Name)}}
                                                                                                <textarea
                                                                                                    id="txt{{$project->id}}"
                                                                                                    style="display: none;"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-3 gap-1 d-flex justify-content-end align-items-baseline">
                                                                                            <img
                                                                                                src="/images/ico/project-copy.svg"
                                                                                                data-hover="/images/ico/project-copyH.svg"
                                                                                                onclick="copyText({{$project->id}},{{$project->MPE_City}})"
                                                                                                data-tooltip="copy"
                                                                                                class="copy-icon">
                                                                                            @if($project->latitude != '0' && $project->longtitude != '0')
                                                                                                <a href="https://www.google.com/maps/search/?api=1&query={{$project->latitude}},{{$project->longtitude}}"
                                                                                                   target="_blank">
                                                                                                    <img
                                                                                                        class="location-icon"
                                                                                                        data-hover="/images/ico/project-locationH.svg"
                                                                                                        data-tooltip="location"
                                                                                                        src="/images/ico/project-location.svg">
                                                                                                </a>
                                                                                            @endif
                                                                                            @if($project->MPE_Video != '0')
                                                                                                <a href="{{$project->MPE_Video}}"
                                                                                                   id="microVideoAA-{{$project->id}}"
                                                                                                   data-fancybox="microVideoAA-{{$project->id}}">
                                                                                                    <img
                                                                                                        class="video-icon"
                                                                                                        data-tooltip="video"
                                                                                                        data-hover="/images/ico/project-videoH.svg"
                                                                                                        src="/images/ico/project-video.svg">
                                                                                                </a>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="card-title-section"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        id="project-carousel-{{$project->id}}"
                                                                                        class="carousel slide"
                                                                                        data-bs-ride="carousel">
                                                                                        <div
                                                                                            class="carousel-indicators">
                                                                                                <?php $k = 0 ?>
                                                                                            @foreach($project->images as $image)
                                                                                                <button type="button"
                                                                                                        data-bs-target="#project-carousel-{{$project->id}}"
                                                                                                        data-bs-slide-to="{{$k++}}"
                                                                                                        @if($k == 1)class="active" @endif>
                                                                                                </button>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        <div class="carousel-inner">
                                                                                                <?php $k = 0 ?>
                                                                                            @foreach($project->images as $image)
                                                                                                <div
                                                                                                    class="carousel-item @if($k++ == 0) active @endif">
                                                                                                    <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                                       data-fancybox="gallery{{$project->id}}"
                                                                                                       data-caption="{{ucfirst($project->$language->MPE_Name)}}">
                                                                                                        <img
                                                                                                            loading="lazy"
                                                                                                            src="{{$image->MPI_Path}}"
                                                                                                            class="d-block w-100 h-auto"
                                                                                                            style="object-fit: cover;">
                                                                                                    </a>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        <button
                                                                                            class="carousel-control-prev"
                                                                                            data-bs-target="#project-carousel-{{$project->id}}"
                                                                                            data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                                                            <span
                                                                                                class="visually-hidden">Previous</span>
                                                                                        </button>
                                                                                        <button
                                                                                            class="carousel-control-next"
                                                                                            data-bs-target="#project-carousel-{{$project->id}}"
                                                                                            data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                                                            <span
                                                                                                class="visually-hidden">Next</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        id="modal-swipe-{{$project->id}}">
                                                                                        <div class="row mt-5">
                                                                                            <div
                                                                                                class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                                                <ul>
                                                                                                    @if($project->MPE_PartnerName == '0' && $project->MPE_PartnerName2 == '0')
                                                                                                        <li class="card-subtitle">
                                                                                                            <Strong>@lang('main.beneficiary')</strong>
                                                                                                            <span>{{ucfirst($project->MPE_BeneficiaryName)}}</span>
                                                                                                        </li>
                                                                                                    @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 == '0')
                                                                                                        <li class="card-subtitle">
                                                                                                            <Strong>@lang('main.beneficiaries')</strong>
                                                                                                            <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName)}}</span>
                                                                                                        </li>
                                                                                                    @elseif($project->MPE_PartnerName != '0' && $project->MPE_PartnerName2 != '0')
                                                                                                        <li class="card-subtitle">
                                                                                                            <Strong>@lang('main.beneficiaries')</strong>
                                                                                                            <span>{{ucfirst($project->MPE_BeneficiaryName) .', '. ucfirst($project->MPE_PartnerName) .', '.ucfirst($project->MPE_PartnerName2)}}</span>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if($project->MPE_FundedDate !=  NULL)
                                                                                                        <li class="card-subtitle">
                                                                                                            <Strong
                                                                                                            >@lang('projects.fundDate')</Strong>
                                                                                                            <span> {{date('m/Y',strtotime($project->MPE_FundedDate))}}</span>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if($project->MPE_City !=  NULL)
                                                                                                        <div
                                                                                                            class="card-subtitle">
                                                                                                            <Strong
                                                                                                            >City:</Strong>
                                                                                                            <span> {{$project->place['name']}}</span>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                    @if($project->DOB != '0')
                                                                                                        <li class="card-subtitle">
                                                                                                            <strong
                                                                                                            >@lang('projects.age')</strong>
                                                                                                            <span> {{\Carbon\Carbon::createFromDate($project->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if($project->FamilyMembers != '0')
                                                                                                        <li class="card-subtitle">
                                                                                                            <strong
                                                                                                            >@lang('projects.family')</strong>
                                                                                                            <span>{{$project->FamilyMembers}}</span>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if($project->$language->MPE_ExpSkill != '')
                                                                                                        <div><strong
                                                                                                                class="card-subtitle">@lang('projects.skills')</strong>
                                                                                                            <span>{{$project->$language->MPE_ExpSkill}}</span>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                                                            >
                                                                                                @if($project->MPE_Donor==13 || $project->MPE_Donor==12)
                                                                                                    <div
                                                                                                        class="missio-donor-logo">
                                                                                                        <img
                                                                                                            class="w-100 h-100"
                                                                                                            src="{{$project->donor['logo']}}">
                                                                                                    </div>
                                                                                                @elseif($project->MPE_Donor== 5)
                                                                                                    <div
                                                                                                        class="kerk-donor-logo">
                                                                                                        <img
                                                                                                            class="w-100 h-100"
                                                                                                            src="{{$project->donor['logo']}}">
                                                                                                    </div>
                                                                                                @elseif($project->MPE_Donor== 3)
                                                                                                    <div
                                                                                                        class="louvre-donor-logo">
                                                                                                        <img
                                                                                                            class="w-100 h-100"
                                                                                                            src="{{$project->donor['logo']}}">
                                                                                                    </div>
                                                                                                @elseif($project->MPE_Donor== 8)
                                                                                                    <div
                                                                                                        class="hungary-donor-logo">
                                                                                                        <img
                                                                                                            class="w-100 h-100"
                                                                                                            src="{{$project->donor['logo']}}">
                                                                                                    </div>
                                                                                                @else
                                                                                                    <div
                                                                                                        class="project-donor-logo">
                                                                                                        <img
                                                                                                            class="w-100 h-100"
                                                                                                            src="{{$project->donor['logo']}}">
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-content">
                                                                                            <p class="p-justify">{!!$project->$language->MPE_Suffering!!}</p>
                                                                                        </div>

                                                                                        <textarea
                                                                                            id="txt{{$project->id}}"
                                                                                            style="display: none;">
                                                                                    </textarea>
                                                                                        <div
                                                                                            class="text-center swipe-arrows">
                                                                                            <i class="fa fa-angle-double-up"></i>
                                                                                            <p>@lang('main.swipeUp')</p>
                                                                                        </div>
                                                                                        <div class="swipe-to-close"
                                                                                             id="swipe-to-close-{{$project->id}}"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End modal -->
                                                                @else
                                                                    <p>{!! $project->$language->MPE_Suffering !!}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end p-0">
                                                        <div id="project-carousel{{$project->id}}"
                                                             class="carousel slide w-100 project-carousel"
                                                             data-bs-ride="carousel" data-interval="1000">
                                                            <div class="carousel-inner project-carousel">
                                                                    <?php $k = 0 ?>
                                                                @foreach($project->images as $image)
                                                                    <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                       class="carousel-item @if($k++ == 0) active @endif"
                                                                       data-fancybox="gallery-grid-{{$project->id}}"
                                                                       data-caption="{{ucfirst($project->$language->MPE_Name)}}">
                                                                        <img src="{{$image->MPI_Path}}"
                                                                             class="w-100 h-100"
                                                                             loading="lazy"
                                                                             style="object-fit: cover">
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                            <button class="carousel-control-prev"
                                                                    data-bs-target="#project-carousel{{$project->id}}"
                                                                    data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                                <span class="visually-hidden">Previous</span>
                                                            </button>
                                                            <button class="carousel-control-next"
                                                                    data-bs-target="#project-carousel{{$project->id}}"
                                                                    data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                                <span class="visually-hidden">Next</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif
                                                @php $numOfProjects++ ;@endphp
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <!-- Placeholder -->
                        <div wire:loading wire:target="loadMore" wire:loading.class="d-block"
                             wire:loading.remove.class="d-none">
                            @if($activeView == 'tiles')
                                <div class="row">
                                    @for($i = 0; $i < 3; $i++)
                                        <div class="col-md-4 col-lg-4 col-12 mb-4">
                                            <div class="project-placeholder p-3">
                                                <div class="image mb-3"></div>
                                                <div class="line long"></div>
                                                <div class="line medium"></div>
                                                <div class="line short"></div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            @else
                                <div class="mt-3 grid-placeholder">
                                    <div class="row w-100 mt-5">
                                        <div
                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end ps-0"
                                            style="background: #e9e9e9;">
                                            <div class="project-placeholder">
                                                <div class="image"></div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative ps-0 pe-0">
                                            <div class="project-placeholder" style="height: 100%">
                                                <div class="line medium m-3"></div>
                                                <br>
                                                <div class="line short m-3"></div>
                                                <div class="line medium m-3"></div>
                                                <div class="line short m-3"></div>
                                                <br>
                                                <div class="line long m-3"></div>
                                                <div class="line long m-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if($this->hasMore)
                            <div class="text-center mt-5 mb-1">
                                <button class="apply-btn loadmore m-0" wire:click="loadMore">Load More</button>
                            </div>
                        @endif
                    @else
                        <div class=" alert alert-secondary text-center mt-3">
                            No Projects Found
                        </div>
                    @endif
                    <div class="small horizontal-line mt-md-5 "></div>
                    <div id="map-section" class="section-space mb-3 " data-aos="fade-up"
                         data-aos-duration="800">
                        <div class="container-fluid ">
                            <div class="row ">
                                <div class="col-12 d-flex justify-content-center p-0" data-aos="fade-up"
                                     data-aos-duration="600">
                                    <div class="section-title pt-0">Map Locations</div>
                                </div>
                            </div>
                        </div>
                        <div class="small horizontal-line "></div>
                        <div id='syria_map' wire:ignore class="map " data-aos="fade-up"
                             data-aos-duration="600"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const checkbox = document.getElementById("videoFilter");
                const icon = document.getElementById("videoIcon");
                const switchLabel = document.getElementById("switchvideo");

                function updateSwitch() {
                    if (checkbox.checked) {
                        switchLabel.style.background = "#BC1818"; // red
                        icon.src = "/images/ico/reverst-video.svg";
                    } else {
                        switchLabel.style.background = "#f7f7f7"; // gray
                        icon.src = "/images/ico/search-video-icon.svg";
                    }
                }


                // // Run on load (keeps Livewire state after refresh/apply)
                updateSwitch();
                //
                // // Run on toggle
                checkbox.addEventListener("change", updateSwitch);
                //
                // // Optional: update after Livewire updates the DOM
                document.addEventListener("livewire:update", updateSwitch);
            });
        </script>
        <script>
            $(function () {
                $('#videoFilter').on("mouseenter", function () {
                    $('.bl').hide();
                    $(this).showBalloon({
                        position: "right",
                        contents: "project with video",
                        classname: "bl",
                        maxLifetime: 1000,
                        tipSize: 0,
                        delay: 100,
                        hideDuration: 500,
                        offsetX: 10,
                        showAnimation: function (d, c) {
                            this.fadeIn(d, c);
                        },
                        css: {
                            fontSize: '1.1rem'
                        }
                    });
                })
            });
        </script>
        <script>
            function copyText(id) {
                const url = location.host + "/projects/micro-projects?projectDetailsModal=" + id;
                navigator.clipboard.writeText(url);
            }
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                const urlParams = new URLSearchParams(window.location.search);
                const modalId = urlParams.get("projectDetailsModal");

                if (modalId) {
                    const modalElement = document.getElementById("projectDetailsModal-" + modalId);
                    if (modalElement) {
                        const modal = new bootstrap.Modal(modalElement, {
                            backdrop: 'static',
                            keyboard: true
                        });
                        modal.show();
                    }
                }
            });
        </script>
        <script>
            let substringMatcher = function (strs) {
                return function findMatches(q, cb) {
                    let matches, substrRegex;
                    matches = [];
                    substrRegex = new RegExp(q, 'i');
                    $.each(strs, function (i, str) {
                        if (substrRegex.test(str)) {
                            matches.push(str);
                        }
                    });
                    cb(matches);
                };
            };
            let projects = [];
            let beneficiaries = [];
            @foreach($uniqueProjects as $name) projects.push('{{ $name }}'.replace('&#039;', '\''));
            @endforeach
            @foreach($uniqueBeneficiaries as $name) beneficiaries.push('{{ $name }}'.replace('&#039;', '\''));
            @endforeach
            function initTypeahead() {
                $('#search-input').typeahead({hint: true, highlight: true, minLength: 1}, {
                    name: 'projects',
                    source: substringMatcher(projects),
                    templates: {header: '<h5 class="league-name">@lang("projects.projectsNames")</h5>'}
                }, {
                    name: 'beneficiaries',
                    source: substringMatcher(beneficiaries),
                    templates: {header: '<h5 class="league-name">{{__("projects.beneficiariesNames")}}</h5>'}
                }).on('typeahead:select', function () {
                    $search = $('#search-input').val();
                    window.Livewire.dispatch('setSearchFromTypeahead', {value: $search});
                });
            }

            initTypeahead();
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('img[data-hover]').forEach(img => {
                    const originalSrc = img.getAttribute('src');
                    const hoverSrc = img.getAttribute('data-hover');

                    img.addEventListener('mouseenter', () => img.src = hoverSrc);
                    img.addEventListener('mouseleave', () => img.src = originalSrc);
                });
                $('img[data-tooltip]').hover(function () {
                    const message = $(this).data('tooltip');
                    $('.bl').hide(); // close any open balloons
                    $(this).showBalloon({
                        position: "top",
                        contents: message,
                        classname: "bl",
                        maxLifetime: 1500,
                        tipSize: 0,
                        delay: 100,
                        hideDuration: 300,
                        offsetY: -5,
                        showAnimation: function (d, c) {
                            this.fadeIn(d, c);
                        },
                        css: {
                            fontSize: '1rem'
                        }
                    });
                }, function () {
                    $(this).hideBalloon();
                });
                $('.copy-icon').on("click", function () {
                    $('.bl').hide();
                    $(this).showBalloon({
                        position: "left",
                        contents: "@lang('donate.copied')",
                        classname: "bl",
                        maxLifetime: 1000,
                        tipSize: 0,
                        delay: 100,
                        hideDuration: 500,
                        offsetX: -10,
                        showAnimation: function (d, c) {
                            this.fadeIn(d, c);
                        },
                        css: {
                            fontSize: '1.1rem'
                        }
                    });
                });

            });

        </script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const tilesIcon = document.getElementById('tiles');
                const gridIcon = document.getElementById('grid');
                const tilesSection = document.getElementById('tiles-section');
                const gridSection = document.getElementById('grid-section');

                if (!tilesIcon || !gridIcon || !tilesSection || !gridSection) return;

                // Helper function to apply the chosen view
                function applyView(view) {
                    if (view === 'grid') {
                        tilesSection.classList.add('d-none');
                        gridSection.classList.remove('d-none');
                        gridIcon.classList.add('active');
                        tilesIcon.classList.remove('active');
                    } else {
                        gridSection.classList.add('d-none');
                        tilesSection.classList.remove('d-none');
                        tilesIcon.classList.add('active');
                        gridIcon.classList.remove('active');
                    }
                }

                // Toggle handlers
                tilesIcon.addEventListener('click', () => {
                    localStorage.setItem('projectView', 'tiles');
                    applyView('tiles');
                });

                gridIcon.addEventListener('click', () => {
                    localStorage.setItem('projectView', 'grid');
                    applyView('grid');
                });

                // Initial state on page load
                const savedView = localStorage.getItem('projectView') || 'tiles';
            });
        </script>
        <script>
            $(".readmore-btn").click(function () {
                $(this).next().modal('show');
            });
        </script>
        <script>
            $(".close").on('click', function () {
                $(".close").closest(".modal").modal('hide');
            });
        </script>
        <script>
            $(document).ready(function () {
                if ('ontouchstart' in document.documentElement) {
                    $('.swipe-arrows').css('display', 'block');

                    $(".touch-slide").swiperight(function () {
                        $(this).carousel('prev');
                    });
                    $(".touch-slide").swipeleft(function () {
                        $(this).carousel('next');
                    });
                    $(".btn-primary").click(function () {
                        $('body').css({overflow: 'hidden'});
                    });
                }
            });
        </script>
        <script>
            document.addEventListener('scroll-to-projects', () => {
                const section = document.getElementById('projects-section');
                if (section) {
                    section.scrollIntoView({behavior: 'smooth', block: 'start'});
                }
            });
        </script>
    </div>
</div>
