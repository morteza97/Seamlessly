@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست جنسیت دروس</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <p>
                    <a class="btn btn-primary" href="{{route('lesson_genders.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام جنسیت درس
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($lessons_gender as $lesson)
                                <tr>
                                    <td>
                                <a href="{{route('lesson_genders.detail',[$lesson->id])}}">
                                    {{$lesson->title}}
                                </a>
                                    </td>
                                    <td>
                                <a href="{{route('lesson_genders.delete',[$lesson->id])}}" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('lesson_genders.edit',[$lesson->id])}}" class="btn btn-warning">
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
