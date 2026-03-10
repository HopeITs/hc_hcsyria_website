<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>See All Companies</title>
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

<div id="AllCompanies">
    <div class="container-fluid companies-cover">
        <div class="page-margin">
            <div class="row d-flex justify-content-between">
                <div class="col position-relative">
                    <div class="companies_title">All Companies
                    </div>
                    <img class="title-line" src="/images/profile/title-line.svg">
                    <div class="companies_subtitle">
                        Lorem ipsum dolor sit amet consectetur. Tortor tellus elementum ullamcorper mauris quam mauris
                        in id vitae. Scelerisque et massa tortor feugiat praesent. In faucibus pharetra arcu ut sit.
                        Consequat dolor elit a viverra eget lectus semper.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid all-companies">
        <div class="page-margin">
            <div class="row mt-4">
                <div class="col-auto mt-1 mb-4 position-relative">
                    <div class="page-title">Companies Filter</div>
                    <img class="title-line" src="/images/profile/title-line.svg">
                </div>
            </div>
            <section class="filter-job-section mb-4">
                <div class="row justify-content-around align-items-center" style="column-gap: 1.6vw;">
                    <div class="col-lg-2 col-md-3 col-12 position-relative d-flex align-items-center">
                        <span id="category-icon" class="search-icon"><img src="/images/jobs/category-icon.svg"></span>
                        <input type="search"
                               wire:model.debounce.100ms="searchByCategory" autocomplete="off"
                               id="searchByCategory" placeholder="Category">
                    </div>
                    <div class="col-lg-2 col-md-3 col-12 position-relative d-flex align-items-center">
                        <span id="city-icon" class="search-icon"><img src="/images/profile/location-icon.svg"></span>
                        <input  wire:model.debounce.100ms="searchByCity"
                               id="searchByCity"
                               placeholder="City">
                    </div>
                    <div class="col-lg-2 col-md-3 col-12 position-relative d-flex align-items-center">
                        <span id="company-icon" class="search-icon"><img src="/images/jobs/company-icon.svg"></span>
                        <input type="search"
                               wire:model.debounce.100ms="searchByCompany" autocomplete="off"
                               id="searchByCompany" placeholder="Company Name">
                    </div>
                    <div class="col-lg-2 col-md-3 col-12 position-relative d-flex align-items-center">
                        <span id="colored-icon" class="search-icon"><img src="/images/jobs/colored-search-icon.svg"></span>
                        <input wire:model.debounce.100ms="searchByIndustry" style="border-right: none"
                               id="searchByIndustry"
                               placeholder="KeyWords">
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 text-center position-relative d-flex align-items-center">
                        <span id="search-icon" class="search-icon">
                                <img src="/images/jobs/search-icon.svg"></span>
                        <button type="button" wire:click="resetFilter()"
                           class="btn reset-filter" id="btnReset">
                            Reset Filter</button>
                    </div>
                </div>
            </section>


            <ul class="nav nav-tabs d-flex mb-4" id="tabList" role="tablist">
                <li class="nav-item pe-2" role="presentation">
                    <button id="allTab" class="pe-4 allTab nav-link active position-relative" data-bs-toggle="tab"
                            data-bs-target="#all" role="tab" aria-controls="all" aria-selected="true">All(10/100)
                        <img class="title-line" src="/images/profile/title-line.svg">
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="followedTab" class="followedTab nav-link position-relative" data-bs-toggle="tab"
                            data-bs-target="#followed" role="tab" aria-controls="followed" aria-selected="false">
                        Followed(2/6)
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn follow"><i class="fa fa-plus pe-2"
                                                                                         aria-hidden="true"></i>Follow
                                            </button>
                                        </div>
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn follow"><i class="fa fa-plus pe-2"
                                                                                         aria-hidden="true"></i>Follow
                                            </button>
                                        </div>
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn follow"><i class="fa fa-plus pe-2"
                                                                                         aria-hidden="true"></i>Follow
                                            </button>
                                        </div>
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn follow"><i class="fa fa-plus pe-2"
                                                                                         aria-hidden="true"></i>Follow
                                            </button>
                                        </div>
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn follow"><i class="fa fa-plus pe-2"
                                                                                         aria-hidden="true"></i>Follow
                                            </button>
                                        </div>
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn follow"><i class="fa fa-plus pe-2"
                                                                                         aria-hidden="true"></i>Follow
                                            </button>
                                        </div>
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn follow"><i class="fa fa-plus pe-2"
                                                                                         aria-hidden="true"></i>Follow
                                            </button>
                                        </div>
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn follow"><i class="fa fa-plus pe-2"
                                                                                         aria-hidden="true"></i>Follow
                                            </button>
                                        </div>
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="mt-5">
                        {{--@if($companies->count() > 0)--}}
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
                        {{--@endif--}}
                    </nav>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <button class="btn show-all-btn mt-5" type="submit">
                                Show All
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="followed" role="tabpanel" aria-labelledby="followedTab"
                     tabindex="1">
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
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
                                        </div>
                                        <div class="row job-details">
                                            <div class="col">
                                                <div class="place">
                                                    <span><img src="/images/profile/location-icon.svg"></span>Aleppo
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-0 d-flex justify-content-end">
                                        <div class="col-auto p-0 d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn applied follow">
                                                <span><i class="fa fa-check pe-2"></i></span>Following
                                            </button>
                                        </div>
                                        <div class="col-auto d-flex justify-content-end">
                                            <button class="btn apply-jobs-btn see-profile">See Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="mt-5">
                        {{--@if($companies->count() > 0)--}}
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
                        {{--@endif--}}
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
            </section>
        </div>
    </div>

    <script>
        $('#OpenImgUpload').click(function () {
            $('#imgupload').trigger('click');
        });
    </script>
</body>
</html>