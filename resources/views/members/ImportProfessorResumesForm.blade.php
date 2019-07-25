@extends('layouts.dashboard')
@section('content')

    <div class="container">

        <div class="row">
            <div class="form-group col-md-12">

                <section>

                    <div class="container">
                        <h2 class="main-content-title">درج رزومه استاد از فایل اکسل </h2>

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
                                <th>نوع فعالیت</th>
                                <th>سال</th>
                                <th>عنوان</th>
                                <th>توضیحات</th>
                            </tr>
                        </table>

                        <form action="{{route('management.ImportProfessorResumes')}}" class="myForm" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label>فایل اکسل را بارگذاری کنید</label>
                            <input type="hidden" name="pro_id" value="{{$pro_id}}">
                            <input type="file" name="professors_resume">
                            <input type="submit" value="درج رزومه اساتید">
                        </form>

                    </div>

                </section>

            </div>
        </div>
    </div>

@endsection
