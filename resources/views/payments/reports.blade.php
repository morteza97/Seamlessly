@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row margin-top-50">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">گزارش براساس...</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('paymentsCase.store')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="control-label"><strong>عنوان</strong></label>
                        <select name="case_id" class="form-control">
                            @foreach($cases as $case)
                                <option value="{{$case->id}}">{{$case->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>از تاریخ:</label>
                        <input type="text" name="start_text" id="start_text"
                               class="form-control DatePicker-input" placeholder="انتخاب تاریخ"
                               aria-label="date1" aria-describedby="date1" autocomplete="off">
                        <input type="hidden" id="start_date" name="start_date"
                               class="form-control" placeholder="Persian Calendar Date"
                               aria-label="date11" aria-describedby="date11" autocomplete="off">
                        <div class="input-group-prepend">
                            <span class="input-group-text cursor-pointer DatePicker-icon" id="date1">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>تا تاریخ:</label>
                        <input type="text" name="end_text" id="end_text"
                               class="form-control DatePicker-input" placeholder="انتخاب تاریخ"
                               aria-label="date2" aria-describedby="date2" autocomplete="off">
                        <input type="hidden" id="end_date" name="end_date"
                               class="form-control" placeholder="Persian Calendar Date"
                               aria-label="date12" aria-describedby="date12" autocomplete="off">
                        <div class="input-group-prepend">
                            <span class="input-group-text cursor-pointer DatePicker-icon" id="date2">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit"  value="جستجو" class="btn btn-success col-md-12"/>
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

        <div class="row">
            <table class="table table-bordered table-striped {{ count($PaymentList) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>کد ملی</th>
                    <th>شماره موبایل</th>
                    <th>شماره سریال</th>
                    <th>شماره خرید</th>
                    <th>شماره تراکنش</th>
                    <th>شماره مرجع</th>
                    <th>هزینه</th>
                    <th>تاریخ پرداخت</th>

                </tr>
                </thead>

                <tbody>
                @if (count($PaymentList) > 0)
                    @foreach ($PaymentList as $payment)
                        <tr>
                            <td>{{ $payment->name }}</td>
                            <td>{{ $payment->family }}</td>
                            <td>{{ $payment->code_meli }}</td>
                            <td>{{ $payment->mobile }}</td>
                            <td>{{ $payment->serial_number }}</td>
                            <td>{{ $payment->OrderId }}</td>
                            <td>{{ $payment->TraceNo }}</td>
                            <td>{{ $payment->RefNo }}</td>
                            <td>{{ $payment->price }}</td>
                            <td>{{ $payment->date }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">موردی یافت نشد</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#date1').MdPersianDateTimePicker({
                targetTextSelector: '#start-text',
                targetDateSelector: '#start-date',
                enableTimePicker: false,
                dateFormat: 'yyyy-MM-dd',
                textFormat: 'yyyy-MM-dd ',
            });

            $('#date2').MdPersianDateTimePicker({
                targetTextSelector: '#end-text',
                targetDateSelector: '#end-date',
                enableTimePicker: false,
                dateFormat: 'yyyy-MM-dd',
                textFormat: 'yyyy-MM-dd ',
            });
        });
    </script>

@endsection
