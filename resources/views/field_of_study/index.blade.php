@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست رشته ها</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <p>
                    <a class="btn btn-primary" href="{{route('field_of_study.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام رشته
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($fieldOfStudies as $fieldOfStudy)
                                <tr>
                                    <td>
                                <a href="{{route('field_of_study.detail',[$fieldOfStudy->id])}}">
                                    {{$fieldOfStudy->title}}
                                </a>
                                    </td>
                                    <td>
                                <a href="{{route('field_of_study.delete',[$fieldOfStudy->id])}}" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('field_of_study.edit',[$fieldOfStudy->id])}}" class="btn btn-warning">
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
