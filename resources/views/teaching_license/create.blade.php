@extends('layouts.app')
@section('content')
    <h4 class="section-header">مجوز تدریس دروس معارف</h4>
    <section class="section-padding">
        <nav>
            <ol class="cd-breadcrumb triangle">
                <li><label>مشخصات متقاضی</label></li>
                <li><label>سوابق تحصیلات حوزوی</label></li>
                <li><label>سوابق تحصیلات دانشگاهی</label></li>
                <li><label>سوابق آموزشی</label></li>
                <li><label>سوابق پژوهشی</label></li>
                <li><label>سوابق تبلیغی</label></li>
                <li><label>سوابق اشتغال</label></li>
                <li class="current"><label>مجوز تدریس دروس معارف</label></li>
                <li><label>مجوز تبلیغ در دانشگاه ها</label></li>
                <li><label>معرفان علمی</label></li>
            </ol>
        </nav>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('teaching_license.store')}}">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="form-group col-md-6">
                            <input type="hidden" value="1" name="row_count" id="row_count"/>
                            <p>
                                <a class="btn btn-primary" id="new_row" >سطر جدید</a>
                            </p>
                        </div>
                        <div id="rows">
                            <div class="row" id="row1">
                                <div class="form-group col-md-4">
                                    <label class="control-label text-center label-height "><strong>عنوان درس</strong></label>
                                    <select name="lesson_id[]" id="lesson_id1"
                                            class="form-control lesson" data-id="1">
                                        <option value="">لطفا عنوان درس را انتخاب کنید</option>
                                        @foreach($lessons as $lesson)
                                            <option value="{{$lesson->id}}">{{$lesson->title}}</option>
                                        @endforeach
                                        <option value="other">سایر</option>
                                    </select>
                                    <input type="hidden" name="lesson_title[]" id="lesson_title1"
                                           class="form-control other-input-top"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label text-center label-height "><strong>شماره مجوز</strong></label>
                                    <input name="license_number[]" id="license_number" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label text-center label-height "><strong>تاریخ صدور</strong></label>
                                    <input type="date"  name="issue_date[]" id="issue_date" class="form-control"/>
                                </div>
                            </div>
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

            $("#new_row").click(function () {
                var val=$("#row_count").val();
                val++;


                $("#row1").clone().attr('id',"row"+val).appendTo("#rows");

                $("#row"+val+" label").addClass('display-none');//غیر فعال کردن عناوین در سطر دوم

                $("#row"+val+" .lesson").attr('data-id',val);
                $("#row"+val+" #lesson_title1").attr('id',"lesson_title"+val);

                $("#row"+val+" #lesson_title" + val).prop("type", "hidden");

                $("#row_count").val(val);
            });

            $(document).on('change', '.lesson', function () {
                var id = $(this).data('id');
                if ($(this).val()==='other') {
                    $('#lesson_title' + id).prop("type", "text");
                } else {
                    $('#lesson_title' + id).prop("type", "hidden");
                }
            });

            $('form').on('submit',function () {

                $("#client_error").children().remove();

                var has_empty = false;

                $(this).find('select').each(function () {
                    var id = $(this).data('id');
                    if ($(this).val()==='other') {
                        switch ($(this).attr('id')) {
                            case "lesson_id"+id:
                                if (!$('#lesson_title' + id).val()) {
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
