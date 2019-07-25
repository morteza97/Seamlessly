@extends('layouts.app')
@section('content')
    <h3>ویرایش نام تحصیلات دانشگاهی</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('college_education.update',[$collegeEducation->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label class="control-label"><strong>نام تحصیلات دانشگاهی</strong></label>
                        <input class="form-control" id="title" name="title" value="{{$collegeEducation->title}}"/>
                    </div>
                    <div class="form-group">
                        <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
