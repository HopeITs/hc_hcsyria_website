<style>
/*========================
====    FOOTER     =====
==========================*/
    #footer {
    background-color:#fff;
    padding:25px 0;
    color:#000;
    font-size:16px;
    position:relative;
    width: 100%;
    margin-top:1px;
    }

    #footer p {
    margin: 0
    }


    .socials{
        text-align: center;
    }

    .socials i {
        background-color: #CF142B;
        border-radius: 50%;
        color: white;
        display: inline-block;
        font-size: 18px;
        height: 28px;
        line-height:28px;
        margin-right: 5px;
        text-align: center;
        width: 30px;
        /*border-width:1px;*/
        /*border-color:#43484E;*/
        /*border-style: solid;*/
        opacity:1;
        -webkit-transition: all 0.7s ease-in-out;
        -moz-transition: all 0.7s ease-in-out;
        -o-transition: all 0.7s ease-in-out;
        transition: all 0.7s ease-in-out;
    }

    .socials a i:hover {
        opacity:1;
        /*color:#fff;*/
        /*border:0*/
    }

    .socials a .fa-facebook:hover {
        background:#7A797B;
        /*background: #3B5997;*/
    }

    .socials a .fa-linkedin:hover {
        /*background:#006DC0*/
        background:#7A797B;
    }

    .socials a .fa-youtube-play:hover {
        /*background:#006DC0*/
        background:#7A797B;
    }

    .socials a .fa-google-plus:hover {
        /*background:#D13D2F*/
        background:#7A797B;
    }

    .socials a .fa-flickr:hover {
        background:#7A797B
    }

    .socials a .fa-envelope:hover {
        background:#7A797B
    }

    .socials a .fa-phone:hover {
        background:#7A797B;
        /*background: #00b140;*/
    }
</style>

<footer id="footer">
    <div class="container">
        <div class="socials">
            <a href="mailto:info@hcsyria.org">
                <i class="fa fa-envelope"></i>
            </a>
            <a href="https://www.youtube.com/channel/UC777Xf3lHtQufwaYjgxsiRA/videos" target="_blank">
                <i class="fa fa-youtube-play"></i>
            </a>
            <a href="https://www.linkedin.com/company/christian-hope-center/?viewAsMember=true" target="_blank">
                <i class="fa fa-linkedin"></i>
            </a>
            <a href="tel:+963 99 33 10 227">
                <i class="fa fa-phone"></i>
            </a>
        </div>
        <div style="padding: 7px"></div>
        <div class="text-center">
            <p>@lang('main.footer')</p>
        </div>
    </div>
</footer>

