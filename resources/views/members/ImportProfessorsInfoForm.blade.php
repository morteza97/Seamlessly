@extends('layouts.dashboard')
@section('content')

    <div class="container">

        <div class="row">
            <div class="form-group col-md-12">

                <section>

                    <div class="container">
                        <h2 class="main-content-title"> بروزرسانی مشخصات اساتید هیأت علمی از فایل اکسل </h2>

                        @if( count($errors) > 0 )
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if($message = Session::get('success') )
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" style="color: #F70000;">
                                    <i class="far fa-times-circle"></i>
                                </button>
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                        <h5 class="margin-top-30 margin-bottom-30"><strong style="color: #F70000;">نکته: </strong>ترتیب فیلدها در فایل اکسل باید به ترتیب زیر باشد</h5>
                        <table border="1" class="table-responsive-xl margin-bottom-30">
                            <tr>
                                <th>شماره شناسایی</th>
                                <th>لقب</th>
                                <th>نام خانوادگی</th>
                                <th>نام</th>
                                <th>جنسیت</th>
                                <th>نام پدر</th>
                                <th>وضعیت تأهل</th>
                                <th>تاریخ تولد</th>
                                <th>محل تولد</th>
                                <th>شماره شناسنامه</th>
                                <th>محل صدور</th>
                                <th>کد ملی</th>
                                <th>گروه آموزشی</th>
                                <th>مرتبه علمی</th>
                                <th>پست الکترونیکی</th>
                                <th>تلفن همراه</th>
                                <th>تلفن ثابت</th>
                            </tr>
                        </table>

                        <form action="{{route('management.ImportProfessorsInfo')}}" class="myForm" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label>فایل اکسل را بارگذاری کنید</label>
                            <input type="file" name="professors_list">
                            <input type="submit" value="بروزرسانی مشخصات اساتید">
                        </form>

                    </div>

                </section>

            </div>
        </div>
    </div>

@endsection
