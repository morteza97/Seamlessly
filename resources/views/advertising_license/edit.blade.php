@extends('layouts.app')
@section('content')
    <h3>ویرایش مشخصات دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('advertising_license.update',[$advertisingLicense->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label "><strong>شماره پرونده</strong></label>
                            <input name="file_number" id="file_number" class="form-control"
                                   value="{{$advertisingLicense->file_number}}"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label "><strong>شماره مجوز</strong></label>
                            <input name="license_number" id="license_number" class="form-control"
                                   value="{{$advertisingLicense->license_number}}"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label "><strong>تاریخ صدور</strong></label>
                            <input type="date"  name="issue_date" id="issue_date" class="form-control"
                                   value="{{$advertisingLicense->issue_date}}"/>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                        </div>
                    </div>
                </form>
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-danger">
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
