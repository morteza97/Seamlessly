@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">ویرایش نام وضعیت تاهل</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('marital_status.update',[$maritalStatus->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label class="control-label"><strong>نام وضعیت تاهل</strong></label>
                        <input class="form-control" id="title" name="title" value="{{$maritalStatus->title}}"/>
                    </div>
                    <div class="form-group">
                        <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
