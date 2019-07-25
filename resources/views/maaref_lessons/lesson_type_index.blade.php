@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست نوع دروس</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <p>
                    <a class="btn btn-primary" href="{{route('lesson_types.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نوع درس
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($lessons_type as $type)
                                <tr>
                                    <td>
                                <a href="{{route('lesson_types.detail',[$type->id])}}">
                                    {{$type->title}}
                                </a>
                                    </td>
                                    <td>
                                <a href="{{route('lesson_types.delete',[$type->id])}}" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('lesson_types.edit',[$type->id])}}" class="btn btn-warning">
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
