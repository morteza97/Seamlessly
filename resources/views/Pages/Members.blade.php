<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>استاتید هیات علمی</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        body {margin: 0;padding: 0;background: url('images/bg.jpg') no-repeat;}
        .navbar-expand-xl {background-color: transparent;}
        .navbar-dark .navbar-nav .nav-link {color: #0c426f;}
        .text {text-align: center;font-size:9pt; color: #783FA6;margin-top: 10px}
        .logo_title{font-family: IranNastaliq,IRANSans;margin-top: 20px;padding-top:5px;text-align: center;font-size: 35pt;background: -webkit-linear-gradient(#0c426f, #0062cc);-webkit-background-clip: text;-webkit-text-fill-color: transparent;}
        footer {background-color: #e9e9e9;border-top: 1px solid #bbbbbb;}
        .copyright {color: #0c426f;}
        .height100{height: 85vh;display:flex;align-items:center;}

        ul {padding-right: 5px;margin-top: 20px;list-style-type: none;}
        ul li {margin-bottom: 5px}
        ul li a {display: block;padding: 5px 10px;text-decoration:none; }
        ul li.active a{color: #F70000}
        .service_list {
            padding-right: 0;
            list-style-type: none;
            width: 260px;
            text-align: right;
            float: left;
        }
        .service_title{width: 260px;float: left;margin-top: 50px;}
        .service_list li:hover, .service_list li.active {
            -webkit-transition: all .1s;
            -o-transition: all .1s;
            transition: all .1s;
            border-right: 2px solid #0D2B67;
            padding-right: 10px;
        }
        .service_list li:hover a {text-decoration:none;}
        .service_list li a {border-bottom: 1px solid #dfe0e0;}
    </style>
</head>
<body>


<div class="container">
    <nav class="navbar navbar-expand-xl navbar-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContentXL">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">راهنما</a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="row height100">
        <div class="col-md-8 offset-md-2 text-center">
            <div class="row">
                <div class="col-md-6">
                    {{--<img src="images/logo-small.png" width="249" height="174">--}}
                    <img src="images/logo.png" width="150" height="150">
                    <p class="text">
                        دانشگاه معارف اسلامی
                        <br>
                        معاونت پژوهش
                        <br>
                        مرکز فناوری اطلاعات و ارتباطات
                    </p>
                    <h3 class="logo_title">سامانه جامع اعضاء</h3>

                </div>
                <div class="col-md-6">
                    <h5 class="service_title">سامانه های مرتبط</h5>
                    {{--<ul class="service_list">
                        <li>
                            <a href="#">سامانه خدمات دانشجویی</a>
                        </li>
                        <li>
                            <a href="#">سامانه خدمات کارمندان</a>
                        </li>
                        <li>
                            <a href="#">سامانه انجمن دانش آموختگان</a>
                        </li>
                        <li>
                            <a href="#">سامانه علم سنجی اعضای هیأت علمی</a>
                        </li>
                    </ul>--}}

                    <style>
                        #header .header-nav-main nav > ul > li:hover > a {
                            color: #adb3c2 !important;
                        }
                        #header .header-nav-main nav > ul > li:hover > a.dropdown-toggle:after {
                            border-color: #adb3c2 transparent transparent transparent !important;
                        }
                        #header .header-nav-main nav > ul > li a {
                            background: none !important;
                        }
                        #header .header-nav-main nav > ul > li a:focus, #header .header-nav-main nav > ul > li a:active {
                            color: #adb3c2 !important;
                        }
                        #header .header-nav-main nav > ul > li a.active {
                            background: transparent;
                            color: #adb3c2 !important;
                        }
                        #header .header-nav-main nav > ul > li a.active.dropdown-toggle:after {
                            border-color: #adb3c2 transparent transparent transparent !important;
                        }
                        #header .header-nav-main nav > ul > li ul.custom-dropdown-menu-style-1 {
                            background-color: #182027;
                            border-top: none !important;
                            -webkit-box-shadow: none !important;
                            box-shadow: none !important;
                        }
                        #header .header-nav-main nav > ul > li ul.custom-dropdown-menu-style-1 li:last-child > a {
                            border-bottom: none !important;
                        }
                        #header .header-nav-main nav > ul > li ul.custom-dropdown-menu-style-1 li > a {
                            border-bottom: none;
                            color: #777;
                        }
                        #header .header-nav-main nav > ul > li ul.custom-dropdown-menu-style-1 li > a:hover {
                            background: none !important;
                        }
                        #header .header-nav-main nav > ul > li ul.custom-dropdown-menu-style-1 li > a > i {
                            float: right;
                        }
                        #header .header-btn-collapse-nav {
                            border-radius: 50%;
                            height: 34px;
                            width: 34px;
                            padding: 0;
                        }
                        /* Header Nav Main */
                        @media (min-width: 992px) {
                            #header .header-nav-main nav {
                                display: -webkit-box !important;
                                display: -ms-flexbox !important;
                                display: flex !important;
                            }

                            #header .header-nav-main nav > ul > li {
                                margin-left: 2px;
                            }

                            #header .header-nav-main nav > ul > li > a {
                                display: -webkit-inline-box;
                                display: -ms-inline-flexbox;
                                display: inline-flex;
                                -webkit-box-align: center;
                                -ms-flex-align: center;
                                align-items: center;
                                white-space: normal;
                                border-radius: 4px;
                                color: #CCC;
                                font-size: 12px;
                                font-style: normal;
                                font-weight: 700;
                                padding: 0.5rem 0.9rem;
                                text-transform: uppercase;
                            }

                            #header .header-nav-main nav > ul > li > a:active {
                                background-color: transparent;
                                text-decoration: none;
                                color: #CCC;
                            }

                            #header .header-nav-main nav > ul > li > a.dropdown-toggle .fa-caret-down {
                                display: none;
                            }

                            #header .header-nav-main nav > ul > li > a.dropdown-toggle:after {
                                border-color: #CCC transparent transparent transparent;
                                border-width: .24rem;
                                margin-left: .255em;
                                margin-right: 0;
                            }

                            #header .header-nav-main nav > ul > li > a.active {
                                background: #CCC;
                                color: #FFF;
                            }

                            #header .header-nav-main nav > ul > li > a.active.dropdown-toggle:after {
                                border-color: #FFF transparent transparent transparent;
                            }

                            #header .header-nav-main nav > ul > li.open > a, #header .header-nav-main nav > ul > li:hover > a {
                                background: #CCC;
                                color: #FFF;
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu {
                                top: -10000px;
                                display: block;
                                opacity: 0;
                                left: auto;
                                border-radius: 0 4px 4px;
                                border: 0;
                                border-top: 3px solid #CCC;
                                -webkit-box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);
                                box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);
                                margin: 0;
                                min-width: 200px;
                                padding: 5px;
                                text-align: left;
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li a {
                                border-bottom: 1px solid #f4f4f4;
                                color: #777;
                                font-size: 0.8em;
                                font-weight: 400;
                                padding: 6px 20px 6px 8px;
                                position: relative;
                                text-transform: none;
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li a:hover, #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li a:focus, #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li a.active, #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li a:active {
                                background-color: #f8f9fa;
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li.dropdown-submenu {
                                position: relative;
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li.dropdown-submenu > a .fa-caret-down {
                                display: none;
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li.dropdown-submenu > a:after {
                                border-color: transparent transparent transparent #CCC;
                                border-style: solid;
                                border-width: 4px 0 4px 4px;
                                content: " ";
                                position: absolute;
                                top: 50%;
                                right: 10px;
                                -webkit-transform: translateY(-50%);
                                transform: translateY(-50%);
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li.dropdown-submenu > .dropdown-menu {
                                left: 100%;
                                display: block;
                                margin-top: -8px;
                                margin-left: -1px;
                                border-radius: 4px;
                                opacity: 0;
                                -webkit-transform: translate3d(0, 0, 0);
                                transform: translate3d(0, 0, 0);
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li.dropdown-submenu:hover > .dropdown-menu {
                                top: 0;
                                opacity: 1;
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li.dropdown-submenu.dropdown-reverse > a:after {
                                border-color: transparent #CCC transparent transparent;
                                border-width: 4px 4px 4px 4px;
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li.dropdown-submenu.dropdown-reverse > .dropdown-menu {
                                left: auto;
                                right: 100%;
                                -webkit-transform: translate3d(0, 0, 0);
                                transform: translate3d(0, 0, 0);
                            }

                            #header .header-nav-main nav > ul > li.dropdown .dropdown-menu li:last-child a {
                                border-bottom: 0;
                            }

                            #header .header-nav-main nav > ul > li.dropdown.open > a, #header .header-nav-main nav > ul > li.dropdown:hover > a {
                                border-radius: 4px 4px 0 0;
                                position: relative;
                            }

                            #header .header-nav-main nav > ul > li.dropdown.open > a:before, #header .header-nav-main nav > ul > li.dropdown:hover > a:before {
                                content: '';
                                display: block;
                                position: absolute;
                                left: 0;
                                right: 0;
                                bottom: -3px;
                                border-bottom: 5px solid #CCC;
                            }

                            #header .header-nav-main nav > ul > li.dropdown.open > .dropdown-menu, #header .header-nav-main nav > ul > li.dropdown:hover > .dropdown-menu {
                                top: auto;
                                display: block;
                                opacity: 1;
                            }

                            #header .header-nav-main nav > ul > li.dropdown-mega {
                                position: static;
                            }

                            #header .header-nav-main nav > ul > li.dropdown-mega > .dropdown-menu {
                                border-radius: 4px;
                                left: 15px;
                                right: 15px;
                                width: auto;
                            }

                            #header .header-nav-main nav > ul > li.dropdown-mega .dropdown-mega-content {
                                padding: 1.6rem;
                            }

                            #header .header-nav-main nav > ul > li.dropdown-mega .dropdown-mega-sub-title {
                                color: #333333;
                                display: block;
                                font-size: 0.9em;
                                font-weight: 600;
                                margin-top: 20px;
                                padding-bottom: 10px;
                                text-transform: uppercase;
                            }

                            #header .header-nav-main nav > ul > li.dropdown-mega .dropdown-mega-sub-title:first-child {
                                margin-top: 0;
                            }

                            #header .header-nav-main nav > ul > li.dropdown-mega .dropdown-mega-sub-nav {
                                list-style: none;
                                padding: 0;
                                margin: 0;
                            }

                            #header .header-nav-main nav > ul > li.dropdown-mega .dropdown-mega-sub-nav > li > a {
                                border: 0 none;
                                border-radius: 4px;
                                color: #777;
                                display: block;
                                font-size: 0.8em;
                                font-weight: normal;
                                margin: 0 0 3px -8px;
                                padding: 3px 8px;
                                text-shadow: none;
                                text-transform: none;
                                text-decoration: none;
                            }

                            #header .header-nav-main nav > ul > li.dropdown-mega .dropdown-mega-sub-nav > li:hover > a {
                                background: #f4f4f4;
                            }

                            #header .header-nav-main nav > ul > li.dropdown-mega.dropdown-mega-shop > .dropdown-item {
                                padding: 0.5rem 0.8rem;
                            }

                            #header .header-nav-main.header-nav-main-no-arrows nav > ul > li a.dropdown-toggle {
                                padding-left: 16px !important;
                                padding-right: 16px !important;
                            }

                            #header .header-nav-main.header-nav-main-no-arrows nav > ul > li a.dropdown-toggle:after {
                                display: none;
                            }

                            #header .header-nav-main.header-nav-main-square nav > ul > li > a {
                                border-radius: 0 !important;
                            }

                            #header .header-nav-main.header-nav-main-square nav > ul > li.dropdown .dropdown-menu {
                                border-radius: 0;
                            }

                            #header .header-nav-main.header-nav-main-square nav > ul > li.dropdown .dropdown-menu li.dropdown-submenu > .dropdown-menu {
                                border-radius: 0;
                            }

                            #header .header-nav-main.header-nav-main-square nav > ul > li.dropdown-mega > .dropdown-menu {
                                border-radius: 0;
                            }

                            #header .header-nav-main.header-nav-main-square nav > ul > li.dropdown-mega .dropdown-mega-sub-nav > li > a {
                                border-radius: 0;
                            }

                            #header .header-nav-main.header-nav-main-dark nav > ul > li > a {
                                color: #444;
                            }

                            #header .header-nav-main a > .thumb-info-preview {
                                position: absolute;
                                display: block;
                                left: 100%;
                                opacity: 0;
                                border: 0;
                                padding-left: 10px;
                                background: transparent;
                                overflow: visible;
                                margin-top: 15px;
                                top: -10000px;
                                -webkit-transition: opacity .2s ease-out, -webkit-transform .2s ease-out;
                                transition: opacity .2s ease-out, -webkit-transform .2s ease-out;
                                transition: transform .2s ease-out, opacity .2s ease-out;
                                transition: transform .2s ease-out, opacity .2s ease-out, -webkit-transform .2s ease-out;
                                -webkit-transform: translate3d(-20px, 0, 0);
                                transform: translate3d(-20px, 0, 0);
                            }

                            #header .header-nav-main a > .thumb-info-preview .thumb-info-wrapper {
                                background: #FFF;
                                display: block;
                                border-radius: 4px;
                                border: 0;
                                -webkit-box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);
                                box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);
                                margin: 0;
                                padding: 4px;
                                text-align: left;
                                width: 190px;
                            }

                            #header .header-nav-main a > .thumb-info-preview .thumb-info-image {
                                -webkit-transition: all 6s linear 0s;
                                transition: all 6s linear 0s;
                                width: 182px;
                                height: 136px;
                                min-height: 0;
                            }

                            #header .header-nav-main a:hover > .thumb-info-preview {
                                -webkit-transform: translate3d(0, 0, 0);
                                transform: translate3d(0, 0, 0);
                                top: 0;
                                opacity: 1;
                                margin-top: -5px;
                            }

                            #header .header-nav-main .dropdown-reverse a > .thumb-info-preview {
                                -webkit-transform: translate3d(20px, 0, 0);
                                transform: translate3d(20px, 0, 0);
                                right: 100%;
                                left: auto;
                                padding-left: 0;
                                margin-right: 10px;
                            }

                            #header .header-nav-main .dropdown-reverse a:hover > .thumb-info-preview {
                                -webkit-transform: translate3d(0, 0, 0);
                                transform: translate3d(0, 0, 0);
                            }

                            #header .header-nav {
                                display: -webkit-box;
                                display: -ms-flexbox;
                                display: flex;
                                -webkit-box-align: center;
                                -ms-flex-align: center;
                                align-items: center;
                                -webkit-box-flex: 1;
                                -ms-flex-positive: 1;
                                flex-grow: 1;
                                -webkit-box-pack: end;
                                -ms-flex-pack: end;
                                justify-content: flex-end;
                                -ms-flex-item-align: stretch;
                                align-self: stretch;
                            }

                            #header .header-nav.header-nav-stripe {
                                padding: 0;
                            }

                            #header .header-nav.header-nav-stripe .header-nav-main {
                                -ms-flex-item-align: stretch;
                                align-self: stretch;
                                margin-top: -1px;
                                min-height: 0;
                            }

                            #header .header-nav.header-nav-stripe nav {
                                display: -webkit-box;
                                display: -ms-flexbox;
                                display: flex;
                            }

                            #header .header-nav.header-nav-stripe nav > ul > li {
                                display: -webkit-inline-box;
                                display: -ms-inline-flexbox;
                                display: inline-flex;
                                -ms-flex-item-align: stretch;
                                align-self: stretch;
                            }

                            #header .header-nav.header-nav-stripe nav > ul > li > a {
                                background: transparent;
                                padding: 0 .9rem;
                                margin: 1px 0 0;
                                height: 100%;
                                color: #444;
                                min-height: 90px;
                            }

                            #header .header-nav.header-nav-stripe nav > ul > li > a.dropdown-toggle:after {
                                border-color: #444 transparent transparent transparent;
                            }

                            #header .header-nav.header-nav-stripe nav > ul > li > a.active {
                                color: #CCC;
                                background: transparent;
                            }

                            #header .header-nav.header-nav-stripe nav > ul > li > a.active.dropdown-toggle:after {
                                border-color: #CCC transparent transparent transparent;
                            }

                            #header .header-nav.header-nav-stripe nav > ul > li:hover > a, #header .header-nav.header-nav-stripe nav > ul > li:hover > a.active, #header .header-nav.header-nav-stripe nav > ul > li.open > a, #header .header-nav.header-nav-stripe nav > ul > li.open > a.active {
                                color: #FFF;
                                padding-bottom: 0;
                            }

                            #header .header-nav.header-nav-stripe nav > ul > li:hover > a.dropdown-toggle:after, #header .header-nav.header-nav-stripe nav > ul > li:hover > a.active.dropdown-toggle:after, #header .header-nav.header-nav-stripe nav > ul > li.open > a.dropdown-toggle:after, #header .header-nav.header-nav-stripe nav > ul > li.open > a.active.dropdown-toggle:after {
                                border-color: #FFF transparent transparent transparent;
                            }

                            #header .header-nav.header-nav-stripe nav > ul > li.dropdown.open > a:before, #header .header-nav.header-nav-stripe nav > ul > li.dropdown:hover > a:before {
                                content: none;
                            }

                            #header .header-nav.header-nav-stripe nav > ul > li.dropdown.open > .dropdown-menu, #header .header-nav.header-nav-stripe nav > ul > li.dropdown:hover > .dropdown-menu {
                                top: 100%;
                                left: 0;
                                margin-top: 1px;
                            }

                            #header .header-nav.header-nav-stripe.header-nav-main-dark nav > ul > li:hover > a {
                                color: #FFF !important;
                            }

                            #header .header-nav.header-nav-top-line {
                                padding: 0;
                            }

                            #header .header-nav.header-nav-top-line .header-nav-main {
                                -ms-flex-item-align: stretch;
                                align-self: stretch;
                                min-height: 0;
                                margin-top: 0;
                            }

                            #header .header-nav.header-nav-top-line nav > ul > li > a, #header .header-nav.header-nav-top-line nav > ul > li:hover > a {
                                position: relative;
                                background: transparent !important;
                                color: #444;
                                padding: 0 .9rem;
                                margin: 1px 0 0;
                                min-height: 70px;
                                height: 100%;
                            }

                            #header .header-nav.header-nav-top-line nav > ul > li > a:before, #header .header-nav.header-nav-top-line nav > ul > li:hover > a:before {
                                content: "";
                                position: absolute;
                                background: #CCC;
                                width: 100%;
                                height: 3px;
                                top: -2px;
                                left: 0;
                                opacity: 0;
                            }

                            #header .header-nav.header-nav-top-line nav > ul > li:hover > a:before, #header .header-nav.header-nav-top-line nav > ul > li.open > a:before {
                                opacity: 1;
                            }

                            #header .header-nav.header-nav-top-line nav > ul > li > a.dropdown-toggle:after {
                                border-color: #444 transparent transparent transparent;
                            }

                            #header .header-nav.header-nav-top-line nav > ul > li > a.active {
                                color: #CCC;
                                background: transparent;
                            }

                            #header .header-nav.header-nav-top-line nav > ul > li > a.active:before {
                                opacity: 1;
                            }

                            #header .header-nav.header-nav-top-line nav > ul > li > a.active.dropdown-toggle:after {
                                border-color: #CCC transparent transparent transparent;
                            }

                            #header .header-nav.header-nav-top-line nav > ul > li.dropdown > a:before {
                                border-bottom: 0;
                            }

                            #header .header-nav.header-nav-top-line nav > ul > li.dropdown.open > .dropdown-menu, #header .header-nav.header-nav-top-line nav > ul > li.dropdown:hover > .dropdown-menu {
                                margin-top: 0;
                            }

                            #header .header-nav.header-nav-dark-dropdown {
                                padding: 0;
                            }

                            #header .header-nav.header-nav-dark-dropdown .header-nav-main {
                                -ms-flex-item-align: stretch;
                                align-self: stretch;
                                min-height: 0;
                                margin-top: 0;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li > a, #header .header-nav.header-nav-dark-dropdown nav > ul > li:hover > a {
                                background: transparent !important;
                                color: #444;
                                margin: 1px 0 0;
                                min-height: 70px;
                                height: 100%;
                                padding: 0 .9rem;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li > a.dropdown-toggle:after {
                                border-color: #444 transparent transparent transparent;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li > a.active {
                                color: #CCC;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li > a.active.dropdown-toggle:after {
                                color: #CCC;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li.dropdown > a:before {
                                border-bottom: 0;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li.dropdown li a {
                                border-bottom-color: #2a2a2a;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li.dropdown .dropdown-menu {
                                background: #1e1e1e;
                                margin-top: 0;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li.dropdown .dropdown-menu > li > a {
                                color: #969696;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li.dropdown .dropdown-menu > li > a:hover, #header .header-nav.header-nav-dark-dropdown nav > ul > li.dropdown .dropdown-menu > li > a:focus {
                                background: #282828;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li.dropdown.dropdown-mega .dropdown-mega-sub-title {
                                color: #ababab;
                            }

                            #header .header-nav.header-nav-dark-dropdown nav > ul > li.dropdown.dropdown-mega .dropdown-mega-sub-nav > li:hover > a {
                                background: #282828;
                            }

                            #header .header-nav-main {
                                display: -webkit-box !important;
                                display: -ms-flexbox !important;
                                display: flex !important;
                                height: auto !important;
                            }

                            #header .header-nav-bar {
                                background: #F4F4F4;
                                z-index: 1;
                            }
                        }
                    </style>

                    <nav class="collapse">
                        <ul class="nav nav-pills" id="mainNav">
                            <li>
                                <a class="nav-link active" href="demo-photography-3.html">
                                    Home
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle">
                                    About
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="back-button d-none d-lg-block">
                                        <a class="dropdown-item">
                                            Back
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-about-me.html">
                                            About Me
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-about-us.html">
                                            About Us
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle">
                                    Portfolio
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="back-button d-none d-lg-block">
                                        <a class="dropdown-item">
                                            Back
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-stripes.html">
                                            Stripes
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-vertical.html">
                                            Vertical
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-parallax.html">
                                            Parallax
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-horizontal-scroll.html">
                                            Horizontal Scroll
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-full-width-grid.html">
                                            Full Width Grid
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-full-width-no-margins.html">
                                            Full Width No Margins
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-boxed-grid.html">
                                            Boxed Grid
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-infinite-scroll.html">
                                            Infinite Scroll
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-ajax-on-page.html">
                                            Ajax On Page
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-full-screen.html">
                                            Full Screen
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-portfolio-ken-burns.html">
                                            Ken Burns
                                        </a>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item" href="#">
                                            Portfolio Detail
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="back-button d-none d-lg-block">
                                                <a class="dropdown-item">
                                                    Back
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="demo-photography-3-portfolio-detail-extended.html">
                                                    Extended
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="demo-photography-3-portfolio-detail-slider-with-thumbs.html">
                                                    Slider with Thumbs
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-link" href="demo-photography-3-blog.html">
                                    Blog
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle">
                                    Contact
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="back-button d-none d-lg-block">
                                        <a class="dropdown-item">
                                            Back
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-contact-me.html">
                                            Contact Me
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="demo-photography-3-contact-us.html">
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div>


<footer>
    <div class="container">
        <p class="copyright">تمام حقوق مادی و معنوی این سایت برای دانشگاه معارف اسلامی محفوظ است</p>
    </div>
</footer>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {

        $mainNav = $('#mainNav');
        $mainNavItem = $('#mainNav li');

        $mainNavItem.on('click', function(e){

            var currentMenuItem = $(this),
                currentMenu 	= $(this).parent(),
                nextMenu        = $(this).find('ul').first(),
                isSubMenu       = currentMenuItem.hasClass('dropdown') || currentMenuItem.hasClass('dropdown-submenu'),
                isBack          = currentMenuItem.hasClass('back-button');

            if( isSubMenu ) {
                currentMenu.addClass('next-menu');
                nextMenu.addClass('visible');
            }

            if( isBack ) {
                currentMenu.parent().parent().removeClass('next-menu');
                currentMenu.removeClass('visible');
            }

            e.stopPropagation();
        });

    });
</script>

</body>
</html>

