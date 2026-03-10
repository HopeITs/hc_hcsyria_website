<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129097809-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129097809-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta name="keywords" content="donate for hope center"/>
    <title>@lang('donate.title')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/donate.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/donate" />

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

@include('public.navbar')

<section style="padding-top: 120px">
    <div class="container">
        <div class="row" id="starting">
            <div class="col-sm-10">
                <p>@lang('donate.text1')</p>
                <p>@lang('donate.text2')</p>
                <p>@lang('donate.text3')</p>
                <p>@lang('donate.text4')</p>
            </div>
            <div id="logo" class="col-sm-2 text-center">
                <img src="/images/logos/caritas.svg" width="100px">
            </div>
        </div>
        <div style="background:#CF142B; padding:3px; color:white; font-size:14px; margin: 20px 0;"><b>@lang('donate.bankInfo')</b></div>
        <div id="bank-info">
            <div class="row card">
                <div class="col-sm-10">
                    <p><strong>@lang('donate.bankName')</strong> Bank Millennium S.A.
                        <button class="cpy-btn" data-clipboard-text="Bank Millennium S.A.">@lang('donate.copy')</button>
                    </p>
                </div>
                <div class="col-sm-2">
                    <button class="cpy-btn" data-clipboard-text="Bank Millennium S.A.">@lang('donate.copy')</button>
                </div>
                <hr>
                <div class="col-sm-10" style="border:none">
                    <p><strong>@lang('donate.bankAddress')</strong> al. Jerozolimskie 133, 02-304 Warsaw, Poland
                        <button class="cpy-btn" data-clipboard-text="al. Jerozolimskie 133, 02-304 Warsaw, Poland">@lang('donate.copy')</button>
                    </p>
                </div>
                <div class="col-sm-2" style="border: none">
                    <button class="cpy-btn" data-clipboard-text="al. Jerozolimskie 133, 02-304 Warsaw, Poland">@lang('donate.copy')</button>
                </div>
            </div>
            <div class="row card">
                <div class="col-sm-10">
                    <p><strong>S.W.I.F.T.</strong> BIGBPLPWXXX
                        <button class="cpy-btn" data-clipboard-text="BIGBPLPWXXX">@lang('donate.copy')</button>
                    </p>
                </div>
                <div class="col-sm-2">
                    <button class="cpy-btn" data-clipboard-text="BIGBPLPWXXX">@lang('donate.copy')</button>
                </div>
                <hr>
                <div class="col-sm-10">
                    <p><strong>EUR:</strong> PL 23 1160 2202 0000 0000 3436 4677
                        <button class="cpy-btn" data-clipboard-text="PL 23 1160 2202 0000 0000 3436 4677">@lang('donate.copy')</button>
                    </p>
                </div>
                <div class="col-sm-2">
                    <button class="cpy-btn" data-clipboard-text="PL 23 1160 2202 0000 0000 3436 4677">@lang('donate.copy')</button>
                </div>
                <hr>
                <div class="col-sm-10">
                    <p><strong>USD:</strong> PL 57 1160 2202 0000 0000 6663 1212
                        <button class="cpy-btn" data-clipboard-text="PL 57 1160 2202 0000 0000 6663 1212">@lang('donate.copy')</button>
                    </p>
                </div>
                <div class="col-sm-2">
                    <button class="cpy-btn" data-clipboard-text="PL 57 1160 2202 0000 0000 6663 1212">@lang('donate.copy')</button>
                </div>
                <hr>
                <div class="col-sm-10" style="border: none;">
                    <p><strong>GBP:</strong> PL 36 1160 2202 0000 0000 7232 7236
                        <button class="cpy-btn" data-clipboard-text="PL 36 1160 2202 0000 0000 7232 7236">@lang('donate.copy')</button>
                    </p>
                </div>
                <div class="col-sm-2" style="border: none;">
                    <button class="cpy-btn" data-clipboard-text="PL 36 1160 2202 0000 0000 7232 7236">@lang('donate.copy')</button>
                </div>
            </div>
            <div class="row card">
                <div class="col-sm-12">
                    <p><strong>@lang('donate.transferDesc')</strong></p>
                </div>
                <hr>
                <div class="col-sm-10" @if($mpCount == 0) style="border: none" @endif>
                    <p><strong>@lang('donate.transDesc1')</strong> "Hope Center"
                        <button class="cpy-btn" data-clipboard-text="Hope Center">@lang('donate.copy')</button>
                    </p>
                </div>
                <div class="col-sm-2" @if($mpCount == 0) style="border: none" @endif>
                    <button class="cpy-btn" data-clipboard-text="Hope Center">@lang('donate.copy')</button>
                </div>
                @if($mpCount == 1)
                    <hr>
                    <div class="col-sm-10 project-div">
                        <p><strong>@lang('donate.transDesc2')</strong><br>"Hope Center
                            - {{$microProject[0]->MPE_BeneficiaryName}}"
                            <button class="cpy-btn" data-clipboard-text="Hope Center - {{$microProject[0]->MPE_BeneficiaryName}}">
                                @lang('donate.copy')
                            </button>
                        </p>
                    </div>
                    <div class="col-sm-2 project-btn">
                        <button class="cpy-btn" data-clipboard-text="Hope Center - {{$microProject[0]->MPE_BeneficiaryName}}">
                            @lang('donate.copy')
                        </button>
                    </div>
                    <hr>
                    <div class="col-sm-10 project-div" style="border: none">
                        <p><strong>@lang('donate.transDesc3')</strong><br>"Hope Center
                            - {{$microProject[0]->lang->MPE_Name}}"
                            <button class="cpy-btn" data-clipboard-text="Hope Center - {{$microProject[0]->lang->MPE_Name}}">@lang('donate.copy')</button>
                        </p>
                    </div>
                    <div class="col-sm-2 project-btn" style="border: none">
                        <button class="cpy-btn" data-clipboard-text="Hope Center - {{$microProject[0]->lang->MPE_Name}}">@lang('donate.copy')</button>
                    </div>
                @endif
            </div>
            <button onclick="$('#print-form').printThis()" class="print" style="float: none;">Print the Information</button>
        </div>
        <div style="background:#CF142B; padding:3px; color:white; font-size:14px; margin: 20px 0;"><b>@lang('donate.clarification')</b>
        </div>
        <div style="padding-bottom: 20px">
            <p>@lang('donate.clarificationText')</p>
        </div>
    </div>
