@extends('layouts.app')
@section('content')
    <h3>ویرایش مشخصات دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <form method="post" action="{{route('advertising_record.update',[$advertisingRecord->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>نوع مرکز تبلیغی</strong></label>
                            <select name="training_center_type_id" id="training_center_type_id"
                                    class="form-control training_center_type">
                                <option value="">لطفا نوع مرکز تبلیغی را انتخاب کنید</option>
                                @foreach( $trainingCenterTypes as $trainingCenterType)
                                    @if ($trainingCenterType->id==$advertisingRecord->trainingCenter->training_center_type_id)
                                        <option value="{{$trainingCenterType->id}}" selected>{{$trainingCenterType->title}}</option>
                                    @else
                                        <option value="{{$trainingCenterType->id}}">{{$trainingCenterType->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>نام مرکز تبلیغی</strong></label>
                            <select name="training_center_id" id="training_center_id"
                                    class="form-control training_center">
                                <option value="">لطفا نام مرکز تبلیغی را انتخاب کنید</option>
                                @foreach( $trainingCenters as $trainingCenter)
                                    @if ($trainingCenter->id==$advertisingRecord->training_center_id)
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
                            <label class="control-label "><strong>محل تبلیغ</strong></label>
                            <select name="advertising_record_place_id" id="advertising_record_place_id"
                                    class="form-control advertising_record_place" >
                                <option value="">لطفا محل تبلیغ را انتخاب کنید</option>
                                @foreach( $advertisingRecordPlaces as $advertisingRecordPlace)
                                    @if ($advertisingRecordPlace->id==$advertisingRecord->advertising_record_place_id)
                                        <option value="{{$advertisingRecordPlace->id}}" selected>{{$advertisingRecordPlace->title}}</option>
                                    @else
                                        <option value="{{$advertisingRecordPlace->id}}">{{$advertisingRecordPlace->title}}</option>
                                    @endif
                                @endforeach
                                <option value="other">سایر</option>
                            </select>

                            <input type="hidden" name="advertising_record_place_title" id="advertising_record_place_title1"
                                   class="form-control other-input-top"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>تاریخ شروع</strong></label>
                            <input type="date" name="start_date" id="start_date" class="form-control"
                                   value="{{$advertisingRecord->start_date}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>تاریخ پایان</strong></label>
                            <input type="date" name="end_date" id="end_date" class="form-control"
                                   value="{{$advertisingRecord->end_date}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>نشانی موسسه</strong></label>
                            <input name="address" id="address" class="form-control" value="{{$advertisingRecord->address}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>تلفن</strong></label>
                            <input name="phone" id="phone" class="form-control" value="{{$advertisingRecord->phone}}"/>
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
                                $("#training_center_id").append('<option>لطفا نام مرکز پژوهشی را انتخاب کنید</option>');
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

            $(document).on('change', '.advertising_record_place', function () {

                if ($(this).val()==='other') {
                    $('#advertising_record_place_title').prop("type", "text");
                } else {
                    $('#advertising_record_place_title').prop("type", "hidden");
                }
            });

            $('form').on('submit',function () {

                $("#client_error").children().remove();

                var has_empty = false;

                $(this).find('select').each(function () {

                    if ($(this).val()==='other') {
                        switch ($(this).attr('id')) {
                            case "training_center_id":
                                if (!$('#training_center_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا نام مرکز تبلیغی را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                            case "advertising_record_place_id":
                                if (!$('#advertising_record_place_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا محل تبلیغ را وارد کنید</label>');
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
