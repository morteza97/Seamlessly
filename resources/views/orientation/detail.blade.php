@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">مشخصات گرایش</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
    <dl class="dl-horizontal">
        <dt>
            ردیف
        </dt>
        <dd>
            {{$orientation->id}}
        </dd>
        <dt>
            نام رشته
        </dt>
        <dd>
            {{$orientation->fieldOfStudy->title}}
        </dd>
        <dt>
            نام گرایش
        </dt>
        <dd>
            {{$orientation->title}}
        </dd>
    </dl>
            </div>
        </div>
    </div>
@endsection
