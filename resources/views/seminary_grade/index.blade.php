@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست پایه تحصیلی حوزوی</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <p>
                    <a class="btn btn-primary" href="{{route('seminary_grade.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام پایه تحصیلی حوزوی
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($seminaryGrades as $seminaryGrade)
                                <tr>
                                    <td>
                                <a href="{{route('seminary_grade.detail',[$seminaryGrade->id])}}">
                                    {{$seminaryGrade->title}}
                                </a>
                                    </td>
                                    <td>
                                <a href="{{route('seminary_grade.delete',[$seminaryGrade->id])}}" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('seminary_grade.edit',[$seminaryGrade->id])}}" class="btn btn-warning">
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
