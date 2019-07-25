@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست مذهب</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <p>
                    <a class="btn btn-primary" href="{{route('religion.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام مذهب
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($religions as $religion)
                                <tr>
                                    <td>
                                <a href="{{route('religion.detail',[$religion->id])}}">
                                    {{$religion->title}}
                                </a>
                                    </td>
                                    <td>
                                <a href="{{route('religion.delete',[$religion->id])}}" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('religion.edit',[$religion->id])}}" class="btn btn-warning">
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
