@extends('layouts.app')
@section('content')
    <h3>ویرایش مشخصات دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <form method="post" action="{{route('employment_record.update',[$employmentRecord->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row" id="row1">
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>نام محل کار</strong></label>
                            <input name="workplace_name" id="workplace_name" class="form-control"
                                   value="{{$employmentRecord->workplace_name}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>نوع مسئولیت</strong></label>
                            <select name="responsibility_type_id" id="responsibility_type_id"
                                    class="form-control responsibility_type">
                                <option value="">لطفا نوع مسئولیت را انتخاب کنید</option>
                                @foreach($responsibilityTypes as $responsibilityType)
                                    @if ($responsibilityType->id==$employmentRecord->responsibility_type_id)
                                        <option value="{{$responsibilityType->id}}" selected>{{$responsibilityType->title}}</option>
                                    @else
                                        <option value="{{$responsibilityType->id}}">{{$responsibilityType->title}}</option>
                                    @endif
                                @endforeach
                                <option value="other">سایر</option>
                            </select>

                            <input type="hidden" name="responsibility_type_title" id="responsibility_type_title"
                                   class="form-control other-input-top"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>استان</strong></label>
                            <select name="province_id" id="province_id" class="form-control province">
                                <option value="">لطفا استان را انتخاب کنید</option>
                                @foreach($provinces as $province)
                                    @if ($province->id==$employmentRecord->city->province_id)
                                        <option value="{{$province->id}}" selected>{{$province->title}}</option>
                                    @else
                                        <option value="{{$province->id}}">{{$province->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>شهرستان</strong></label>
                            <select name="city_id" id="city_id" class="form-control city"
                                   >
                                <option value="">لطفا شهرستان را انتخاب کنید</option>
                                @foreach($cities as $city)
                                    @if ($city->id==$employmentRecord->city_id)
                                        <option value="{{$city->id}}" selected>{{$city->title}}</option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->title}}</option>
                                    @endif
                                @endforeach
                                <option value="other">سایر</option>
                            </select>

                            <input type="hidden" name="city_title" id="city_title"
                                   class="form-control other-input-top"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>تاریخ شروع</strong></label>
                            <input type="date" name="start_date" id="start_date" class="form-control"
                                   value="{{$employmentRecord->start_date}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>تاریخ پایان</strong></label>
                            <input type="date" name="end_date" id="end_date" class="form-control"
                                   value="{{$employmentRecord->end_date}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>نشانی موسسه</strong></label>
                            <input name="address" id="address" class="form-control"
                                   value="{{$employmentRecord->address}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label "><strong>تلفن</strong></label>
                            <input name="phone" id="phone" class="form-control"
                                   value="{{$employmentRecord->phone}}"/>
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

            $(document).on('change', '.province', function() {
                
                var provinceId = $(this).val();

                if (provinceId) {
                    $.ajax({
                        type: "GET",
                        url: "/alumni/getCityList/"+provinceId,
                        success: function (res) {

                            if (res) {

                                $("#city_id").empty();
                                $("#city_id").append('<option>لطفا شهرستان را انتخاب کنید</option>');

                                $.each(res, function (key, value) {

                                    $("#city_id").append('<option value="' + key + '">' + value + '</option>');
                                });

                                $("#city_id").append('<option value="other">سایر</option>');

                                $("#city_title").prop("type", "hidden");

                            } else {
                                $("#city_id").empty();
                            }
                        }
                    });
                } else {
                    $("#city_id").empty();
                }

            });

            $(document).on('change', '.responsibility_type', function () {
                
                if ($(this).val()==='other') {
                    $('#responsibility_type_title').prop("type", "text");
                } else {
                    $('#responsibility_type_title').prop("type", "hidden");
                }
            });

            $(document).on('change', '.city', function () {
                
                if ($(this).val()==='other') {
                    $('#city_title').prop("type", "text");
                } else {
                    $('#city_title').prop("type", "hidden");
                }
            });

            $('form').on('submit',function () {

                $("#client_error").children().remove();

                var has_empty = false;

                $(this).find('select').each(function () {
                    
                    if ($(this).val()==='other') {
                        switch ($(this).attr('id')) {
                            case "responsibility_type_id":
                                if (!$('#responsibility_type_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا نوع مسئولیت را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                            case "city_id":
                                if (!$('#city_title').val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا شهرستان را وارد کنید</label>');
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
