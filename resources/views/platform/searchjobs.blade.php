<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;700&family=Lato:wght@900&display=swap"
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

<div id="SearchJobs">
    <div class="container-fluid jobs-cover">
        <div class="page-margin">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6 col-md-6 col-12 position-relative">
                    <div class="jobs_title">The best Hiring website
                        SHAGHER!
                    </div>
                    <img class="title-line" src="/images/profile/title-line.svg">
                    <div class="jobs_subtitle">
                        Lorem ipsum dolor sit amet consectetur. Eu varius faucibus donec adipiscing gravida.
                        <br>
                        Dignissim quam amet amet aliquam quisque bibendum laoreet netus facilisis.
                    </div>
                    <div class="find-job">
                        <form action="" id="searchForm" method="get">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-6 col-md-6 col-10 d-flex align-items-center">
                                    <img class="ms-4" src="/images/profile/work-icon.svg">
                                    <input type="text" class="ps-4" name="keywords" id="search-keywords"
                                           placeholder="Search your keywords" autocomplete="off">
                                    <div id="jobsSearchResults" class="position-absolute w100 job-search"></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-2">
                                    <button class="btn find-jobs-btn" type="submit">
                                        <img src="/images/jobs/search-icon.svg">
                                        <span class="ps-3"> Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12 d-flex justify-content-end">
                    <div class="cover-img">
                        <img class="w-100 h-100" src="/images/jobs/cover-img.png">
                        <svg class="image-frame" width="475" height="475" viewBox="0 0 475 475" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect x="475" y="88.7129" width="474.999" height="14.6952" rx="2"
                                  transform="rotate(180 475 88.7129)" fill="url(#paint0_linear_0_1)"/>
                            <rect x="475" y="88.7129" width="474.999" height="14.6952" rx="2"
                                  transform="rotate(180 475 88.7129)" fill="url(#paint1_linear_0_1)"/>
                            <rect x="392.325" width="475" height="18.038" rx="2" transform="rotate(90 392.325 0)"
                                  fill="url(#paint2_linear_0_1)"/>
                            <rect x="392.325" width="475" height="18.038" rx="2" transform="rotate(90 392.325 0)"
                                  fill="url(#paint3_linear_0_1)"/>
                            <defs>
                                <linearGradient id="paint0_linear_0_1" x1="649.166" y1="96.0605" x2="979.568"
                                                y2="96.0605" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.489583" stop-color="#F99D1C"/>
                                    <stop offset="1" stop-color="#F99D1C" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_0_1" x1="181.485" y1="103.759" x2="627.081"
                                                y2="106.84" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#F99D1C"/>
                                    <stop offset="1" stop-color="#F99D1C" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_0_1" x1="566.492" y1="9.01899" x2="896.893"
                                                y2="9.01902" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.489583" stop-color="#F99D1C"/>
                                    <stop offset="1" stop-color="#F99D1C" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint3_linear_0_1" x1="392.325" y1="18.038" x2="629.825" y2="18.038"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#F99D1C"/>
                                    <stop offset="1" stop-color="#F99D1C" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                        </svg>


                        {{--<img class="top-cross position-absolute top-0" src="/images/jobs/top-cross.png">--}}
                        {{--<img class="right-cross position-absolute bottom-0" src="/images/jobs/right-cross.png">--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid latest-jobs">
        <div class="page-margin">
            <div class="row mt-5">
                <div class="col-auto mt-1 mb-4 position-relative">
                    <div class="page-title">Latest Jobs</div>
                    <img class="title-line" src="/images/profile/title-line.svg">
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn show-all-btn" type="submit">
                        Show All
                    </button>
                </div>
            </div>
            <div class="jobs-container">
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
            </div>
            <nav class="mt-5 mb-5">
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