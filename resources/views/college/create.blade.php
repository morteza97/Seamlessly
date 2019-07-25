@extends('layouts.app')
@section('content')
    <h3>درج مشخصات دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('college.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label"><strong>نام دانشگاه</strong></label>
                        <select class="form-control" id="university_id" name="university_id">
                            <option value="">لطفا دانشگاه را انتخاب کنید</option>
                            @foreach($universities as $university)
                            <option value="{{$university->id}}">{{$university->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>نام دانشکده</strong></label>
                        <input class="form-control" id="title" name="title"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>تلفن</strong></label>
                        <input class="form-control" id="phone" name="phone"/>
                    </div>
                    <div class="form-group">
                        <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
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

