@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row margin-top-50">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">مشخصات مذهب</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
    <dl class="dl-horizontal">
        <dt>
            ردیف
        </dt>
        <dd>
            {{$religion->id}}
        </dd>
        <dt>
            نام مذهب
        </dt>
        <dd>
            {{$religion->title}}
        </dd>
    </dl>
            </div>
        </div>
    </div>
@endsection
