@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست نوع مرکز آموزشی</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <p>
                    <a class="btn btn-primary" href="{{route('training_center_type.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            عنوان نوع مرکز آموزشی
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($trainingCenterTypes as $trainingCenterType)
                                <tr>
                                    <td>
                                <a href="{{route('training_center_type.detail',[$trainingCenterType->id])}}">
                                    {{$trainingCenterType->title}}
                                </a>
                                    </td>
                                    <td>
                                <a href="{{route('training_center_type.delete',[$trainingCenterType->id])}}" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('training_center_type.edit',[$trainingCenterType->id])}}" class="btn btn-warning">
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
