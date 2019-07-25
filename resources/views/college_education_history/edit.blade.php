@extends('layouts.app')
@section('content')
    <h3>ویرایش مشخصات دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <form method="post" action="{{route('college_education_history.update',[$collegeEducationHistory->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label class="control-label "><strong>مقطع تحصیلی</strong></label>

                        <select name="grade_id" id="grade_id" class="form-control">
                            <option value="">لطفا مقطع تحصیلی را انتخاب کنید</option>
                            @foreach( $grades as $grade)
                                @if ($grade->id==$collegeEducationHistory->grade_id)
                                    <option value="{{$grade->id}}" selected>{{$grade->title}}</option>
                                @else
                                    <option value="{{$grade->id}}">{{$grade->title}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>رشته</strong></label>

                        <select name="field_of_study_id" id="field_of_study_id" class="form-control field-of-study">
                            <option value="">لطفا رشته را انتخاب کنید</option>
                            @foreach( $fieldOfStudies as $fieldOfStudy)
                                @if ($fieldOfStudy->id==$collegeEducationHistory->field_of_study_id)
                                    <option value="{{$fieldOfStudy->id}}" selected>{{$fieldOfStudy->title}}</option>
                                @else
                                    <option value="{{$fieldOfStudy->id}}">{{$fieldOfStudy->title}}</option>
                                @endif

                            @endforeach
                            <option value="other">سایر</option>
                        </select>

                        <input type="hidden" name="field_of_study_title" id="field_of_study_title"
                               class="form-control other-input-top"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>گرایش</strong></label>

                        <select name="orientation_id" id="orientation_id" class="form-control orientation">
                            <option value="">لطفا گرایش را انتخاب کنید</option>
                            @foreach( $orientations as $orientation)
                                @if ($orientation->id==$collegeEducationHistory->orientation_id)
                                    <option value="{{$orientation->id}}" selected>{{$orientation->title}}</option>
                                @else
                                    <option value="{{$orientation->id}}">{{$orientation->title}}</option>
                                @endif

                            @endforeach
                            <option value="other">سایر</option>
                        </select>

                        <input type="hidden" name="orientation_title" id="orientation_title"
                               class="form-control other-input-top"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>معدل</strong></label>
                        <input name="average" id="average" class="form-control" type="number" min="10" max="20"
                        value="{{$collegeEducationHistory->average}}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>دانشگاه محل تحصیل</strong></label>

                        <select name="training_center_id" id="training_center_id" class="form-control training_center">
                            <option value="">لطفا دانشگاه را انتخاب کنید</option>
                            @foreach( $trainingCenters as $trainingCenter)
                                @if ($trainingCenter->id==$collegeEducationHistory->training_center_id)
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
                        <label class="control-label"><strong>کشور محل تحصیل</strong></label>

                        <select name="country_id" id="country_id" class="form-control country" data-id="1">
                            <option value="">لطفا کشور محل تحصیل را انتخاب کنید</option>
                            @foreach( $countries as $country)
                            @if ($country->id==$collegeEducationHistory->country_id)
                                <option value="{{$country->id}}" selected>{{$country->title}}</option>
                            @else
                                <option value="{{$country->id}}">{{$country->title}}</option>
                            @endif

                            @endforeach
                            <option value="other">سایر</option>
                        </select>

                        <input type="hidden" name="country_title" id="country_title"
                               class="form-control other-input-top"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>تاریخ شروع</strong></label>

                        <input type="date" name="start_date" id="start_date" class="form-control"
                               value="{{$collegeEducationHistory->start_date}}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label "><strong>تاریخ پایان</strong></label>

                        <input type="date" name="end_date" id="end_date" class="form-control"
                               value="{{$collegeEducationHistory->end_date}}"/>
                    </div>

                    <div class="form-group">
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

            $(document).on('change', '.field-of-study', function() {
                var fieldOfStudyId= $(this).val();

                if (fieldOfStudyId) {
                    $.ajax({
                        type: "GET",
                        url: "/alumni/getOrientationList/"+fieldOfStudyId,
                        success: function (res) {

                            if (res) {
                                $("#orientation_id").empty();
                                $("#orientation_id").append('<option>لطفا گرایش را انتخاب کنید</option>');
                                $.each(res, function (key, value) {
                                    $("#orientation_id").append('<option value="' + key + '">' + value + '</option>');
                                });
                                $("#orientation_id").append('<option value="other">سایر</option>');

                                $("#orientation_title").prop("type", "hidden");

                            } else {
                                $("#orientation_id").empty();
                            }
                        }
                    });
                } else {
                    $("#orientation_id").empty();
                }

                if ($(this).val()==='other') {

                    $('#field_of_study_title').prop("type", "text");
                } else {
                    $('#field_of_study_title').prop("type", "hidden");
                }
            });

            $(document).on('change', '.orientation', function () {
                if ($(this).val()==='other') {
                    $('#orientation_title').prop("type", "text");
                } else {
                    $('#orientation_title').prop("type", "hidden");
                }
            });

            $(document).on('change', '.training_center', function () {
                if ($(this).val()==='other') {
                    $('#training_center_title').prop("type", "text");
                } else {
                    $('#training_center_title').prop("type", "hidden");
                }
            });

            $(document).on('change', '.country', function () {
                if ($(this).val()==='other') {
                    $('#country_title').prop("type", "text");
                } else {
                    $('#country_title').prop("type", "hidden");
                }
            });




            $('form').on('submit',function () {

                $("#client_error").children().remove();

                var has_empty = false;

                $(this).find('select').each(function () {
                    if ($(this).val()/*find("option:selected").text() === "سایر"*/==='other') {
                        switch ($(this).attr('id')) {
                            case "training_center_id":
                                if (!$('#training_center_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا محل تحصیل را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                            case "field_of_study_id":
                                if (!$('#field_of_study_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا رشته را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                            case "orientation_id":
                                if (!$('#orientation_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا گرایش را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                            case "country_id":
                                if (!$('#country_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا محل تحصیل را وارد کنید</label>');
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
