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
    .professor_list_title:after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 35%;
        margin: 16px;
        width: 5%;
        height: 2px;
        background: #ffdf81;
    }
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

    <section id="tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="header-title">پروفایل اساتید هیأت علمی</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabs -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-right professor_list_title">لیست اساتید هیأت علمی</h3>
                </div>
            </div>
            <div class="row">
                @foreach($users as $user)

                    <div class="col-lg-4 col-md-6">
                        <a href="ProfessorResume/{{$user->id}}">
                            <div class="row professor_div">
                                <div class="col-lg-5 col-5 text-center">
                                    <img src="/images/UsersPic/{{$user->pic}}"
                                         class="professor_pic img-responsive">
                                </div>
                                <div class="col-lg-7 col-7" style="padding: 0">
                                    <label class="professor_name"> {{$user->FirstName . " ". $user->LastName}} </label>

                                    <label class="professor_email">  {{$user->email}} </label>
                                    <label> <strong>گروه آموزشی: </strong> {{$user->professor->getGroup($user->professor->group_id)->title}} </label>
                                    <label> {{$user->professor->getLevel($user->professor->level_id)}} </label>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ./Tabs -->

    <footer>
        <div class="container">
            <p class="copyright">تمام حقوق مادی و معنوی این سایت برای دانشگاه معارف اسلامی محفوظ است</p>
        </div>
    </footer>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
