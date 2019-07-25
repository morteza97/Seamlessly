@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="form-group col-md-12">
            <!-- Tabs -->
            <section id="tabs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center professor_list_title">لیست اساتید هیأت علمی </h3>
                        </div>
                    </div>
                    <div class="row">
                        {{--<table border="1" width="100%">
                            <thead style="background: #ced4da">
                            <th>تصویر</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>کد ملی</th>
                            <th>ویرایش</th>
                            <th>مدیریت رزومه</th>
                            </thead>--}}
                            @foreach($professors as $pro)

                                <div class="col-lg-4 col-md-6">
                                    <a href="{{ route('management.professor_edit_resumes', [$pro->id, 0]) }}">
                                        <div class="row professor_div">
                                            <div class="col-lg-5 col-5 text-center">
                                                <img src="/images/UsersPic/{{$pro->pic}}"
                                                     class="professor_pic img-responsive">
                                            </div>
                                            <div class="col-lg-7 col-7" style="padding: 0">
                                                <label class="professor_name"> {{$pro->FirstName . " ". $pro->LastName}} </label>

                                                <label class="professor_email">  {{$pro->email}} </label>
                                                <label> <strong>گروه آموزشی: </strong> {{$pro->professor->getGroup($pro->professor->group_id)->title}} </label>
                                                <label> {{$pro->professor->getLevel($pro->professor->level_id)}} </label>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                {{--<tr>
                                    <td width="10%">
                                        <img src="/images/UsersPic/{{$pro->pic}}" width="60" height="80">
                                    </td>
                                    <td>{{$pro->FirstName}}</td>
                                    <td>{{$pro->LastName}}</td>
                                    <td>{{$pro->NationalCode}}</td>
                                    <td>
                                        <a href="{{ route('management.professor_edit_form', [$pro->id]) }}">
                                            <button class="btn btn-primary">ویرایش</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('management.professor_edit_resumes', [$pro->id, 0]) }}">
                                            <button class="btn btn-primary">مدیریت رزومه</button>
                                        </a>
                                    </td>
                                </tr>--}}
                            @endforeach
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('management.Add_Professor_Form') }}">
                                <div class="row professor_div">
                                    <div class="col-lg-5 col-5 text-center">
                                        <img src="/images/UsersPic/plus.png" class="professor_pic img-responsive" style="background: #212529;">
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{--</table>--}}
                    </div>
                </div>
            </section>
            <!-- ./Tabs -->
        </div>
    </div>

@endsection
