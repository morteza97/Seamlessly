<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap-rtl.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/fontawesome.css" rel="stylesheet">
    <title>نمایش رزومه</title>
</head>
<body>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="/images/maaref_logo5.png">
                </div>
                <div class="col-md-6">
                    <h2 class="header-title">سامانه یکپارچه اعضاء دانشگاه معارف اسلامی</h2>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-5">
                    <img src="/images/UsersPic/{{$user->pic}}" class="profile-pic">
                </div>
                <div class="col-lg-6 col-md-5 col-7">
                    <label class="form-inline margin-top-20 professor_name bottom_border_yellow"> {{$user->FirstName . " " . $user->LastName }} </label>

                    <label class="form-inline margin-top-15"><strong> گروه آموزشی:&ensp;</strong><a href="{{$group_url}}" target="_blank"> {{$group_title}} </a></label>
                    <label> <strong>مرتبه علمی: </strong> {{$level}} </label>
                    <label><strong> پست الکترونیکی: </strong> {{$user->email}}</label>
                    <div class="row margin-top-10">
                        <label class="col-md-9 col-6"><strong>دانلود فایل رزومه: </strong> <a href="{{$user->professor->resume_file}}">دریافت</a></label>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12 align-middle divider-inside-right">
                    <div class="row margin-top-50">
                        <label class="col-md-9 col-6"><strong>فعالیت های آموزشی: </strong></label>
                        <label class="col-md-3 col-6 resume_count">{{$resume_count1}}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-9 col-6"><strong>فعالیت های پژوهشی: </strong></label>
                        <label class="col-md-3 col-6 resume_count">{{$resume_count2}}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-9 col-6"><strong>فعالیت های فرهنگی: </strong></label>
                        <label class="col-md-3 col-6 resume_count">{{$resume_count3}}</label>
                    </div>
                    <div class="row">
                        <label class="col-md-9 col-6"><strong>فعالیت های اجرایی: </strong></label>
                        <label class="col-md-3 col-6 resume_count">{{$resume_count4}}</label>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- Tabs -->
    <section id="tabs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="true">نمای کلی</a>
                            <a class="nav-item nav-link " id="nav-education-tab" data-toggle="tab" href="#nav-education" role="tab" aria-controls="nav-education" aria-selected="true">فعالیت های آموزشی</a>
                            <a class="nav-item nav-link" id="nav-research-tab" data-toggle="tab" href="#nav-research" role="tab" aria-controls="nav-research" aria-selected="false">فعالیت های پژوهشی</a>
                            <a class="nav-item nav-link" id="nav-cultural-tab" data-toggle="tab" href="#nav-cultural" role="tab" aria-controls="nav-cultural" aria-selected="false">فعالیت های فرهنگی</a>
                            <a class="nav-item nav-link" id="nav-executive-tab" data-toggle="tab" href="#nav-executive" role="tab" aria-controls="nav-executive" aria-selected="false">فعالیت های اجرایی</a>
                            <a class="nav-item nav-link" id="nav-course-tab" data-toggle="tab" href="#nav-course" role="tab" aria-controls="nav-course" aria-selected="false">دروس ارائه شده</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <h3 class="margin-top-30 margin-bottom-20"><strong>تحصیلات / تحصیلات تکمیلی</strong></h3>
                            <div>
                                @foreach($education_history as $eh)

                                    <div class="margin-top-10">
                                        <i class="fal fa-dot-circle peh_icon"></i>
                                        {{$eh->title}}
                                        @if($eh->detail)
                                            <br>
                                        <small class="peh_detail">{{ $eh->detail }}</small>
                                        @endif

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-education" role="tabpanel" aria-labelledby="nav-education-tab">

                            @php ($i = "")

                            @foreach($resume1 as $resume)

                                <div class="resume_part">

                                    @if($i != $resume->year)
                                        @php ($i = $resume->year)
                                        <label class="form-inline resume_year">{{$resume->year}}</label>
                                    @endif

                                    <h3 class="form-inline resume_title">{{$resume->title}}</h3>
                                    <span class="form-inline resume_source"><small>{{$resume->resource}}</small></span>

                                </div>

                            @endforeach


                        </div>
                        <div class="tab-pane fade" id="nav-research" role="tabpanel" aria-labelledby="nav-research-tab">

                            @php ($i = "")

                            @foreach($resume2 as $resume)

                                <div class="resume_part">

                                    @if($i != $resume->year)
                                        @php ($i = $resume->year)
                                        <label class="form-inline resume_year">{{$resume->year}}</label>
                                    @endif

                                    <h3 class="form-inline resume_title">{{$resume->title}}</h3>
                                    <span class="form-inline resume_source"><small>{{$resume->resource}}</small></span>

                                </div>

                            @endforeach


                        </div>
                        <div class="tab-pane fade" id="nav-cultural" role="tabpanel" aria-labelledby="nav-cultural-tab">

                            @php ($i = "")

                            @foreach($resume3 as $resume)

                                <div class="resume_part">

                                    @if($i != $resume->year)
                                        @php ($i = $resume->year)
                                        <label class="form-inline resume_year">{{$resume->year}}</label>
                                    @endif

                                    <h3 class="form-inline resume_title">{{$resume->title}}</h3>
                                    <span class="form-inline resume_source"><small>{{$resume->resource}}</small></span>

                                </div>

                            @endforeach


                        </div>
                        <div class="tab-pane fade" id="nav-executive" role="tabpanel" aria-labelledby="nav-executive-tab">

                            @php ($i = "")

                            @foreach($resume4 as $resume)

                                <div class="resume_part">

                                    @if($i != $resume->year)
                                        @php ($i = $resume->year)
                                        <label class="form-inline resume_year">{{$resume->year}}</label>
                                    @endif

                                    <h3 class="form-inline resume_title">{{$resume->title}}</h3>
                                    <span class="form-inline resume_source"><small>{{$resume->resource}}</small></span>

                                </div>

                            @endforeach

                        </div>

                        <div class="tab-pane fade" id="nav-course" role="tabpanel" aria-labelledby="nav-course-tab">
                            <h6 class="margin-top-30 margin-bottom-20">
                                <strong>
                                    <span>دروس ارائه شده در </span>
                                    {{$term->Semester . " " . $term->AcademicYear}}
                                </strong>
                            </h6>
                            <table border="1">
                                <thead>
                                    <th>نام درس</th>
                                    <th>گروه درس</th>
                                    <th>روز ارائه</th>
                                    <th>زمان ارائه</th>
                                    <th>تاریخ امتحان</th>
                                    <th>ساعت امتحان</th>
                                </thead>

                                @foreach($professor_term_lessons as $pt)
                                    @php($lesson = \App\MaarefLessons::find($pt->lesson_id))
                                    @php($v = new Verta($pt->test_date))
                                    @php($TestDate = $v->formatDate())
                                    <tr>
                                        <td>{{$lesson->title}}</td>
                                        <td>{{$pt->lesson_group}}</td>
                                        <td>{{$pt->day}}</td>
                                        <td>{{$pt->time}}</td>
                                        <td>{{$TestDate}}</td>
                                        <td>{{$pt->test_time}}</td>
                                    </tr>
                                @endforeach
                            </table>

                            <h6 class="margin-top-30 margin-bottom-20">
                                <strong>اطلاعیه ها</strong>
                            </h6>
                            <ul>
                            @foreach($professor_notification as $pn)

                                <li>
                                    {{$pn->title}}
                                    <a href="/attachment/{{$pn->attachment}}">{{$pn->attachment}}</a>
                                </li>

                            @endforeach
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ./Tabs -->

    <footer>
        <div class="container">
            <p class="copyright">تمام حقوق مادی و معنوی این سایت برای دانشگاه معارف اسلامی محفوظ است</p>
        </div>
    </footer>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
</body>
</html>
