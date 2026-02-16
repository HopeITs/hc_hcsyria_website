<style>
    .donor-logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5vw;
    }


    .section-divider {
        display: flex;
        justify-content: center;
        position: relative;
        margin-top: 2vw;
        margin-bottom: 2vw;
        align-items: center;
    }

    .section-divider .line {
        flex-grow: 1;
        height: 1px;
        width: 100px;
        background-color: #ccc;
    }

    .section-divider .label {
        padding: 0 1rem;
        color: #aaa;
        font-weight: bold;
        font-size: 1vw;
    }

    @media (max-width: 578px) {
        .section-divider .label {
            font-size: 2.4vw;
        }
        .donor-logo-container {
           flex-wrap: wrap;
        }
    }
</style>
<div class="section-space">
    <div class="container-fluid">
        <div class="row" data-aos="fade-up" data-aos-duration="600">
            <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                <div class="section-title mt-3 pb-0">Our Partners</div>
                <div class="section-divider">
                    <div class="line"></div>
                    <div class="label">Ongoing Project Funders
                    </div>
                    <div class="line"></div>
                </div>
                <div class="donor-logo-container">
                    @foreach($donors_ongoing as $donor)

                        @if($donor->donors->id==13)
                            <div class="missio-donor-logo">
                                <img class="w-100 h-100" style="object-fit: contain"
                                     src="{{$donor ->donors -> logo}}">
                            </div>
                        @elseif($donor->donors->id==12)
                            <div class="missio-donor-logo">
                                <img class="w-100 h-100" style="object-fit: contain"
                                     src="{{$donor ->donors -> logo}}">
                            </div>
                        @elseif($donor->donors->id== 5)
                            <div class="kerk-donor-logo">
                                <img class="w-100 h-100" style="object-fit: contain"
                                     src="{{$donor ->donors -> logo}}">
                            </div>
                        @elseif($donor->donors->id== 15)
                            <div class="kerk-donor-logo">
                                <img class="w-100 h-100" style="object-fit: contain"
                                     src="{{$donor ->donors -> logo}}">
                            </div>
                        @elseif($donor->donors->id== 4)
                            <div class="kerk-donor-logo">
                                <img class="w-100 h-100" style="object-fit: contain"
                                     src="{{$donor ->donors -> logo}}">
                            </div>
                        @elseif($donor->donors->id== 3)
                            <div class="louvre-donor-logo">
                                <img class="w-100 h-100" style="object-fit: contain"
                                     src="{{$donor ->donors -> logo}}">
                            </div>
                        @elseif($donor->donors->id== 6)
                            <div class="louvre-donor-logo">
                                <img class="w-100 h-100" style="object-fit: contain"
                                     src="{{$donor ->donors -> logo}}">
                            </div>
                        @elseif($donor->donors->id== 8)
                            <div class="hungary-donor-logo">
                                <img class="w-100 h-100" style="object-fit: contain"
                                     src="{{$donor ->donors -> logo}}">
                            </div>
                        @else
                            <div class="project-donor-logo">
                                <img class="w-100 h-100" style="object-fit: contain"
                                     src="{{$donor ->donors -> logo}}">
                            </div>
                        @endif
                    @endforeach
                </div>
                @if(count($donors_previous)>0)
                    <div class="section-divider">
                        <div class="line"></div>
                        <div class="label">Previous Project
                            Funders
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="donor-logo-container">
                        @foreach($donors_previous as $donor)
                            @if($donor->donors->id==13)
                                <div class="missio-donor-logo">
                                    <img class="w-100 h-100" style="object-fit: contain"
                                         src="{{$donor ->donors -> logo}}">
                                </div>
                            @elseif($donor->donors->id==12)
                                <div class="missio-donor-logo">
                                    <img class="w-100 h-100" style="object-fit: contain"
                                         src="{{$donor ->donors -> logo}}">
                                </div>
                            @elseif($donor->donors->id== 5)
                                <div class="kerk-donor-logo">
                                    <img class="w-100 h-100" style="object-fit: contain"
                                         src="{{$donor ->donors -> logo}}">
                                </div>
                            @elseif($donor->donors->id== 15)
                                <div class="kerk-donor-logo">
                                    <img class="w-100 h-100" style="object-fit: contain"
                                         src="{{$donor ->donors -> logo}}">
                                </div>
                            @elseif($donor->donors->id== 4)
                                <div class="kerk-donor-logo">
                                    <img class="w-100 h-100" style="object-fit: contain"
                                         src="{{$donor ->donors -> logo}}">
                                </div>
                            @elseif($donor->donors->id== 3)
                                <div class="louvre-donor-logo">
                                    <img class="w-100 h-100" style="object-fit: contain"
                                         src="{{$donor ->donors -> logo}}">
                                </div>
                            @elseif($donor->donors->id== 6)
                                <div class="louvre-donor-logo">
                                    <img class="w-100 h-100" style="object-fit: contain"
                                         src="{{$donor ->donors -> logo}}">
                                </div>
                            @elseif($donor->donors->id== 8)
                                <div class="hungary-donor-logo">
                                    <img class="w-100 h-100" style="object-fit: contain"
                                         src="{{$donor ->donors -> logo}}">
                                </div>
                            @else
                                <div class="project-donor-logo">
                                    <img class="w-100 h-100" style="object-fit: contain"
                                         src="{{$donor->donors -> logo}}">
                                </div>
                            @endif
                        @endforeach
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>
