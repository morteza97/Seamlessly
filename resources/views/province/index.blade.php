@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست دانشکده</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-2">
                <p>
                    <a class="btn btn-primary" href="{{route('province.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام کشور
                        </th>
                        <th>
                            نام استان
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($provinces as $province)
                                <tr>
                                    <td>
                                        <a href="{{route('province.detail',[$province->id])}}">
                                            {{$province->country->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('province.detail',[$province->id])}}">
                                            {{$province->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('province.delete',[$province->id])}}" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a href="{{route('province.edit',[$province->id])}}" class="btn btn-warning">
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
