@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">لیست وضعیت نظام وظیفه</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <p>
                    <a class="btn btn-primary" href="{{route('public_conscription_status.create')}}">جدید</a>
                </p>
                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            عنوان وضعیت نظام وظیفه
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($publicConscriptionStatuses as $publicConscriptionStatus)
                                <tr>
                                    <td>
                                <a href="{{route('public_conscription_status.detail',[$publicConscriptionStatus->id])}}">
                                    {{$publicConscriptionStatus->title}}
                                </a>
                                    </td>
                                    <td>
                                <a href="{{route('public_conscription_status.delete',[$publicConscriptionStatus->id])}}" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('public_conscription_status.edit',[$publicConscriptionStatus->id])}}" class="btn btn-warning">
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
