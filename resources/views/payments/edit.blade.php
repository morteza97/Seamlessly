@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row margin-top-50">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">ویرایش نام مذهب</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">

                <form method="post" action="{{route('paymentsCase.update',[$case->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label class="control-label"><strong>عنوان</strong></label>
                        <input class="form-control" id="title" name="title" value="{{$case->title}}"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>انتخاب شناسه پرداخت</strong></label>
                        <select name="PaymentID" class="form-control">
                            <option value="343045976113633000000001049001"
                                    {{$case->PaymentID == "343045976113633000000001049001" ? 'selected' : ''}}>بورسیه</option>
                            <option value="328045976113633000000001049002"
                                    {{$case->PaymentID == "328045976113633000000001049002" ? 'selected' : ''}}>آزمون دکتری</option>
                            <option value="334045976113633000000001049003"
                                    {{$case->PaymentID == "334045976113633000000001049003" ? 'selected' : ''}}>آزمون کارشناسی ارشد</option>
                            <option value="361045976113633000000001049004"
                                    {{$case->PaymentID == "361045976113633000000001049004" ? 'selected' : ''}}>آزمون زبان</option>
                            <option value="310045976113633000000001049005"
                                    {{$case->PaymentID == "310045976113633000000001049005" ? 'selected' : ''}}>پذیرفته شده های نهایی ارشد</option>
                            <option value="379045976113633000000001049006"
                                    {{$case->PaymentID == "379045976113633000000001049006" ? 'selected' : ''}}>مصاحبه کارشناسی ارشد و دکتری</option>
                            <option value="396045976113633000000001049007"
                                    {{$case->PaymentID == "396045976113633000000001049007" ? 'selected' : ''}}>هزینه صدور مدرک فارغ التحصیلی</option>
                            <option value="396045976113633000000001049008"
                                    {{$case->PaymentID == "396045976113633000000001049008" ? 'selected' : ''}}>برگزاری کارگاه</option>
                            <option value="396045976113633000000001049009"
                                    {{$case->PaymentID == "396045976113633000000001049009" ? 'selected' : ''}}>شهریه دکتری نوبت دوم</option>
                            <option value="396045976113633000000001049010"
                                    {{$case->PaymentID == "396045976113633000000001049010" ? 'selected' : ''}}>تاخیر سنوات</option>
                            <option value="396045976113633000000001049011"
                                    {{$case->PaymentID == "396045976113633000000001049011" ? 'selected' : ''}}>تکنولوژی آموزشی</option>
                            <option value="396045976113633000000001049012"
                                    {{$case->PaymentID == "396045976113633000000001049012" ? 'selected' : ''}}>فصلنامه ها</option>
                            <option value="396045976113633000000001049013"
                                    {{$case->PaymentID == "396045976113633000000001049013" ? 'selected' : ''}}>ژتون غذا</option>
                            <option value="396045976113633000000001049014"
                                    {{$case->PaymentID == "396045976113633000000001049014" ? 'selected' : ''}}>خوابگاه دانشجویی</option>
                            <option value="396045976113633000000001049015"
                                    {{$case->PaymentID == "396045976113633000000001049015" ? 'selected' : ''}}>سایر درامدهای اختصاصی</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>هزینه مورد پرداخت (ریال)</strong></label>
                        <input type="text" name="cost" class="form-control" value="{{$case->cost}}">
                    </div>
                    <div class="form-group">
                        <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
