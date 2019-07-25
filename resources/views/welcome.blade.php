<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <style>
        </style>
    </head>
    <body>
    <div>

    </div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    {{--@auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else--}}
                        <a href="{{ route('login') }}">Login</a>
                        <a class="nav-link" href="{{ route('alumni_index') }}">انجمن</a>
                        <a class="nav-link" href="{{ route('country.index') }}">کشور</a>
                        <a class="nav-link" href="{{ route('seminary_grade.index') }}">پایه تحصیلی حوزوی</a>
                        <a class="nav-link" href="{{ route('seminary.index') }}">حوزه</a>
                        <a class="nav-link" href="{{ route('seminary_academic_degree.index') }}">مقطع تحصیلی یا مدارج علمی حوزوی</a>
                        <a class="nav-link" href="{{ route('seminary_field_of_study.index') }}">رشته حوزوی</a>
                        <a class="nav-link" href="{{ route('training_center_type.index') }}">نوع مرکز آموزشی</a>
                        <a class="nav-link" href="{{ route('training_center') }}">مرکز آموزشی</a>
                        {{--<a class="nav-link" href="{{ route('college.index') }}">دانشکده</a>--}}
                        <a class="nav-link" href="{{ route('lesson.index') }}">دروس</a>
                        <a class="nav-link" href="{{ route('province.index') }}">استان</a>
                        <a class="nav-link" href="{{ route('city.index') }}">شهر</a>
                        <a class="nav-link" href="{{ route('grade.index') }}">مقطع تحصیلی</a>
                        <a class="nav-link" href="{{ route('field_of_study.index') }}">رشته</a>
                        <a class="nav-link" href="{{ route('orientation.index') }}">گرایش</a>
                        <a class="nav-link" href="{{ route('religion.index') }}">مذهب</a>
                        <a class="nav-link" href="{{ route('marital_status.index') }}">وضعیت تاهل</a>
                        <a class="nav-link" href="{{ route('public_conscription_status.index') }}">وضعیت نظام وظیفه عمومی</a>
                        <a class="nav-link" href="{{ route('advertising_record_place') }}">محل تبلیغ</a>
                        <a class="nav-link" href="{{ route('responsibility_type') }}">نوع مسئولیت</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    {{--@endauth--}}
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
