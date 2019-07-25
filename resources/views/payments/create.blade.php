@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row margin-top-50">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">درج مورد پرداخت</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('paymentsCase.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label"><strong>عنوان</strong></label>
                        <input class="form-control" id="title" name="title"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>انتخاب شناسه پرداخت</strong></label>
                        <select name="PaymentID" class="form-control">
                            <option value="343045976113633000000001049001">بورسیه</option>
                            <option value="328045976113633000000001049002">آزمون دکتری</option>
                            <option value="334045976113633000000001049003">آزمون کارشناسی ارشد</option>
                            <option value="361045976113633000000001049004">آزمون زبان</option>
                            <option value="310045976113633000000001049005">پذیرفته شده های نهایی ارشد</option>
                            <option value="379045976113633000000001049006">مصاحبه کارشناسی ارشد و دکتری</option>
                            <option value="396045976113633000000001049007">هزینه صدور مدرک فارغ التحصیلی</option>
                            <option value="396045976113633000000001049008">برگزاری کارگاه</option>
                            <option value="396045976113633000000001049009">شهریه دکتری نوبت دوم</option>
                            <option value="396045976113633000000001049010">تاخیر سنوات</option>
                            <option value="396045976113633000000001049011">تکنولوژی آموزشی</option>
                            <option value="396045976113633000000001049012">فصلنامه ها</option>
                            <option value="396045976113633000000001049013">ژتون غذا</option>
                            <option value="396045976113633000000001049014">خوابگاه دانشجویی</option>
                            <option value="396045976113633000000001049015">سایر درامدهای اختصاصی</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>هزینه مورد پرداخت (ریال)</strong></label>
                        <input type="text" name="cost" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                    </div>
                </form>
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
@endsection

