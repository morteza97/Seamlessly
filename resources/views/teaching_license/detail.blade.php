@extends('layouts.app')
@section('content')
    <h3>مشخصات دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
    <dl class="dl-horizontal">
        <dt>
            ردیف
        </dt>
        <dd>
            {{$college->id}}
        </dd>
        <dt>
            نام دانشکده
        </dt>
        <dd>
            {{$college->title}}
        </dd>
        <dt>
            تلفن
        </dt>
        <dd>
            {{$college->phone}}
        </dd>
    </dl>
            </div>
        </div>
    </div>
@endsection
