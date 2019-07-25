@extends('layouts.app')
@section('content')
    <h4 class="section-header">سوابق تحصیلات دانشگاهی</h4>
    <section class="section-padding">
        <nav>
            <ol class="cd-breadcrumb triangle">
                <li><label>مشخصات متقاضی</label></li>
                <li><label>سوابق تحصیلات حوزوی</label></li>
                <li class="current"><label>سوابق تحصیلات دانشگاهی</label></li>
                <li><label>سوابق آموزشی</label></li>
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
            <div class="col-md-12">
                <form method="post" action="{{route('college_education_history.store')}}">
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
                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>مقطع تحصیلی</strong></label>

                                    <select name="grade_id[]" id="grade_id" class="form-control">
                                        <option value="">لطفا مقطع تحصیلی را انتخاب کنید</option>
                                        @foreach( $grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label class="control-label text-center label-height "><strong>رشته</strong></label>

                                    <select name="field_of_study_id[]" id="field_of_study_id" class="form-control field-of-study" data-id="1">
                                        <option value="">لطفا رشته را انتخاب کنید</option>
                                        @foreach( $fieldOfStudies as $fieldOfStudy)
                                            <option value="{{$fieldOfStudy->id}}">{{$fieldOfStudy->title}}</option>
                                        @endforeach
                                        <option value="other">سایر</option>
                                    </select>

                                    <input type="hidden" name="field_of_study_title[]" id="field_of_study_title1"
                                           class="form-control other-input-top"/>
                                </div>

                                <div class="form-group col-md-2">
                                    <label class="control-label text-center label-height "><strong>گرایش</strong></label>

                                    <select name="orientation_id[]" id="orientation_id1" class="form-control orientation" data-id="1">
                                        <option value="">لطفا گرایش را انتخاب کنید</option>
                                    </select>

                                    <input type="hidden" name="orientation_title[]" id="orientation_title1"
                                           class="form-control other-input-top"/>
                                </div>

                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>معدل</strong></label>
                                    <input name="average[]" id="average" class="form-control" type="number" min="10" max="20"/>
                                </div>

                                <div class="form-group col-md-2">
                                    <label class="control-label text-center label-height "><strong>دانشگاه محل تحصیل</strong></label>

                                    <select name="training_center_id[]" id="training_center_id" class="form-control training_center" data-id="1">
                                        <option value="">لطفا دانشگاه را انتخاب کنید</option>
                                        @foreach( $trainingCenters as $trainingCenter)
                                            <option value="{{$trainingCenter->id}}">{{$trainingCenter->title}}</option>
                                        @endforeach
                                        <option value="other">سایر</option>
                                    </select>

                                    <input type="hidden" name="training_center_title[]" id="training_center_title1"
                                           class="form-control other-input-top"/>
                                </div>

                                <div class="form-group col-md-2">
                                    <label class="control-label text-center label-height "><strong>کشور محل تحصیل</strong></label>

                                    <select name="country_id[]" id="country_id" class="form-control country" data-id="1">
                                        <option value="">لطفا کشور محل تحصیل را انتخاب کنید</option>
                                        @foreach( $countries as $country)
                                            <option value="{{$country->id}}">{{$country->title}}</option>
                                        @endforeach
                                        <option value="other">سایر</option>
                                    </select>

                                    <input type="hidden" name="country_title[]" id="country_title1"
                                           class="form-control other-input-top"/>
                                </div>

                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>تاریخ شروع</strong></label>

                                    <input type="date" name="start_date[]" id="start_date" class="form-control"/>
                                </div>

                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height {{--{{$seminaryAcademicDegree->id==1?"display-block":"display-none"}}--}}"><strong>تاریخ پایان</strong></label>

                                    <input type="date" name="end_date[]" id="end_date" class="form-control"/>
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

                $("#row"+val+" label").addClass('display-none');

                $("#row"+val+" .field-of-study").attr('data-id',val);
                $("#row"+val+" .orientation").attr('data-id',val);
                $("#row"+val+" .training_center").attr('data-id',val);
                $("#row"+val+" .country").attr('data-id',val);


                $("#row"+val+" #orientation_id1").attr('id',"orientation_id"+val);

                $("#row"+val+" #training_center_id").attr('id',"training_center_id"+val);
                $("#row"+val+" #country_id").attr('id',"country_id"+val);

                $("#row"+val+" #orientation_title1").attr('id',"orientation_title"+val);
                $("#row"+val+" #field_of_study_title1").attr('id',"field_of_study_title"+val);
                $("#row"+val+" #training_center_title1").attr('id',"training_center_title"+val);
                $("#row"+val+" #country_title1").attr('id',"country_title"+val);

                $("#row"+val+" #orientation_title" + val).prop("type", "hidden");
                $("#row"+val+" #field_of_study_title" + val).prop("type", "hidden");
                $("#row"+val+" #training_center_title" + val).prop("type", "hidden");
                $("#row"+val+" #country_title" + val).prop("type", "hidden");

                $("#row_count").val(val);
            });


            $(document).on('change', '.field-of-study', function() {

                var id = $(this).data('id');
                var fieldOfStudyId= $(this).val();

                if (fieldOfStudyId) {
                    $.ajax({
                        type: "GET",
                        url: "/alumni/getOrientationList/"+fieldOfStudyId,
                        success: function (res) {

                            if (res) {
                                $("#orientation_id"+id).empty();
                                $("#orientation_id"+id).append('<option>لطفا گرایش را انتخاب کنید</option>');
                                $.each(res, function (key, value) {
                                    $("#orientation_id"+id).append('<option value="' + key + '">' + value + '</option>');
                                });
                                $("#orientation_id"+id).append('<option value="other">سایر</option>');

                                $("#orientation_title" + id).prop("type", "hidden");

                            } else {
                                $("#orientation_id"+id).empty();
                            }
                        }
                    });
                } else {
                    $("#orientation_id"+id).empty();
                }

                if ($(this).val()==='other') {

                    $('#field_of_study_title' + id).prop("type", "text");
                } else {
                    $('#field_of_study_title' + id).prop("type", "hidden");
                }
            });

            $(document).on('change', '.orientation', function () {
                var id = $(this).data('id');
                if ($(this).val()==='other') {
                    $('#orientation_title' + id).prop("type", "text");
                } else {
                    $('#orientation_title' + id).prop("type", "hidden");
                }
            });

            $(document).on('change', '.training_center', function () {
                var id = $(this).data('id');
                if ($(this).val()==='other') {
                    $('#training_center_title' + id).prop("type", "text");
                } else {
                    $('#training_center_title' + id).prop("type", "hidden");
                }
            });

            $(document).on('change', '.country', function () {
                var id = $(this).data('id');
                if ($(this).val()==='other') {
                    $('#country_title' + id).prop("type", "text");
                } else {
                    $('#country_title' + id).prop("type", "hidden");
                }
            });




            $('form').on('submit',function () {

                $("#client_error").children().remove();

                var has_empty = false;

                $(this).find('select').each(function () {
                    var id = $(this).data('id');
                    if ($(this).val()/*find("option:selected").text() === "سایر"*/==='other') {
                        switch ($(this).attr('id')) {
                            case "training_center_id"+id:
                                if (!$('#training_center_title' + id).val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا محل تحصیل را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                            case "field_of_study_id"+id:
                                if (!$('#field_of_study_title' + id).val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا رشته را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                            case "orientation_id"+id:
                                if (!$('#orientation_title' + id).val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا گرایش را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                            case "country_id"+id:
                                if (!$('#country_title' + id).val()) {
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
