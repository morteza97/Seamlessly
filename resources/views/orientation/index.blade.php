@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست گرایش ها</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-2">
                <p>
                    <a class="btn btn-primary" href="{{route('orientation.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام رشته
                        </th>
                        <th>
                            نام گرایش
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($orientations as $orientation)
                                <tr>
                                    <td>
                                        <a href="{{route('orientation.detail',[$orientation->id])}}">
                                            {{$orientation->fieldOfStudy->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('orientation.detail',[$orientation->id])}}">
                                            {{$orientation->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('orientation.delete',[$orientation->id])}}" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a href="{{route('orientation.edit',[$orientation->id])}}" class="btn btn-warning">
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
