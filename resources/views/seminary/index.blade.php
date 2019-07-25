@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست حوزه</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-2">
                <p>
                    <a class="btn btn-primary" href="{{route('seminary.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام حوزه
                        </th>
                        <th>
                            آردس
                        </th>
                        <th>
                            تلفن
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($seminaries as $seminary)
                                <tr>
                                    <td>
                                        <a href="{{route('seminary.detail',[$seminary->id])}}">
                                            {{$seminary->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('seminary.detail',[$seminary->id])}}">
                                            {{$seminary->address}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('seminary.detail',[$seminary->id])}}">
                                            {{$seminary->phone}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('seminary.delete',[$seminary->id])}}" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a href="{{route('seminary.edit',[$seminary->id])}}" class="btn btn-warning">
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
