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
                                <th>شماره درس</th>
                                <th>نام درس</th>
                                <th>تعداد واحد</th>
                                <th>گروه آموزشی</th>
                                <th>مقطع</th>
                                <th>نوع درس</th>
                                <th>نوع ارائه درس</th>
                                <th>جنسیت درس</th>
                                <th>وضعیت درس</th>
                            </tr>
                        </table>

                        <form action="{{route('ProfessorTermLessons.Import')}}" class="myForm" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>انتخاب ترم</label>
                                <select name="term" id="term">
                                    @foreach($terms as $term)
                                        <option value="{{$term->id}}">{{$term->Semester ." " . $term->AcademicYear}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label>فایل اکسل را بارگذاری کنید</label>
                            <input type="file" name="professor_term_lessons_list">
                            <input type="submit" value="درج و بروزرسانی دروس ارائه شده استاد">
                        </form>

                    </div>

                </section>

            </div>
        </div>
    </div>

@endsection
