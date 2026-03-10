<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>See All Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;700&family=Poppins:wght@500&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/searchjobs-sha8er.css">
</head>
<body>

<div id="AllJobs">
    <div class="container-fluid jobs-cover">
        <div class="page-margin">
            <div class="row d-flex justify-content-between">
                <div class="col position-relative">
                    <div class="jobs_title">All Jobs
                    </div>
                    <img class="title-line" src="/images/profile/title-line.svg">
                    <div class="jobs_subtitle">
                        Find All the resulting jobs you filtered! Find All the resulting jobs you filtered! Find All the
                        resulting jobs you filtered! Find All the resulting jobs you filtered! Find All the resulting
                        jobs you filtered! Find All the resulting jobs you filtered! Find All the resulting jobs you
                        filtered! Find All the resulting jobs you filtered!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid all-jobs">
        <div class="page-margin">
            <div class="row mt-4">
                <div class="col-auto mt-1 mb-4 position-relative">
                    <div class="page-title">Jobs Filter</div>
                    <img class="title-line" src="/images/profile/title-line.svg">
                </div>
            </div>
            <div class="filter-job-section mb-4">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-2 col-md-2 col-12  position-relative">
                        <div class="form-group d-flex align-items-center">
                            <span id="category-icon" class="search-icon"><img
                                        src="/images/jobs/category-icon.svg"></span>
                            <select class="chosen-select form-select"
                                    aria-label="Category" data-live-search="true" data-size="5" name="search-categories"
                                    id="searchCategories">
                                <option value="" disabled selected> Category</option>
                                <option>Arts & Design</option>
                                <option>Business & Consultancy</option>
                                <option>Customer Service</option>
                                {{--<option value="">@lang('web.job_menu.none')</option>--}}
                                {{--@foreach($jobCategories as $key => $value)--}}
                                {{--<option value="{{ $key }}" {{ (request()->get('categories') == $key) ? 'selected' : '' }}>--}}
                                {{--{{ html_entity_decode($value) }}--}}
                                {{--</option>--}}
                                {{--@endforeach--}}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12  position-relative">
                        <div class="form-group d-flex align-items-center">
                            <span id="city-icon" class="search-icon"><img
                                        src="/images/profile/location-icon.svg"></span>
                            <select class="chosen-select form-select "
                                    aria-label="City" data-live-search="true" data-size="5" name="search-city"
                                    id="searchCity">
                                <option value="" disabled selected> City</option>
                                <option>Arts & Design</option>
                                <option>Business & Consultancy</option>
                                <option>Customer Service</option>
                                {{--<option value="">@lang('web.job_menu.none')</option>--}}
                                {{--@foreach($jobCategories as $key => $value)--}}
                                {{--<option value="{{ $key }}" {{ (request()->get('categories') == $key) ? 'selected' : '' }}>--}}
                                {{--{{ html_entity_decode($value) }}--}}
                                {{--</option>--}}
                                {{--@endforeach--}}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12  position-relative">
                        <div class="form-group d-flex align-items-center">
                            <span id="time-icon" class="search-icon"><img src="/images/jobs/time-icon.svg"></span>
                            <select class="chosen-select form-select "
                                    aria-label="Full Time" data-live-search="true" data-size="5" name="search-fulltime"
                                    id="searchFullTime">
                                <option value="" disabled selected>
                                    Full Time
                                </option>
                                <option>Arts & Design</option>
                                <option>Business & Consultancy</option>
                                <option>Customer Service</option>
                                {{--<option value="">@lang('web.job_menu.none')</option>--}}
                                {{--@foreach($jobCategories as $key => $value)--}}
                                {{--<option value="{{ $key }}" {{ (request()->get('categories') == $key) ? 'selected' : '' }}>--}}
                                {{--{{ html_entity_decode($value) }}--}}
                                {{--</option>--}}
                                {{--@endforeach--}}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12  position-relative">
                        <div class="form-group d-flex align-items-center">
                            <span id="company-icon" class="search-icon"><img src="/images/jobs/company-icon.svg"></span>
                            <select class="chosen-select form-select "
                                    aria-label="Company" data-live-search="true" data-size="5" name="search-companies"
                                    id="searchCompanies">
                                <option value="" disabled selected>
                                    Company
                                </option>
                                <option>Arts & Design</option>
                                <option>Business & Consultancy</option>
                                <option>Customer Service</option>
                                {{--<option value="">@lang('web.job_menu.none')</option>--}}
                                {{--@foreach($jobCategories as $key => $value)--}}
                                {{--<option value="{{ $key }}" {{ (request()->get('categories') == $key) ? 'selected' : '' }}>--}}
                                {{--{{ html_entity_decode($value) }}--}}
                                {{--</option>--}}
                                {{--@endforeach--}}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12  position-relative">
                        <div class="form-group d-flex align-items-center">
                            <span id="colored-icon" class="search-icon"><img src="/images/jobs/colored-search-icon.svg"></span>
                            <input type="text" class="form-control "
                                   name="listing-search" id="searchByLocation"
                                   placeholder="KeyWords">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12 position-relative">
                        <div class="form-group d-flex align-items-center">
                            <span id="search-icon" class="search-icon"><img src="/images/jobs/search-icon.svg"></span>
                            <button class="btn reset-filter">
                                Reset Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <ul class="nav nav-tabs d-flex mb-4" id="tabList" role="tablist">
                <li class="nav-item pe-2" role="presentation">
                    <button id="allTab" class="pe-4 allTab nav-link active position-relative" data-bs-toggle="tab"
                            data-bs-target="#all" role="tab" aria-controls="all" aria-selected="true">All(10/100)
                        <img class="title-line" src="/images/profile/title-line.svg">
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="appliedTab" class="appliedTab nav-link position-relative" data-bs-toggle="tab"
                            data-bs-target="#applied" role="tab" aria-controls="applied" aria-selected="false">
                        Applied(2/6)
                        <img class="title-line" src="/images/profile/title-line.svg">
                    </button>
                </li>
            </ul>
            <div class="tab-content position-relative" id="myTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="allTab" tabindex="0">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn"> Apply to Job</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn"> Apply to Job</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn"> Apply to Job</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn"> Apply to Job</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn"> Apply to Job</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn"> Apply to Job</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn"> Apply to Job</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn"> Apply to Job</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                <span class="page-link" aria-hidden="true">‹</span>
                            </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link">2</a>
                            </li>
                            <li class="page-item"><a class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" rel="next" aria-label="Next »">›</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <button class="btn show-all-btn mt-5" type="submit">
                                Show All
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="applied" role="tabpanel" aria-labelledby="appliedTab" tabindex="1">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-5">
                            <div class="main-card position-relative">
                                <img class="main-card-shadow position-absolute" src="/images/jobs/card-shadow.png">
                                <div class="row d-flex align-items-start">
                                    <div class="col-4 d-flex justify-content-center">
                                        <div class="main-card-img">
                                            <img class="w-100 h-100" src="/images/jobs/card-img.png">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="main-card-title">
                                                    Front-End Development
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="job-type">
                                                    Full Time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-company">
                                            Elcode
                                        </div>
                                        <div class="row job-details">
                                            <div class="col-6">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="date">
                                                    <span><img src="/images/jobs/time-icon.svg"></span>20/3/2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0">
                                        <div class="col p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied">
                                                <span><i class="fa fa-check pe-2"></i></span>Applied
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                <span class="page-link" aria-hidden="true">‹</span>
                            </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link">2</a>
                            </li>
                            <li class="page-item"><a class="page-link"
                                >3</a>
                            </li>
                            <li class="page-item"><a class="page-link">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link"
                                   rel="next" aria-label="Next »">›</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <button class="btn show-all-btn mt-5" type="submit">
                                Show All
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#OpenImgUpload').click(function () {
        $('#imgupload').trigger('click');
    });
</script>
</body>
</html>