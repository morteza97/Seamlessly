@extends('layouts.app')
@section('content')
    <h3>لیست تحصیلات دانشگاهی</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <p>
                    <a class="btn btn-primary" href="{{route('college_education.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام تحصیلات دانشگاهی
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($collegeEducations as $collegeEducation)
                                <tr>
                                    <td>
                                        <a href="{{route('college_education.detail',[$collegeEducation->id])}}">
                                            {{$collegeEducation->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('college_education.delete',[$collegeEducation->id])}}" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a href="{{route('college_education.edit',[$collegeEducation->id])}}" class="btn btn-warning">
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
