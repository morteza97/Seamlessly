@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">مشخصات دانشگاه</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
    <dl class="dl-horizontal">
        <dt>
            ردیف
        </dt>
        <dd>
            {{$university->id}}
        </dd>
        <dt>
            نام دانشگاه
        </dt>
        <dd>
            {{$university->title}}
        </dd>
        <dt>
            آدرس
        </dt>
        <dd>
            {{$university->address}}
        </dd>
        <dt>
            تلفن
        </dt>
        <dd>
            {{$university->phone}}
        </dd>
    </dl>
            </div>
        </div>
    </div>
@endsection
