@extends('layouts.app')
@section('content')
    <h3>لیست رشته</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <table class="table float-right">
                    <thead>
                    <tr>
                        <th>
                            نام جدول
                        </th>
                        <th>
                            نام فیلد
                        </th>
                        <th>
                            شماره رکورد
                        </th>
                        <th>
                            مقدار
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($fieldOtherValues as $fieldOtherValue)
                                <tr>
                                    <td>
                                        <a href="{{route('field_other_value.detail',[$fieldOtherValue->id])}}">
                                            {{$fieldOtherValue->table_title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('field_other_value.detail',[$fieldOtherValue->id])}}">
                                            {{$fieldOtherValue->field_title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('field_other_value.detail',[$fieldOtherValue->id])}}">
                                            {{$fieldOtherValue->record_id}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('field_other_value.detail',[$fieldOtherValue->id])}}">
                                            {{$fieldOtherValue->new_value}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('field_other_value.reference',[$fieldOtherValue->id])}}" class="btn btn-primary">
                                            جدول مرجع
                                        </a>
                                        <a href="{{route('field_other_value.edit',[$fieldOtherValue->id])}}" class="btn btn-warning">
                                            اعمال در {{$fieldOtherValue->table_title}}
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