</section>


<div style="display: none">
    <form id="print-form">
        <p><strong>@lang('donate.bankName')</strong> Bank Millennium S.A.</p>
        <p><strong>@lang('donate.bankAddress')</strong> al. Jerozolimskie 133, 02-304 Warsaw, Poland</p>
        <p><strong>S.W.I.F.T.</strong> BIGBPLPWXXX</p>
        <p><strong>EUR:</strong> PL 23 1160 2202 0000 0000 3436 4677</p>
        <p><strong>USD:</strong> PL 57 1160 2202 0000 0000 6663 1212</p>
        <p><strong>GBP:</strong> PL 36 1160 2202 0000 0000 7232 7236</p>
        <p><strong>@lang('donate.transferDesc')</strong></p>
        <p><strong>@lang('donate.transDesc1')</strong> "Hope Center"</p>
        @if($mpCount == 1)
            <p><strong>@lang('donate.transDesc2')</strong><br><span style="white-space: nowrap;">"Hope Center
                    - {{$microProject[0]->MPE_BeneficiaryName}}"</span></p>
            <p><strong>@lang('donate.transDesc3')</strong><br><span
                        style="white-space: nowrap;">"Hope Center
                    - {{$microProject[0]->MPE_Name}}"</span></p>
        @endif
    </form>
</div>

@include('public.footer')

<script type="text/javascript" src="/js/clipboard.min.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
<script type="text/javascript" src="/js/printThis.js"></script>
<script>
    new ClipboardJS('.cpy-btn');
    $(function() {
        $('.cpy-btn').on("click",function () {
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
                showAnimation: function(d, c) { this.fadeIn(d, c); },
                css: {
                    fontSize: '1.1rem'
                }
            });
        })
    });
</script>
@stack('navbar-scripts')

</body>
</html>
