@extends('layouts.app')
@section('content')
    <h3>ویرایش مشخصات دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('teaching_license.update',[$teachingLicense->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row" id="row1">
                        <div class="form-group col-md-12">
                            <label class="control-label "><strong>عنوان درس</strong></label>
                            <select name="lesson_id" id="lesson_id"
                                    class="form-control lesson">
                                <option value="">لطفا عنوان درس را انتخاب کنید</option>
                                @foreach($lessons as $lesson)
                                    @if ($lesson->id==$teachingLicense->lesson_id)
                                        <option value="{{$lesson->id}}" selected>{{$lesson->title}}</option>
                                    @else
                                        <option value="{{$lesson->id}}">{{$lesson->title}}</option>
                                    @endif
                                @endforeach
                                <option value="other">سایر</option>
                            </select>
                            <input type="hidden" name="lesson_title" id="lesson_title"
                                   class="form-control other-input-top"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label "><strong>شماره مجوز</strong></label>
                            <input name="license_number" id="license_number" class="form-control"
                                   value="{{$teachingLicense->license_number}}"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label "><strong>تاریخ صدور</strong></label>
                            <input type="date"  name="issue_date" id="issue_date" class="form-control"
                                   value="{{$teachingLicense->issue_date}}"/>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                        </div>
                    </div>
                </form>
                <div id="client_error">

                </div>
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
        </div>
    </div>

    <script>


        $(document).ready(function() {

            $(document).on('change', '.lesson', function () {
                
                if ($(this).val()==='other') {
                    $('#lesson_title').prop("type", "text");
                } else {
                    $('#lesson_title').prop("type", "hidden");
                }
            });

            $('form').on('submit',function () {

                $("#client_error").children().remove();

                var has_empty = false;

                $(this).find('select').each(function () {
                    
                    if ($(this).val()==='other') {
                        switch ($(this).attr('id')) {
                            case "lesson_id":
                                if (!$('#lesson_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا نام درس را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                        }
                    }
                });

                if (has_empty) {
                    return false;
                }
            });
        });
    </script>
@endsection
