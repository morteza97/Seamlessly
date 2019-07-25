@extends('layouts.app')
@section('content')
    <h3>لیست دانشجویان</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                نام
                            </th>
                            <th>
                                نام خانوادگی
                            </th>
                            <th>
                                نام پدر
                            </th>
                            <th>
                                شماره شناسنامه
                            </th>
                            <th>
                                محل تولد
                            </th>
                            <th>
                                محل صدور
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alumniAssociations as $alumniAssociation)
                            <tr>
                                <td>
                                    <a href="{{route('alumni_detail',[$alumniAssociation->id])}}">
                                        {{$alumniAssociation->user->FirstName}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('alumni_detail',[$alumniAssociation->id])}}">
                                    {{$alumniAssociation->user->LastName}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('alumni_detail',[$alumniAssociation->id])}}">
                                    {{$alumniAssociation->father_name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('alumni_detail',[$alumniAssociation->id])}}">
                                    {{$alumniAssociation->birth_certificate_number}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('alumni_detail',[$alumniAssociation->id])}}">
                                    {{$alumniAssociation->birth_place}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('alumni_detail',[$alumniAssociation->id])}}">
                                    {{$alumniAssociation->issue_place}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('field_other_value.edit',[$alumniAssociation->id])}}" class="btn btn-warning">
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
    </div>
@endsection
