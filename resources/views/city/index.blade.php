@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست شهر</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-2">
                <p>
                    <a class="btn btn-primary" href="{{route('city.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام استان
                        </th>
                        <th>
                            نام شهر
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                                <tr>
                                    <td>
                                        <a href="{{route('city.detail',[$city->id])}}">
                                            {{$city->province->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('city.detail',[$city->id])}}">
                                            {{$city->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('city.delete',[$city->id])}}" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a href="{{route('city.edit',[$city->id])}}" class="btn btn-warning">
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
