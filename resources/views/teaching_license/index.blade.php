@extends('layouts.app')
@section('content')
    <h3>لیست دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <p>
                    <a class="btn btn-primary" href="{{route('college.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام دانشگاه
                        </th>
                        <th>
                            نام دانشکده
                        </th>
                        <th>
                            تلفن
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($colleges as $college)
                                <tr>
                                    <td>
                                        <a href="{{route('college.detail',[$college->id])}}">
                                            {{$college->university->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('college.detail',[$college->id])}}">
                                            {{$college->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('college.detail',[$college->id])}}">
                                            {{$college->phone}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('college.delete',[$college->id])}}" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a href="{{route('college.edit',[$college->id])}}" class="btn btn-warning">
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
