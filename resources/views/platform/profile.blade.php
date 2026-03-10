<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>
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
    <link rel="stylesheet" href="/css/profile-sha8er.css">
</head>
<body>

<div id="Profile">
    <div class="container-fluid profile-cover">
        <div class="page-margin h-100">
            <div class="row d-flex align-items-end  h-100">
                <div class="col-3 d-flex justify-content-start">
                    <div class="profile-img">
                        <img class="w-100 h-100" src="/images/profile/mai.jpg">
                        <div class="profile-img-plus">
                            <img id="OpenImgUpload" class="w-100 h-100" src="/images/profile/plus-icon.png">
                            <input type="file" id="imgupload" style="display:none"/>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="profile_title">George Lian Touma</div>
                    <div class="profile_subtitle">
                        {{--<span>--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                        {{--fill="none">--}}
                        {{--<path d="M4.125 13.125L9.375 18.375L19.875 7.125" stroke="#F99D1C" stroke-width="1.5" stroke-linecap="round"--}}
                        {{--stroke-linejoin="round"/>--}}
                        {{--</svg>--}}
                        {{--</span>--}}
                        {{--Immediately available to work--}}
                        <img class="mb-1 me-2" src="/images/profile/work-icon.svg">
                        <span>Software Engineer | Web Designer</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid profile-content ">
        <div class="page-margin">
            {{--<div class="row mt-5">--}}
            {{--<div class="col d-flex justify-content-end">--}}
            {{--<button class="btn main-btn">Edit Profile</button>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="row mt-lg-5 mt-md-5 mt-3">
                <div class="col">
                    <div class="about">
                        Lorem ipsum dolor sit amet consectetur. Eu varius faucibusdonec adipiscing gravida. Dignissim
                        quam amet amet aliquam quisque bibendum laoreet netus facilisis.
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="links d-flex align-items-center">
                        <img src="/images/profile/linkedin-icon.svg"> <a href="">Farah Touma</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="links d-flex align-items-center">
                        <img src="/images/profile/facebook-icon.svg"> <a href="">Farah Touma</a>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="content col-lg-7 col-md-7 col-12 mb-3">
                    <div class="profile-card h-100">
                        <ul>
                            {{--<li>--}}
                            {{--<img src="/images/profile/work-icon.svg">--}}
                            {{--Software Engineer | Web Designer--}}
                            {{--</li>--}}
                            <li><img src="/images/profile/location-icon.svg"> Syria, Aleppo</li>
                            <li><img src="/images/profile/military-icon.svg"> Military service : done</li>
                            <li><img src="/images/profile/flag-icon.svg"> Arabic Syrian Nationality</li>
                            <li><img src="/images/profile/parish-icon.svg"> Syrian Orthodox</li>
                            <li><img src="/images/profile/date-icon.svg"> 23 / 5 / 2000</li>
                        </ul>
                    </div>
                </div>
                <div class="content col-lg-5 col-md-5 col-12 mb-3">
                    <div class="profile-card h-100">
                        <ul>
                            <li><img src="/images/profile/phone-icon.svg"> <a href="#">+963 994 712 263</a></li>
                            <li><img src="/images/profile/email-icon.svg"><a href="#">fara7touma@gmail.com</a></li>
                            <li><img src="/images/profile/location-icon.svg"> <a href="#">Al sheikh taha - above
                                    merjaneh
                                    phramacy</a></li>
                            <li>
                                <div class="row">
                                    <div class="col pe-0">
                                        <img src="/images/profile/lang-icon.svg">
                                    </div>
                                    <div class="col p-0">
                                        <ul>
                                            <li class="pb-1">Arabic</li>
                                            <li>English</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="education-section">
                <div class="row mt-4">
                    <div class="col-auto mt-1">
                        <div class="page-title">Education</div>
                        <img class="title-line" src="/images/profile/title-line.svg">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="content col">
                        <div class="profile-card h-100">
                            <div class="row pb-3">
                                <div class="col-auto">
                                    <img src="/images/profile/university-icon.svg">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-lg-11 col-md-11 col-12">
                                            <div class="title">Master degree in Faculty of Informatics Engineer / UOA
                                            </div>
                                            <div class="subtitle">Artificial Intelligence depart</div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-6">
                                                    <div class="details">5th year</div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-6 d-lg-block d-md-block d-none">
                                                    <div class="details">78%</div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-6 d-lg-none d-md-none d-block">
                                                    <div class="details text-end">78%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="location">Alep/Syria</div>
                                        <div class="description">Lorem ipsum dolor sit amet consectetur. Est at et
                                            hendrerit mattis id. Malesuada sit sem luctus et arcu nunc ultrices. Donec
                                            dignissim bibendum diam hac eget. Porttitor ipsum sed bibendum commodo eget
                                            augue amet massa nisi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-auto">
                                    <img src="/images/profile/university-icon.svg">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-lg-11 col-md-11 col-12">
                                            <div class="title">Master degree in Faculty of Informatics Engineer / UOA
                                            </div>
                                            <div class="subtitle">Artificial Intelligence depart</div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-6">
                                                    <div class="details">5th year</div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-6 d-lg-block d-md-block d-none">
                                                    <div class="details">78%</div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-6 d-lg-none d-md-none d-block">
                                                    <div class="details text-end">78%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="location">Alep/Syria</div>
                                        <div class="description">Lorem ipsum dolor sit amet consectetur. Est at et
                                            hendrerit mattis id. Malesuada sit sem luctus et arcu nunc ultrices. Donec
                                            dignissim bibendum diam hac eget. Porttitor ipsum sed bibendum commodo eget
                                            augue amet massa nisi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="work-section">
                <div class="row mt-5">
                    <div class="col-auto">
                        <div class="page-title">Work Experience</div>
                        <img class="title-line" src="/images/profile/title-line.svg">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="content col">
                        <div class="profile-card h-100">
                            <div class="row pb-3">
                                <div class="col-auto">
                                    <img src="/images/profile/work-icon.svg">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-12">
                                            <div class="title">Front-Web Developer</div>
                                            <div class="subtitle">Plus 99 at Syria - Aleppo</div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="details">2020 - Present</div>
                                            </div>
                                        </div>
                                        <div class="description">Lorem ipsum dolor sit amet consectetur. Est at et
                                            hendrerit mattis id. Malesuada sit sem luctus et arcu nunc ultrices. Donec
                                            dignissim bibendum diam hac eget. Porttitor ipsum sed bibendum commodo eget
                                            augue amet massa nisi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-auto">
                                    <img src="/images/profile/work-icon.svg">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-12">
                                            <div class="title">Front-Web Developer</div>
                                            <div class="subtitle">Plus 99 at Syria - Aleppo</div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="details">2020 - Present</div>
                                            </div>
                                        </div>
                                        <div class="description">Lorem ipsum dolor sit amet consectetur. Est at et
                                            hendrerit mattis id. Malesuada sit sem luctus et arcu nunc ultrices. Donec
                                            dignissim bibendum diam hac eget. Porttitor ipsum sed bibendum commodo eget
                                            augue amet massa nisi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="files-section">
                <div class="row mt-5">
                    <div class="col-auto">
                        <div class="page-title">Files</div>
                        <img class="title-line" src="/images/profile/title-line.svg">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="content col">
                        <div class="profile-card h-100">
                            <div class="row pb-1 d-flex align-items-baseline">
                                <div class="col-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6"
                                         fill="none">
                                        <circle cx="3" cy="3" r="3" fill="#F99D1C"/>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="title">CV</div>
                                </div>
                            </div>
                            <div class="row pb-1 d-flex align-items-baseline">
                                <div class="col-auto">
                                    <svg class="d-none" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                         viewBox="0 0 6 6" fill="none">
                                        <circle cx="3" cy="3" r="3" fill="#F99D1C"/>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <div class="file">
                                                <img class="show-file" src="/images/profile/eye-icon.svg" onclick="window.open('https://www.google.com/')">
                                                <span>farah.png</span>
                                                {{--@if({{...contains('png')}})--}}
                                                <img class="ext-file" src="/images/profile/png-icon.svg">
                                                {{--@endif--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 pb-1 d-flex align-items-baseline">
                                <div class="col-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6"
                                         fill="none">
                                        <circle cx="3" cy="3" r="3" fill="#F99D1C"/>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="title">Attachments</div>
                                </div>
                            </div>
                            <div class="row pb-1 d-flex align-items-baseline">
                                <div class="col-auto">
                                    <svg class="d-none" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                         viewBox="0 0 6 6" fill="none">
                                        <circle cx="3" cy="3" r="3" fill="#F99D1C"/>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <div class="file">
                                                <img class="show-file" src="/images/profile/eye-icon.svg" onclick="window.open('https://www.google.com/')">
                                                <span>farah.pdf</span>
                                                <img class="ext-file" src="/images/profile/pdf-icon.svg">
                                            </div>

                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <div class="file">
                                                <img class="show-file" src="/images/profile/eye-icon.svg" onclick="window.open('https://www.google.com/')">
                                                <span>farah.png</span>
                                                {{--@if({{...contains('png')}})--}}
                                                <img class="ext-file" src="/images/profile/png-icon.svg">
                                                    {{--@endif--}}
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <div class="file">
                                                <img class="show-file" src="/images/profile/eye-icon.svg" onclick="window.open('https://www.google.com/')">
                                                <span>farah.png</span>
                                                {{--@if({{...contains('png')}})--}}
                                                <img class="ext-file" src="/images/profile/png-icon.svg">
                                                {{--@endif--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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