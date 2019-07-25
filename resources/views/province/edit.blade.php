@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">ویرایش استان</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('province.update',[$province->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label class="control-label"><strong>نام کشور</strong></label>
                        <select class="form-control" id="country_id" name="country_id" >
                            <option value="">لطفا کشور را انتخاب کنید</option>
                            @foreach($countries as $country)

                                @if ($country->id==$province->country_id)
                                    <option value="{{$country->id}}" selected>{{$country->title}}</option>
                                @else
                                <option value="{{$country->id}}">{{$country->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>نام استان</strong></label>
                        <input class="form-control" id="title" name="title" value="{{$province->title}}"/>
                    </div>
                    <div class="form-group">
                        <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
