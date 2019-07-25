@extends('layouts.dashboard')

@section('content')



    <div class="row">
        <div class="form-group col-md-12">
            <section>
                <div class="container">

                    <h2 class="main-content-title"> مدیریت رزومه </h2>

                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-xs-12">
                            <img src="/images/UsersPic/{{$professor->pic}}" class="profile-pic">
                            <div class="margin-top-20">
                                <a href="{{ route('management.professor_edit_form', [$professor->id]) }}">ویرایش مشخصات</a>
                                <br>
                                <a href="{{ route('management.ImportProfessorResumesForm', [$professor->id]) }}">بارگذاری از فایل اکسل</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5 col-sm-12">
                            <label class="form-inline margin-top-20 professor_name bottom_border_yellow">
                                <span class="w-100">
                                    {{$professor->FirstName . " " . $professor->LastName }}
                                </span>
                            </label>

                            <label class="form-inline margin-top-15"><strong> گروه آموزشی:&ensp;</strong><a
                                    href="{{ $group_url }}" target="_blank"> {{ $group_title }} </a></label>
                            <label> <strong>مرتبه علمی: </strong> {{ $level }} </label>
                            <label><strong> پست الکترونیکی: </strong> {{ $professor->email }} </label>
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
                                    @php
                                        $active0 = "active";
                                    @endphp
                                @elseif(request()->route('id') == 1)
                                    @php
                                        $active1 = "active";
                                    @endphp
                                @elseif(request()->route('id') == 2)
                                    @php
                                        $active2 = "active";
                                    @endphp
                                @elseif(request()->route('id') == 3)
                                    @php
                                        $active3 = "active";
                                    @endphp
                                @elseif(request()->route('id') == 4)
                                    @php
                                        $active4 = "active";
                                    @endphp
                                @elseif(request()->route('id') == 5)
                                    @php
                                        $active5 = "active";
                                    @endphp
                                @endif

                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link {{$active0}}"
                                       href="{{ route('management.professor_edit_resumes', [$professor->id ,0]) }}">نمای
                                        کلی</a>
                                    <a class="nav-item nav-link {{$active1}}"
                                       href="{{ route('management.professor_edit_resumes', [$professor->id ,1]) }}">فعالیت
                                        های آموزشی</a>
                                    <a class="nav-item nav-link {{$active2}}"
                                       href="{{ route('management.professor_edit_resumes', [$professor->id ,2]) }}">فعالیت
                                        های پژوهشی</a>
                                    <a class="nav-item nav-link {{$active3}}"
                                       href="{{ route('management.professor_edit_resumes', [$professor->id ,3]) }}">فعالیت
                                        های فرهنگی</a>
                                    <a class="nav-item nav-link {{$active4}}"
                                       href="{{ route('management.professor_edit_resumes', [$professor->id ,4]) }}">فعالیت
                                        های اجرایی</a>
                                    <a class="nav-item nav-link {{$active5}}"
                                       href="{{ route('management.professor_edit_resumes', [$professor->id ,5]) }}">دروس ارائه شده</a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                @if(request()->route('id') == 0)
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="panel-body">
                                            <div id="message"></div>
                                            <div class="education_history_form row myForm">
                                                {{csrf_field()}}
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <input type="hidden" name="pro_id" id="pro_id" value="{{$professor->id}}">
                                                    <input type="hidden" name="record_id" id="record_id" value="">
                                                    <label for="eh_title">عنوان</label>
                                                    <input type="text" name="eh_title" id="eh_title" autocomplete="off" style="width: 100%">
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label for="education_type">توضیحات</label>
                                                    <textarea name="detail" id="detail"  style="width: 100%"></textarea>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <button class="btn btn-primary margin-top-30" name="he_submit"
                                                            id="he_submit">ثبت مشخصات تحصیلی
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered rtl-typeahead">
                                                    <thead>
                                                    <tr>
                                                        <th>عنوان</th>
                                                        <th>توضیحات</th>
                                                        <th>ویرایش / حذف</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="eh_records">

                                                    </tbody>
                                                </table>
                                                {{ csrf_field() }}
                                            </div>
                                        </div>
                                    </div>
                                @elseif(request()->route('id') == 5)
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="panel-body">

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

                                        </div>
                                    </div>
                                @else
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="panel-body">
                                            <div id="message"></div>
                                            <div class="table-responsive">
                                                <input type="hidden" name="pro_id" id="pro_id" value="{{$professor->id}}">
                                                <table class="table table-striped table-bordered rtl-typeahead">
                                                    <thead>
                                                    <tr>
                                                        <th>سال</th>
                                                        <th>عنوان</th>
                                                        <th>توضیحات بیشتر</th>
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
        $(document).ready(function () {

            var full_url = document.URL; // Get current url
            var url_array = full_url.split('/') // Split the string into an array with / as separator
            var id = url_array[url_array.length - 1];
            var pro_id = $('#pro_id').val();

            if (id == 0)
                fetch_eh_data();
            else
                fetch_data();


            function fetch_data() {
                $.ajax({
                    url: "/resumes/fetch_data/" + pro_id + "/" + id,
                    dataType: "json",
                    method: "get",
                    success: function (data) {
                        var html = '';
                        html += '<tr>';
                        html += '<td >' +
                            '<select id="year" class="form-control select_year">';
                        html += '<option></option>';
                        for (var i = GetTodayCalendarInPersian()[0]; i > 1350; i--)
                            html += '<option value="' + i + '">' + i + '</option>';
                        html += '</select>' +
                            '</td>';
                        html += '<td contenteditable id="title"></td>';
                        html += '<td contenteditable id="resource"></td>';
                        html += '<td><button type="button" class="btn btn-success btn-xs btn-size-80" id="add">افزودن</button></td></tr>';
                        for (var count = 0; count < data.length; count++) {
                            html += '<tr>';
                            html += '<td contenteditable class="column_name" data-column_name="year" data-id="' + data[count].id + '">' + data[count].year + '</td>';
                            html += '<td contenteditable class="column_name" data-column_name="title" data-id="' + data[count].id + '">' + data[count].title + '</td>';
                            html += '<td contenteditable class="column_name" data-column_name="resource" data-id="' + data[count].id + '">' + data[count].resource + '</td>';
                            html += '<td><button type="button" class="btn btn-danger btn-xs btn-size-80 delete" id="' + data[count].id + '">حذف</button></td></tr>';
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

            /*function fetch_eh_data() {

                $.ajax({
                    url: "/fetch_eh_data/"+pro_id,
                    dataType: "json",
                    method: "get",
                    success: function (data) {

                        var html = '';

                        for (var count = 0; count < data.length; count++) {
                            html += '<tr>';
                            html += '<td>' + data[count].title + '</td>';
                            html += '<td>' + data[count].grade + '</td>';
                            html += '<td>' + data[count].field_of_study + '</td>';
                            html += '<td>' + data[count].orientation + '</td>';
                            html += '<td>' + data[count].country + '</td>';
                            html += '<td>' + data[count].university + '</td>';
                            html += '<td>' + data[count].start_date + '</td>';
                            html += '<td>' + data[count].end_date + '</td>';
                            html += '<td><button type="button" class="btn btn-primary he_update" id="' + data[count].id + '">ویرایش</button>';
                            html += '<button type="button" class="btn btn-danger he_delete" id="' + data[count].id + '">حذف</button></td></tr>';
                        }
                        $('#eh_records').html(html);
                    }
                });
            }*/

            function fetch_eh_data() {

                $.ajax({
                    url: "/fetch_eh_data/"+pro_id,
                    dataType: "json",
                    method: "get",
                    success: function (data) {

                        var html = '';

                        for (var count = 0; count < data.length; count++) {
                            html += '<tr>';
                            html += '<td>' + data[count].title + '</td>';
                            html += '<td>' + data[count].detail + '</td>';
                            html += '<td><button type="button" class="btn btn-primary he_update" id="' + data[count].id + '">ویرایش</button>';
                            html += '<button type="button" class="btn btn-danger he_delete" id="' + data[count].id + '">حذف</button></td></tr>';
                        }
                        $('#eh_records').html(html);
                    }
                });
            }

            var _token = $('input[name="_token"]').val();

            $(document).on('click', '#add', function () {
                var year = $('#year').val();
                var title = $('#title').text();
                var resource = $('#resource').text();
                var activity_type_id = id;

                if (year != '' && title != '' && resource != '') {
                    $.ajax({
                        url: "/resumes/add_data/" + pro_id,
                        method: "POST",
                        data: {
                            year: year,
                            title: title,
                            resource: resource,
                            activity_type_id: activity_type_id,
                            _token: _token
                        },
                        success: function (data) {
                            $('#message').html(data);
                            fetch_data();
                            close_alert();
                        }
                    });
                }
                else {
                    $('#message').html("<div class='alert alert-danger'>لطفا همه فیلدها را وارد کنید.</div>");
                }
            });

            $(document).on('blur', '.column_name', function () {
                var column_name = $(this).data("column_name");
                var column_value = $(this).text();
                var id = $(this).data("id");

                if (column_value != '') {
                    $.ajax({
                        url: "{{ route('resumes.update_data') }}",
                        method: "POST",
                        data: {column_name: column_name, column_value: column_value, id: id, _token: _token},
                        success: function (data) {
                            $('#message').html(data);
                            close_alert();
                        }
                    })
                }
                else {
                    $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
                }
            });

            $(document).on('click', '.delete', function () {
                var id = $(this).attr("id");
                if (confirm("آیا می خواهید این مورد را حذف کنید؟")) {
                    $.ajax({
                        url: "{{ route('resumes.delete_data') }}",
                        method: "POST",
                        data: {id: id, _token: _token},
                        success: function (data) {
                            $('#message').html(data);
                            fetch_data();
                            close_alert();
                        }
                    });
                }
            });

            $(document).on('click', '#he_submit', function () {

                var pro_id = $('#pro_id').val();
                var record_id = $('#record_id').val();
                var he_title = $('#eh_title').val();
                var detail = $('#detail').val();

                if (pro_id != '' && he_title != '') {
                    $.ajax({
                        url: "{{ route('resumes.StoreProfessorEducationHistory') }}",
                        method: "POST",
                        data: {
                            pro_id: pro_id,
                            record_id: record_id,
                            title: he_title,
                            detail: detail,
                            _token: _token
                        },
                        success: function (data) {
                            $('#message').html(data);

                            $('#eh_title').val('');
                            $('#record_id').val('');
                            $('#detail').val('');

                            fetch_eh_data();
                            close_alert();
                        }
                    });
                }
                else {
                    $('#message').html("<div class='alert alert-danger'>لطفا عنوان را وارد کنید</div>");
                }
            });

            $(document).on('click', '.he_delete', function () {
                var id = $(this).attr("id");
                if (confirm("آیا می خواهید این مورد را حذف کنید؟")) {
                    $.ajax({
                        url: "{{ route('resumes.delete_eh_data') }}",
                        method: "POST",
                        data: {id: id, _token: _token},
                        success: function (data) {
                            $('#message').html(data);
                            fetch_eh_data();
                            close_alert()
                        }
                    });
                }
            });

            $(document).on('click', '.he_update', function () {
                var id = $(this).attr("id");
                $.ajax({
                    url: "/GetProfessorHistoryRecord/"+id,
                    dataType: "json",
                    method: "get",
                    success: function (data) {

                        // $('#pro_id').val();
                        $('#eh_title').val(data.title);
                        $('#detail').val(data.detail);
                        $('#record_id').val(id);
                    }
                });

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
