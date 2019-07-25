@extends('layouts.app')
@section('content')
    <h4 class="section-header">مشخصات متقاضی</h4>
    <section class="section-padding">
        <nav>
            <ol class="cd-breadcrumb triangle">
                <li class="current"><label>مشخصات متقاضی</label></li>
                <li><label>سوابق تحصیلات حوزوی</label></li>
                <li><label>سوابق تحصیلات دانشگاهی</label></li>
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
            <div class="col-md-6 offset-md-3 ">
                <form method="post" action="{{route('alumni_store')}}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>نام پدر</strong></label>
                            <input class="form-control" id="father_name" name="father_name"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>شماره شناسنامه</strong></label>
                            <input type="number" maxlength="10" name="birth_certificate_number" id="birth_certificate_number" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>محل تولد</strong></label>
                            <input name="birth_place" id="birth_place" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>محل صدور</strong></label>
                            <input name="issue_place" id="issue_place" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>مذهب</strong></label>
                            <select name="religion_id" id="religion_id" class="form-control">
                                <option value="">لطفا ملیت را انتخاب کنید</option>
                                @foreach( $religions as $religion)
                                    <option value="{{$religion->id}}">{{$religion->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>تابعیت</strong></label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">لطفا ملیت را انتخاب کنید</option>
                                @foreach( $countries as $country)
                                    <option value="{{$country->id}}">{{$country->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>وضعیت تاهل</strong></label>
                            <select name="marital_status_id" id="marital_status_id" class="form-control">
                                <option value="">لطفا وضعیت تاهل را انتخاب کنید</option>
                                @foreach( $maritalStatuses as $maritalStatus)
                                    <option value="{{$maritalStatus->id}}">{{$maritalStatus->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>تلفن محل کار</strong></label>
                            <input name="work_place_phone" id="work_place_phone" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>تلفن منزل</strong></label>
                            <input name="home_phone" id="home_phone" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>تلفن ضروری</strong></label>
                            <input name="required_phone" id="required_phone" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>استان</strong></label>
                            <select class="form-control" id="province_id" name="province_id">
                                <option value="">لطفا استان را انتخاب کنید</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>شهر</strong></label>
                            <select class="form-control" id="city_id" name="city_id">

                            </select>
                            <input type="hidden" name="city_title" id="city_title"
                                   class="form-control other-input-top"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label"><strong>نشانی کامل محل سکونت</strong></label>
                            <input name="home_Address" id="home_Address" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>وضعیت نظام وظیفه</strong></label>
                            <select name="public_conscription_status_id" id="public_conscription_status_id" class="form-control">
                                <option value="">لطفا وضعیت نظام وظیفه را انتخاب کنید</option>
                                @foreach($publicConscriptionStatuses as $publicConscriptionStatus)
                                    <option value="{{$publicConscriptionStatus->id}}">{{$publicConscriptionStatus->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>تاریخ پایان خدمت</strong></label>
                            <input type="date" name="conscription_end_date" id="conscription_end_date" class="form-control"/>
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

            $("#province_id").change(function () {

                var provinceID = $(this).val();
                if (provinceID) {
                    $.ajax({
                        type: "GET",
                        url: "/alumni/getCityList/"+provinceID,
                        success: function (res) {
                            if (res) {
                                $("#city_id").empty();
                                $("#city_id").append('<option>لطفا شهر را انتخاب کنید</option>');
                                $.each(res, function (key, value) {
                                    $("#city_id").append('<option value="' + key + '">' + value + '</option>');
                                });

                                $("#city_id").append('<option value="other">سایر</option>');

                                $("#city_title" ).prop("type", "hidden");
                            } else {
                                $("#city_id").empty();
                            }
                        }
                    });
                } else {
                    $("#city_id").empty();
                }

            });

            $(document).on('change', '#city_id', function () {
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
                    if ("#city_id".val()==="other") {
                        if (!$('#city_title').val()) {
                            $("#client_error").append('<label class="text-danger">لطفا شهر را وارد کنید</label>');
                            has_empty = true;
                            return false;
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
