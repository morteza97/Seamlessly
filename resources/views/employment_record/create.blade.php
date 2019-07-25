@extends('layouts.app')
@section('content')
    <h4 class="section-header">سوابق اشتغال</h4>
    <section class="section-padding">
        <nav>
            <ol class="cd-breadcrumb triangle">
                <li><label>مشخصات متقاضی</label></li>
                <li><label>سوابق تحصیلات حوزوی</label></li>
                <li><label>سوابق تحصیلات دانشگاهی</label></li>
                <li><label>سوابق آموزشی</label></li>
                <li><label>سوابق پژوهشی</label></li>
                <li><label>سوابق تبلیغی</label></li>
                <li class="current"><label>سوابق اشتغال</label></li>
                <li><label>مجوز تدریس دروس معارف</label></li>
                <li><label>مجوز تبلیغ در دانشگاه ها</label></li>
                <li><label>معرفان علمی</label></li>
            </ol>
        </nav>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('employment_record.store')}}">
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
                                    <label class="control-label text-center label-height "><strong>نام محل کار</strong></label>
                                    <input name="workplace_name[]" id="workplace_name" class="form-control"/>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>نوع مسئولیت</strong></label>
                                    <select name="responsibility_type_id[]" id="responsibility_type_id1"
                                            class="form-control responsibility_type" data-id="1">
                                        <option value="">لطفا نوع مسئولیت را انتخاب کنید</option>
                                        @foreach($responsibilityTypes as $responsibilityType)
                                            <option value="{{$responsibilityType->id}}">{{$responsibilityType->title}}</option>
                                        @endforeach
                                        <option value="other">سایر</option>
                                    </select>

                                    <input type="hidden" name="responsibility_type_title[]" id="responsibility_type_title1"
                                           class="form-control other-input-top"/>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>استان</strong></label>
                                    <select name="province_id[]" id="province_id1" class="form-control province"
                                            data-id="1">
                                        <option value="">لطفا استان را انتخاب کنید</option>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id}}">{{$province->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>شهرستان</strong></label>
                                    <select name="city_id[]" id="city_id1" class="form-control city"
                                            data-id="1">
                                        <option value="">لطفا شهرستان را انتخاب کنید</option>
                                        <option value="other">سایر</option>
                                    </select>

                                    <input type="hidden" name="city_title[]" id="city_title1"
                                           class="form-control other-input-top"/>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>تاریخ شروع</strong></label>
                                    <input type="date" name="start_date[]" id="start_date" class="form-control"/>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="control-label text-center label-height "><strong>تاریخ پایان</strong></label>
                                    <input type="date" name="end_date[]" id="end_date" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label text-center label-height "><strong>نشانی موسسه</strong></label>
                                    <input name="address[]" id="address" class="form-control"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="control-label text-center label-height "><strong>تلفن</strong></label>
                                    <input name="phone[]" id="phone" class="form-control"/>
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

                $("#row"+val+" .responsibility_type").attr('data-id',val);
                $("#row"+val+" #responsibility_type_title1").attr('id',"responsibility_type_title"+val);

                $("#row"+val+" .province").attr('data-id',val);

                $("#row"+val+" #city_id1").attr('id',"city_id"+val);
                $("#row"+val+" .city").attr('data-id',val);
                $("#row"+val+" #city_title1").attr('id',"city_title"+val);

                $("#row"+val+" #city_title" + val).prop("type", "hidden");
                $("#row"+val+" #responsibility_type_title" + val).prop("type", "hidden");

                $("#row_count").val(val);
            });

            $(document).on('change', '.province', function() {
                var id = $(this).data('id');
                var provinceId = $(this).val();

                if (provinceId) {
                    $.ajax({
                        type: "GET",
                        url: "/alumni/getCityList/"+provinceId,
                        success: function (res) {

                            if (res) {

                                $("#city_id"+id).empty();
                                $("#city_id"+id).append('<option>لطفا شهرستان را انتخاب کنید</option>');

                                $.each(res, function (key, value) {

                                    $("#city_id"+id).append('<option value="' + key + '">' + value + '</option>');
                                });

                                $("#city_id"+id).append('<option value="other">سایر</option>');

                                $("#city_title" + id).prop("type", "hidden");

                            } else {
                                $("#city_id"+id).empty();
                            }
                        }
                    });
                } else {
                    $("#city_id"+id).empty();
                }

            });

            $(document).on('change', '.responsibility_type', function () {
                var id = $(this).data('id');
                if ($(this).val()==='other') {
                    $('#responsibility_type_title' + id).prop("type", "text");
                } else {
                    $('#responsibility_type_title' + id).prop("type", "hidden");
                }
            });

            $(document).on('change', '.city', function () {
                var id = $(this).data('id');
                if ($(this).val()==='other') {
                    $('#city_title' + id).prop("type", "text");
                } else {
                    $('#city_title' + id).prop("type", "hidden");
                }
            });

            $('form').on('submit',function () {

                $("#client_error").children().remove();

                var has_empty = false;

                $(this).find('select').each(function () {
                    var id = $(this).data('id');
                    if ($(this).val()==='other') {
                        switch ($(this).attr('id')) {
                            case "responsibility_type_id"+id:
                                if (!$('#responsibility_type_title' + id).val()) {
                                    $("#client_error").append('<label class="text-danger">لطفا نوع مسئولیت را وارد کنید</label>');
                                    has_empty = true;
                                    return false;
                                }
                                break;
                            case "city_id"+id:
                                if (!$('#city_title' + id).val()) {
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
