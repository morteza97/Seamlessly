@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست مقاطع</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <p>
                    <a class="btn btn-primary" href="{{route('grade.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام مقطع
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($grades as $grade)
                                <tr>
                                    <td>
                                <a href="{{route('grade.detail',[$grade->id])}}">
                                    {{$grade->title}}
                                </a>
                                    </td>
                                    <td>
                                <a href="{{route('grade.delete',[$grade->id])}}" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('grade.edit',[$grade->id])}}" class="btn btn-warning">
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
