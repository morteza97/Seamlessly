@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست مقطع تحصیلی حوزوی</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <p>
                    <a class="btn btn-primary" href="{{route('seminary_academic_degree.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام مقطع تحصیلی حوزوی
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($seminaryAcademicDegrees as $seminaryAcademicDegree)
                                <tr>
                                    <td>
                                <a href="{{route('seminary_academic_degree.detail',[$seminaryAcademicDegree->id])}}">
                                    {{$seminaryAcademicDegree->title}}
                                </a>
                                    </td>
                                    <td>
                                <a href="{{route('seminary_academic_degree.delete',[$seminaryAcademicDegree->id])}}" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('seminary_academic_degree.edit',[$seminaryAcademicDegree->id])}}" class="btn btn-warning">
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
