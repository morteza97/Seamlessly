@extends('layouts.app')
@section('content')
    <h3>مشخصات تحصیلات دانشگاهی</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
    <dl class="dl-horizontal">
        <dt>
            ردیف
        </dt>
        <dd>
            {{$collegeEducation->id}}
        </dd>
        <dt>
            نام تحصیلات دانشگاهی
        </dt>
        <dd>
            {{$collegeEducation->title}}
        </dd>
    </dl>
            </div>
        </div>
    </div>
@endsection
