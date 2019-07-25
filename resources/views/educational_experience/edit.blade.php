@extends('layouts.app')
@section('content')
    <h3>ویرایش مشخصات دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <form method="post" action="{{route('educational_experience.update',[$educationalExperience->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label class="control-label "><strong>نوع مرکز آموزشی</strong></label>
                        <select name="training_center_type_id" id="training_center_type_id"
                                class="form-control training_center_type">
                            <option value="">لطفا نوع مرکز آموزشی را انتخاب کنید</option>
                            @foreach( $trainingCenterTypes as $trainingCenterType)
                                @if ($trainingCenterType->id==$educationalExperience->trainingCenter->training_center_type_id)
                                    <option value="{{$trainingCenterType->id}}" selected>{{$trainingCenterType->title}}</option>
                                @else
                                    <option value="{{$trainingCenterType->id}}">{{$trainingCenterType->title}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label "><strong>نام مرکز آموزشی</strong></label>
                        <select name="training_center_id" id="training_center_id" class="form-control training_center">
                            <option value="">لطفا نام مرکز آموزشی را انتخاب کنید</option>
                            @foreach( $trainingCenters as $trainingCenter)
                                @if ($trainingCenter->id==$educationalExperience->training_center_id)
                                    <option value="{{$trainingCenter->id}}" selected>{{$trainingCenter->title}}</option>
                                @else
                                    <option value="{{$trainingCenter->id}}">{{$trainingCenter->title}}</option>
                                @endif
                            @endforeach
                            <option value="other">سایر</option>
                        </select>

                        <input type="hidden" name="training_center_title" id="training_center_title"
                               class="form-control other-input-top"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label ">
                            <strong>عنوان درس هایی که تدریس نموده یا می نمایید</strong>
                        </label>
                        <input name="lessons_title" id="lessons_title" class="form-control"
                               value="{{$educationalExperience->lessons_title}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label "><strong>مقطع</strong></label>
                        <select name="grade_id" id="grade_id" class="form-control">
                            <option value="">لطفا مقطع تحصیل را انتخاب کنید</option>
                            @foreach( $grades as $grade)
                                @if ($grade->id==$educationalExperience->grade_id)
                                    <option value="{{$grade->id}}" selected>{{$grade->title}}</option>
                                @else
                                    <option value="{{$grade->id}}">{{$grade->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label "><strong>تاریخ شروع</strong></label>
                        <input type="date" name="start_date" id="start_date" class="form-control"
                               value="{{$educationalExperience->start_date}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label "><strong>تاریخ پایان</strong></label>
                        <input type="date" name="end_date" id="end_date" class="form-control"
                               value="{{$educationalExperience->end_date}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label "><strong>نشانی موسسه</strong></label>
                        <input name="address" id="address" class="form-control"
                               value="{{$educationalExperience->address}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label "><strong>تلفن</strong></label>
                        <input name="phone" id="phone" class="form-control"
                               value="{{$educationalExperience->phone}}"/>
                    </div>

                    <div class="form-group col-md-10 offset-md-1">
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


            $(document).on('change', '.training_center_type', function() {


                var trainingCenterTypeId= $(this).val();

                if (trainingCenterTypeId) {
                    $.ajax({
                        type: "GET",
                        url: "/alumni/getTrainingCenterList/"+trainingCenterTypeId,
                        success: function (res) {

                            if (res) {
                                $("#training_center_id").empty();
                                $("#training_center_id").append('<option>لطفا نام مرکز آموزشی را انتخاب کنید</option>');
                                $.each(res, function (key, value) {
                                    $("#training_center_id").append('<option value="' + key + '">' + value + '</option>');
                                });
                                $("#training_center_id").append('<option value="other">سایر</option>');

                                $("#training_center_title").prop("type", "hidden");
                            } else {
                                $("#training_center_id").empty();
                            }
                        }
                    });
                } else {
                    $("#training_center_id").empty();
                }


            });

            $(document).on('change', '.training_center', function () {

                if ($(this).val()==='other') {
                    $('#training_center_title').prop("type", "text");
                } else {
                    $('#training_center_title').prop("type", "hidden");
                }
            });

            $('form').on('submit',function () {

                $("#client_error").children().remove();

                var has_empty = false;

                $(this).find('select').each(function () {

                    if ($(this).val()==='other') {
                        if ($(this).attr('id')==="training_center_id") {

                                if (!$('#training_center_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا نام مرکز آموزشی را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
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
