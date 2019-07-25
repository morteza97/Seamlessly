@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row margin-top-50">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title"> لیست موارد پرداخت</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-2">
                <p>
                    <a class="btn btn-primary" href="{{route('paymentsCase.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>عنوان</th>
                        <th>شماره پرداخت</th>
                        <th>هزینه</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($cases as $case)
                                <tr>
                                    <td>
                                        {{--<a href="{{route('paymentsCase.detail',[$case->id])}}">--}}
                                            {{$case->title}}
                                        {{--</a>--}}
                                    </td>

                                    <td>
                                        {{$case->PaymentID}}
                                    </td>

                                    <td>
                                        {{$case->cost}}
                                    </td>

                                    <td>
                                <a href="{{route('paymentsCase.delete',[$case->id])}}" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('paymentsCase.edit',[$case->id])}}" class="btn btn-warning">
                                    ویرایش
                                </a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
