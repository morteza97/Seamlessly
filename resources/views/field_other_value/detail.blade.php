@extends('layouts.app')
@section('content')
    <h3>مشخصات رشته</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
    <dl class="dl-horizontal">
        <dt>
            ردیف
        </dt>
        <dd>
            {{$fieldOfStudy->id}}
        </dd>
        <dt>
            نام رشته
        </dt>
        <dd>
            {{$fieldOfStudy->title}}
        </dd>
    </dl>
            </div>
        </div>
    </div>
@endsection
