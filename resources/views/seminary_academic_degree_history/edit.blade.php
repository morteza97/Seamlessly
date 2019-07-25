@extends('layouts.app')
@section('content')
    <h3>ویرایش مشخصات دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('seminary_academic_degree_history.update',[$seminaryAcademicDegreeHistory->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row">

                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>مقطع تحصیلی</strong></label>
                        <input name="seminary_academic_degree_name" readonly id="seminary_academic_degree_name" class="form-control"
                               value="{{$seminaryAcademicDegreeHistory->seminaryAcademicDegree->title}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>رشته</strong></label>
                        <select name="seminary_field_of_study_id" id="seminary_field_of_study_id" class="form-control">
                            <option value="">لطفا رشته را انتخاب کنید</option>
                            @foreach( $seminaryFieldOfStudies as $seminaryFieldOfStudy)
                                @if ($seminaryFieldOfStudy->id==$seminaryAcademicDegreeHistory->seminary_field_of_study_id)
                                    <option value="{{$seminaryFieldOfStudy->id}}" selected>{{$seminaryFieldOfStudy->title}}</option>
                                @else
                                    <option value="{{$seminaryFieldOfStudy->id}}">{{$seminaryFieldOfStudy->title}}</option>
                                @endif
                            @endforeach
                            <option value="other">سایر</option>
                        </select>

                        <input name="seminary_field_of_study_title" type="hidden" id="seminary_field_of_study_title"
                               class="form-control other-input-top"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>معدل</strong></label>
                        <input name="average" id="average" class="form-control" type="number" min="10" max="20"
                               value="{{$seminaryAcademicDegreeHistory->average}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>محل تحصیل</strong></label>
                        <select name="training_center_id" id="training_center_id" class="form-control">
                            <option value="">لطفا محل تحصیل را انتخاب کنید</option>
                            @foreach( $trainingCenters as $trainingCenter)
                                @if ($trainingCenter->id==$seminaryAcademicDegreeHistory->training_center_id)
                                    <option value="{{$trainingCenter->id}}" selected>{{$trainingCenter->title}}</option>
                                @else
                                    <option value="{{$trainingCenter->id}}">{{$trainingCenter->title}}</option>
                                @endif
                            @endforeach
                            <option value="other">سایر</option>
                        </select>

                        <input name="training_center_title" id="training_center_title"
                               class="form-control other-input-top display-none"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>تاریخ شروع</strong></label>
                        <input type="date" name="start_date" id="start_date" class="form-control"
                               value="{{$seminaryAcademicDegreeHistory->start_date}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>تاریخ پایان</strong></label>
                        <input type="date" name="end_date" id="end_date" class="form-control"
                               value="{{$seminaryAcademicDegreeHistory->end_date}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>مدرک رسمی</strong></label>
                        <input type="hidden" name="official_document" id="official_document" class="form-control"
                               value="{{$seminaryAcademicDegreeHistory->official_document}}"/>
                        <input type="checkbox" name="official_document1" id="official_document"
                               class="form-control official_document"
                               checked="{{$seminaryAcademicDegreeHistory->official_document==1}}"/>
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
    </div>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#seminary_field_of_study_id', function () {
                if ($(this).val()/*find("option:selected").text() === "سایر"*/==='other') {
                    $('#seminary_field_of_study_title').prop("type", "text");
                } else {
                    $('#seminary_field_of_study_title').prop("type", "hidden");
                }
            });

            $(document).on('change', '#training_center_id', function () {
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
                        switch ($(this).attr('id')) {
                            case "seminary_field_of_study_id":
                                if (!$('#seminary_field_of_study_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا رشته را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                            case "training_center_id":
                                if (!$('#training_center_title').val()) {
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
