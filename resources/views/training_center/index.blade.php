@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست دانشگاه</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-2">
                <p>
                    <a class="btn btn-primary" href="{{route('training_center.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نوع مرکز
                        </th>
                        <th>
                            نام مرکز
                        </th>
                        <th>
                            آدرس
                        </th>
                        <th>
                            تلفن
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($trainingCenters as $trainingCenter)
                                <tr>
                                    <td>
                                        <a href="{{route('training_center',[$trainingCenter->id])}}">
                                            {{$trainingCenter->trainingCenterType->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('training_center',[$trainingCenter->id])}}">
                                            {{$trainingCenter->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('training_center.detail',[$trainingCenter->id])}}">
                                            {{$trainingCenter->address}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('training_center.detail',[$trainingCenter->id])}}">
                                            {{$trainingCenter->phone}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('training_center.delete',[$trainingCenter->id])}}" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a href="{{route('training_center.edit',[$trainingCenter->id])}}" class="btn btn-warning">
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
