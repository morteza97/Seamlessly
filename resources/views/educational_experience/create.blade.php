@extends('layouts.app')
@section('content')
    <h4 class="section-header">سوابق آموزشی</h4>
    <section class="section-padding">
        <nav>
            <ol class="cd-breadcrumb triangle">
                <li><label>مشخصات متقاضی</label></li>
                <li><label>سوابق تحصیلات حوزوی</label></li>
                <li><label>سوابق تحصیلات دانشگاهی</label></li>
                <li class="current"><label>سوابق آموزشی</label></li>
                <li><label>سوابق پژوهشی</label></li>
                <li><label>سوابق تبلیغی</label></li>
                <li><label>سوابق اشتغال</label></li>
                <li><label>مجوز تدریس دروس معارف</label></li>
                <li><label>مجوز تبلیغ در دانشگاه ها</label></li>
                <li><label>معرفان علمی</label></li>
            </ol>
        </nav>
    </section>
    <div class="container">
        <div class="row">
                <form method="post" action="{{route('educational_experience.store')}}" >
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
                                <div class="form-group col-md-2">
                                    <label class="control-label text-center label-height "><strong>نوع مرکز آموزشی</strong></label>
                                    <select name="training_center_type_id[]" id="training_center_type_id"
                                            class="form-control training_center_type" data-id="1">
                                        <option value="">لطفا نوع مرکز آموزشی را انتخاب کنید</option>
                                        @foreach( $trainingCenterTypes as $trainingCenterType)
                                            <option value="{{$trainingCenterType->id}}">{{$trainingCenterType->title}}</option>
                                        @endforeach
                                        {{--<option value="other">سایر</option>--}}
                                    </select>

                                    {{--<input type="hidden" name="training_center_type_title[]" id="training_center_type_title1"
                                           class="form-control other-input-top"/>--}}
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="control-label text-center label-height "><strong>نام مرکز آموزشی</strong></label>
                                    <select name="training_center_id[]" id="training_center_id1" class="form-control training_center" data-id="1">
                                        <option value="">لطفا نام مرکز آموزشی را انتخاب کنید</option>
                                        {{--@foreach( $trainingCenters as $trainingCenter)
                                            <option value="{{$trainingCenter->id}}">{{$trainingCenter->title}}</option>
                                        @endforeach--}}
                                        <option value="other">سایر</option>
                                    </select>

                                    <input type="hidden" name="training_center_title[]" id="training_center_title1"
                                           class="form-control other-input-top"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="control-label text-center label-height ">
                                        <strong>عنوان درس هایی که تدریس نموده یا می نمایید</strong>
                                    </label>
                                    <input name="lessons_title[]" id="lessons_title" class="form-control"/>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>مقطع</strong></label>
                                    <select name="grade_id[]" id="grade_id[]" class="form-control">
                                        <option value="">لطفا مقطع تحصیل را انتخاب کنید</option>
                                        @foreach( $grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>تاریخ شروع</strong></label>
                                    <input type="date" name="start_date[]" id="start_date" class="form-control"/>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>تاریخ پایان</strong></label>
                                    <input type="date" name="end_date[]" id="end_date" class="form-control"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="control-label text-center label-height "><strong>نشانی موسسه</strong></label>
                                    <input name="address[]" id="address" class="form-control"/>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>تلفن</strong></label>
                                    <input name="phone[]" id="phone" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
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


    <script>


        $(document).ready(function() {


            $("#new_row").click(function () {
                var val=$("#row_count").val();
                val++;


                $("#row1").clone().attr('id',"row"+val).appendTo("#rows");

                $("#row"+val+" label").addClass('display-none');
                $("#row"+val+" .training_center_type").attr('data-id',val);
                $("#row"+val+" #training_center_id1").attr('id',"training_center_id"+val);
                $("#row"+val+" #training_center_title1").attr('id',"training_center_title"+val);

                $("#row"+val+" #training_center_id"+val).attr('data-id',val);
                $("#row"+val+" #training_center_title" + val).prop("type", "hidden");

                $("#row_count").val(val);
            });

            $(document).on('change', '.training_center_type', function() {

                var id = $(this).data('id');
                var trainingCenterTypeId= $(this).val();

                if (trainingCenterTypeId) {
                    $.ajax({
                        type: "GET",
                        url: "/alumni/getTrainingCenterList/"+trainingCenterTypeId,
                        success: function (res) {

                            if (res) {
                                $("#training_center_id"+id).empty();
                                $("#training_center_id"+id).append('<option>لطفا نام مرکز آموزشی را انتخاب کنید</option>');
                                $.each(res, function (key, value) {
                                    $("#training_center_id"+id).append('<option value="' + key + '">' + value + '</option>');
                                });
                                $("#training_center_id"+id).append('<option value="other">سایر</option>');

                                $("#training_center_title" + id).prop("type", "hidden");
                            } else {
                                $("#training_center_id"+id).empty();
                            }
                        }
                    });
                } else {
                    $("#training_center_id"+id).empty();
                }

                /*if ($(this).val()==='other') {

                    $('#training_center_type_title' + id).prop("type", "text");
                } else {
                    $('#training_center_type_title' + id).prop("type", "hidden");
                }*/
            });

            $(document).on('change', '.training_center', function () {
                var id = $(this).data('id');
                if ($(this).val()==='other') {
                    $('#training_center_title' + id).prop("type", "text");
                } else {
                    $('#training_center_title' + id).prop("type", "hidden");
                }
            });

            $('form').on('submit',function () {

                $("#client_error").children().remove();

                var has_empty = false;

                $(this).find('select').each(function () {
                    var id = $(this).data('id');
                    if ($(this).val()==='other') {
                        switch ($(this).attr('id')) {
                            /*case "training_center_type_id":
                                if (!$('#training_center_type_title' + id).val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا نوع مرکز آموزشی را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;*/
                            case "training_center_id"+id:
                                if (!$('#training_center_title' + id).val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا نام مرکز آموزشی را وارد کنید</label>');
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
