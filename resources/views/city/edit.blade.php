@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">ویرایش شهر</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('city.update',[$city->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label class="control-label"><strong>نام کشور</strong></label>
                        <select class="form-control" id="country_id" name="country_id" >
                            <option value="">لطفا کشور را انتخاب کنید</option>
                            @foreach($countries as $country)

                                @if ($country->id==$city->province->country_id)
                                    <option value="{{$country->id}}" selected>{{$country->title}}</option>
                                @else
                                    <option value="{{$country->id}}">{{$country->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>نام استان</strong></label>
                        <select class="form-control" id="province_id" name="province_id" >
                            <option value="">لطفا استان را انتخاب کنید</option>
                            @foreach($provinces as $province)
                                @if ($province->id==$city->province_id)
                                    <option value="{{$province->id}}" selected>{{$province->title}}</option>
                                @else
                                <option value="{{$province->id}}">{{$province->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>نام شهر</strong></label>
                        <input class="form-control" id="title" name="title" value="{{$city->title}}"/>
                    </div>
                    <div class="form-group">
                        <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $("#country_id").change(function () {
                // alert('changed');

                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: "GET",
                        url: "/city/getProvinceList/"+countryID,
                        success: function (res) {
                            if (res) {
                                $("#province_id").empty();
                                $("#province_id").append('<option>لطفا استان را انتخاب کنید</option>');
                                $.each(res, function (key, value) {
                                    $("#province_id").append('<option value="' + key + '">' + value + '</option>');
                                });

                            } else {
                                $("#province_id").empty();
                            }
                        }
                    });
                } else {
                    $("#province_id").empty();
                }

            });
        });
    </script>
@endsection
