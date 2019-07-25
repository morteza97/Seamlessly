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
</head>
<body>

<style>
    ul {padding-right: 10px;margin-top: 20px;list-style-type: none;}
    ul li {margin-bottom: 5px}
    ul li a {display: block;padding: 5px 20px;}
    ul li.active a{color: #F70000}
    .service_list {
        padding-right: 0;
        list-style-type: none;
    }
    .service_list li:hover, .service_list li.active {
        -webkit-transition: all .1s;
        -o-transition: all .1s;
        transition: all .1s;
        border-right: 2px solid #0D2B67;
    }
    .service_list li a {border-bottom: 1px solid #dfe0e0;}
    .box {height: 170px;width: 300px;background: #d39e00;margin: auto;text-align: center;box-shadow: 0 0 7px -2px #0c426f;}
    .member_box {
        position: relative;
        top: 45%;
        font-size: 20px;
        font-weight: 700;
        color: #333;
    }
    .professor_list_title:after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 50%;
        margin: 10px auto;
        width: 5%;
        height: 2px;
        background: #ffdf81;
    }
    .header-title {font-weight: 400;}
</style>

<nav class="navbar navbar-expand-xl navbar-dark">
    <a class="navbar-brand" href="#">
        <img src="images/maaref_logo5.png">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContentXL" aria-controls="navbarSupportedContentXL" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContentXL">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">ورود به پنل کاربری</a>
            </li>
        </ul>

    </div>
</nav>

<!-- Tabs -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title header-title">لیست خدمات دانشگاه معارف اسلامی</h3>
            </div>
        </div>
    </div>
</section>
<!-- ./Tabs -->

<section id="tabs">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>صفحات مرتبط</h5>
                <ul class="service_list">
                    <li>
                        <a href="#">خدمات دانشجویی</a>
                    </li>
                    <li>
                        <a href="#">خدمات کارکنان</a>
                    </li>
                    <li>
                        <a href="#">خدمات دانش آموختگان</a>
                    </li>
                    <li class="active">
                        <a href="#">خدمات اعضای هیأت علمی</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>خدمات اعضای هیات علمی</h5>
                <ul>
                    <li>
                        <a href="#">پست الکترونیکی</a>
                    </li>
                    <li>
                        <a href="#">راهنمای خدمات فناوری اطلاعات</a>
                    </li>
                    <li>
                        <a href="#">صندوق رفاه اعضای هیأت علمی</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <a href="{{route('ProfessorsList')}}">
                    <div class="box">
                        <span class="member_box">سامانه اعضاء</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<footer>
    <div class="container">
        <p class="copyright">تمام حقوق مادی و معنوی این سایت برای دانشگاه معارف اسلامی محفوظ است</p>
    </div>
</footer>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

