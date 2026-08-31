<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Admin | Create Member</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/micro_page_new.css" rel="stylesheet">
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>

    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{--@stack('navbar_styles')--}}
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

@stack('navbar_body')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-md-11 col-sm-11 col-11">
            <div id="projects">
                <div class="row">
                    <div class="col">
                        @include('new.admin.messages')
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="title">Create Team Member</h3>
                        <form action="{{ route('team.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Belong To <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100 flex-wrap" data-toggle="buttons">
                                        <input name="belong_to" id="hope" type="radio" value="hope" class="btn-check">
                                        <label class="btn btn-outline-primary" for="hope">Hope Aleppo</label>

                                        <input name="belong_to" id="hope_h" type="radio" value="hope_h"
                                               class="btn-check">
                                        <label class="btn btn-outline-primary" for="hope_h">Hope Homs</label>

                                        <input name="belong_to" id="hope_d" type="radio" value="hope_d"
                                               class="btn-check">
                                        <label class="btn btn-outline-primary" for="hope_d">Hope Damascus</label>
                                        <input name="belong_to" id="hope_l" type="radio" value="hope_l"
                                               class="btn-check">
                                        <label class="btn btn-outline-primary" for="hope_l">Hope Latakia</label>

                                        <input name="belong_to" id="study" type="radio" value="study" class="btn-check">
                                        <label class="btn btn-outline-primary" for="study">Study Zone</label>

                                        <input name="belong_to" id="disc" type="radio" value="disc" class="btn-check">
                                        <label class="btn btn-outline-primary" for="disc">DISC</label>

                                        <input name="belong_to" id="children" type="radio" value="children"
                                               class="btn-check">
                                        <label class="btn btn-outline-primary" for="children">Children Uni</label>
                                        <input name="belong_to" id="leap" type="radio" value="leap"
                                               class="btn-check">
                                        <label class="btn btn-outline-primary" for="leap">LEAP</label>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label for="first_name">First Name</label> <span class="red-color">*</span>
                                    <input type="text"
                                           name="first_name"
                                           id="first_name"
                                           class="form-control"
                                           placeholder="First Name"
                                           required>
                                </div>

                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label for="last_name">Last Name</label> <span class="red-color">*</span>
                                    <input type="text"
                                           name="last_name"
                                           id="last_name"
                                           class="form-control"
                                           placeholder="Last Name"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-3">

                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label for="image_path">Image</label>
                                    <span class="red-color">*</span>
                                    <span><small>(must be 300x300 and maximum: 50KB-100KB)</small></span>
                                    <br>
                                    <i style="color: #777;">(Choosing an image will erase the current one)</i>

                                    <input class="form-control"
                                           type="file"
                                           accept="image/jpeg"
                                           name="image_path"
                                           id="image_path">
                                </div>

                                <div class="form-group col-lg-4 col-md-4 col-12 text-start">
                                    <img src="" style="height: 85px;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="position">Position</label> <span class="red-color">*</span>
                                    <textarea name="position"
                                              id="position"
                                              class="form-control"
                                              rows="2"
                                              placeholder="Position"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="email">Email</label> <span class="red-color">*</span>
                                    <input type="text"
                                           name="email"
                                           id="email"
                                           class="form-control"
                                           placeholder="Email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <label for="facebook_link">Facebook Link</label>
                                    <input type="text"
                                           name="facebook_link"
                                           id="facebook_link"
                                           class="form-control"
                                           placeholder="facebook link">
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <label for="linkedin_link">Linkedin Link</label>
                                    <input type="text"
                                           name="linkedin_link"
                                           id="linkedin_link"
                                           class="form-control"
                                           placeholder="linkedin link">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <label for="phone">Phone</label> <span class="red-color">*</span>
                                    <input type="text"
                                           name="phone"
                                           id="phone"
                                           class="form-control"
                                           placeholder="+963 ### ### ###">
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <label for="rank">Rank</label> <span class="red-color">*</span>
                                    <input type="number"
                                           name="rank"
                                           id="rank"
                                           class="form-control"
                                           placeholder="rank"
                                           min="1"
                                           max="100"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="inactive">Date of resignation</label>
                                    <input type="text"
                                           name="inactive"
                                           id="inactive"
                                           class="form-control"
                                           placeholder="00/00/0000">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end" style="margin-top: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i
                                            class="fa fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" class="btn btn-info" style="margin-left: 15px;"><i
                                            class="fa fa fa-external-link"></i> Create
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stack('navbar_scripts')

<script type="text/javascript" src="/js/selectize.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
@include('new.admin.scripts.popup-messages')
</body>
</html>
