@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">ویرایش نام جنسیت درس</h3>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('lesson_genders.update',[$lessonGender->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label class="control-label"><strong>نام جنسیت درس</strong></label>
                        <input class="form-control" id="title" name="title" value="{{$lessonGender->title}}"/>
                    </div>
                    <div class="form-group">
                        <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
