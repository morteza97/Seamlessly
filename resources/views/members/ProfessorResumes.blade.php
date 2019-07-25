@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="form-group col-md-12">
            <section>
                <div class="container">
                    <h2 class="main-content-title"> مدیریت رزومه </h2>

                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-5">
                            <img src="/images/UsersPic/{{$user->pic}}" class="profile-pic">
                        </div>
                        <div class="col-lg-6 col-md-5 col-7">
                            <label
                                class="form-inline margin-top-20 professor_name bottom_border_yellow"> {{$user->FirstName . " " . $user->LastName }} </label>

                            <label class="form-inline margin-top-15"><strong> گروه آموزشی:&ensp;</strong><a
                                    href="{{ $group_url }}" target="_blank"> {{ $group_title }} </a></label>
                            <label> <strong>مرتبه علمی: </strong> {{ $level }} </label>
                            <label><strong> پست الکترونیکی: </strong> {{ $user->email }} </label>
                            <div class="row margin-top-10">
                                <label class="col-md-9 col-6"><strong>دانلود فایل رزومه: </strong> <a
                                        href="#">دریافت</a></label>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-4 col-12 align-middle divider-inside-right">
                            <div class="row margin-top-50">
                                <label class="col-md-9 col-6"><strong>فعالیت های آموزشی: </strong></label>
                                <label class="col-md-3 col-6 resume_count" id="resume_count1">{{$resume_count1}}</label>
                            </div>
                            <div class="row">
                                <label class="col-md-9 col-6"><strong>فعالیت های پژوهشی: </strong></label>
                                <label class="col-md-3 col-6 resume_count" id="resume_count2">{{$resume_count2}}</label>
                            </div>
                            <div class="row">
                                <label class="col-md-9 col-6"><strong>فعالیت های فرهنگی: </strong></label>
                                <label class="col-md-3 col-6 resume_count" id="resume_count3">{{$resume_count3}}</label>
                            </div>
                            <div class="row">
                                <label class="col-md-9 col-6"><strong>فعالیت های اجرایی: </strong></label>
                                <label class="col-md-3 col-6 resume_count" id="resume_count4">{{$resume_count4}}</label>
                            </div>


                        </div>
                    </div>
                </div>
            </section>

            <!-- Tabs -->
            <section id="tabs">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <nav>
                                @php
                                    $active0 = "";
                                    $active1 = "";
                                    $active2 = "";
                                    $active3 = "";
                                    $active4 = "";
                                    $active5 = "";
                                @endphp

                                @if(request()->route('id') == 0)
                                    @php($active0 = "active")
                                @elseif(request()->route('id') == 1)
                                    @php($active1 = "active")
                                @elseif(request()->route('id') == 2)
                                    @php($active2 = "active")
                                @elseif(request()->route('id') == 3)
                                    @php($active3 = "active")
                                @elseif(request()->route('id') == 4)
                                    @php($active4 = "active")
                                @elseif(request()->route('id') == 5)
                                    @php($active5 = "active")
                                @endif

                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link {{$active0}}" href="{{ route('resumes.show', [0]) }}">نمای
                                        کلی</a>
                                    <a class="nav-item nav-link {{$active1}}" href="{{ route('resumes.show', [1]) }}">فعالیت
                                        های آموزشی</a>
                                    <a class="nav-item nav-link {{$active2}}" href="{{ route('resumes.show', [2]) }}">فعالیت
                                        های پژوهشی</a>
                                    <a class="nav-item nav-link {{$active3}}" href="{{ route('resumes.show', [3]) }}">فعالیت
                                        های فرهنگی</a>
                                    <a class="nav-item nav-link {{$active4}}" href="{{ route('resumes.show', [4]) }}">فعالیت
                                        های اجرایی</a>
                                    <a class="nav-item nav-link {{$active5}}" href="{{ route('resumes.show', [5]) }}">دروس ارائه شده</a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                @if(request()->route('id') == 0)
                                    <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <h3 class="margin-top-30 margin-bottom-20">تحصیلات / تحصیلات تکمیلی</h3>

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

                                @elseif(request()->route('id') == 5)

                                    <div class="tab-pane fade show active" id="nav-course" role="tabpanel" aria-labelledby="nav-course-tab">

                                        <div id="message">
                                            @if(\Session::has('success'))
                                                <div class="alert alert-success">{{ \Session::get('success') }}</div>
                                            @endif

                                            @if($errors->any())
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li class="text-danger">
                                                            {{$error}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif

                                        </div>

                                        <h6 class="margin-top-30 margin-bottom-20">
                                            <span>دروس ارائه شده در </span>
                                            {{$term->Semester . " " . $term->AcademicYear}}
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

                                        <form action="{{route('ProfessorNotification.Store')}}" method="post" enctype="multipart/form-data" class="row margin-top-30"
                                            style="background: #dcdcdc;margin: 20px 0px;padding: 10px;border-radius: 5px;">
                                            {{csrf_field()}}
                                            <input type="hidden" name="pro_id" value="{{$user->id}}">

                                            <div class="input-group col-lg-12 col-md-12">
                                                <label>عنوان اطلاعیه:</label>
                                                <input type="text" name="title" style="width: 100%;">
                                            </div>

                                            <div class="input-group col-lg-6 col-md-6">
                                                <label>تاریخ انقضاء:</label>
                                                <input type="text" id="inputDate1-text"
                                                       class="form-control DatePicker-input"
                                                       placeholder="انتخاب تاریخ"
                                                       aria-label="date1" aria-describedby="date1"
                                                       autocomplete="off">
                                                <input type="hidden" id="inputDate1-date" name="expire_date"
                                                       class="form-control" placeholder="Persian Calendar Date"
                                                       aria-label="date11" aria-describedby="date11"
                                                       autocomplete="off">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cursor-pointer DatePicker-icon"
                                                            id="date1">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="input-group col-lg-6 col-md-6">
                                                <label>فایل پیوست:</label>
                                                <input type="file" name="attachment" id="attachment">
                                            </div>

                                            <input type="submit" name="notification_submit" class="btn btn-primary" style="margin: 20px"  value="ثبت اطلاعیه">


                                        </form>

                                    </div>

                                    <table border="1">
                                        <thead>
                                        <th>عنوان اطلاعیه</th>
                                        <th>تاریخ انقضاء</th>
                                        <th>فایل پیوست</th>
                                        <th>ویرایش / حذف</th>
                                        </thead>

                                        @foreach($professor_notification as $pt)
                                            <tr>
                                                <td>{{$pt->title}}</td>
                                                <td>{{$pt->expire_date}}</td>
                                                <td>{{$pt->attachment}}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="panel-body">
                                            <div id="message"></div>
                                            <div class="table-responsive">
                                                <input type="hidden" name="pro_id" id="pro_id" value="{{$user->id}}">
                                                <table class="table table-striped table-bordered rtl-typeahead">
                                                    <thead>
                                                    <tr>
                                                        <th>سال</th>
                                                        <th>عنوان</th>
                                                        <th>مرجع</th>
                                                        <th>افزودن / حذف</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="resumes_records">

                                                    </tbody>
                                                </table>
                                                {{ csrf_field() }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- ./Tabs -->
        </div>
    </div>

    <script>
        $(document).ready(function(){

            var full_url = document.URL; // Get current url
            var url_array = full_url.split('/') // Split the string into an array with / as separator
            var id = url_array[url_array.length-1];
            var pro_id = $('#pro_id').val();

            if (id != 0)
                fetch_data();

            function fetch_data() {
                $.ajax({
                    url: "/resumes/fetch_data/" + pro_id + "/" + id,
                    dataType:"json",
                    method:"get",
                    success:function(data)
                    {
                        var html = '';
                        html += '<tr>';
                        html += '<td >' +
                            '<select id="year" class="form-control select_year">';
                        html += '<option value=""></option>';
                            for (var i = GetTodayCalendarInPersian()[0] ; i > 1350 ; i--)
                                html += '<option value="' + i + '">' + i + '</option>';
                        html += '</select>'+
                            '</td>';
                        html += '<td contenteditable id="title"></td>';
                        html += '<td contenteditable id="resource"></td>';
                        html += '<td><button type="button" class="btn btn-success btn-xs btn-size-80" id="add">افزودن</button></td></tr>';
                        for(var count=0; count < data.length; count++)
                        {
                            html +='<tr>';
                            html +='<td contenteditable class="column_name" data-column_name="year" data-id="'+data[count].id+'">'+data[count].year+'</td>';
                            html += '<td contenteditable class="column_name" data-column_name="title" data-id="'+data[count].id+'">'+data[count].title+'</td>';
                            html += '<td contenteditable class="column_name" data-column_name="resource" data-id="'+data[count].id+'">'+data[count].resource+'</td>';
                            html += '<td><button type="button" class="btn btn-danger btn-xs btn-size-80 delete" id="'+data[count].id+'">حذف</button></td></tr>';
                        }
                        $('#resumes_records').html(html);

                        if (id == 1)
                            $('#resume_count1').html(data.length);
                        else if (id == 2)
                            $('#resume_count2').html(data.length);
                        else if (id == 3)
                            $('#resume_count3').html(data.length);
                        else if (id == 4)
                            $('#resume_count4').html(data.length);
                    }
                });
            }

            var _token = $('input[name="_token"]').val();

            $(document).on('click', '#add', function(){
                var year = $('#year').val();
                var title = $('#title').text();
                var resource = $('#resource').text();
                var activity_type_id = id;
                if(year != '' && title != '' && resource != '')
                {
                    $.ajax({
                        url: "/resumes/add_data/" + pro_id,
                        method:"POST",
                        data:{year:year, title:title, resource: resource, activity_type_id: activity_type_id,  _token:_token},
                        success:function(data)
                        {
                            $('#message').html(data);
                            fetch_data();
                            close_alert()
                        }
                    });
                }
                else
                {
                    $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
                }
            });

            $(document).on('blur', '.column_name', function(){
                var column_name = $(this).data("column_name");
                var column_value = $(this).text();
                var id = $(this).data("id");

                if(column_value != '')
                {
                    $.ajax({
                        url:"{{ route('resumes.update_data') }}",
                        method:"POST",
                        data:{column_name:column_name, column_value:column_value, id:id, _token:_token},
                        success:function(data)
                        {
                            $('#message').html(data);
                            close_alert()
                        }
                    })
                }
                else
                {
                    $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
                }
            });

            $(document).on('click', '.delete', function(){
                var id = $(this).attr("id");
                if(confirm("آیا می خواهید این مورد را حذف کنید؟"))
                {
                    $.ajax({
                        url:"{{ route('resumes.delete_data') }}",
                        method:"POST",
                        data:{id:id, _token:_token},
                        success:function(data)
                        {
                            $('#message').html(data);
                            fetch_data();
                            close_alert()
                        }
                    });
                }
            });

            $('#date1').MdPersianDateTimePicker({
                targetTextSelector: '#inputDate1-text',
                targetDateSelector: '#inputDate1-date',
                enableTimePicker: false,
                dateFormat: 'yyyy-MM-dd',
                textFormat: 'yyyy-MM-dd ',
            });

            function close_alert() {
                window.setTimeout(function () {
                    $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
                        $(this).remove();
                    });
                }, 3000);
            }

        });
    </script>
@endsection
