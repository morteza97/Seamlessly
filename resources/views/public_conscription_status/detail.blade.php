@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">مشخصات وضعیت نظام وظیفه</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
    <dl class="dl-horizontal">
        <dt>
            ردیف
        </dt>
        <dd>
            {{$publicConscriptionStatus->id}}
        </dd>
        <dt>
            نام وضعیت نظام وظیفه
        </dt>
        <dd>
            {{$publicConscriptionStatus->title}}
        </dd>
    </dl>
            </div>
        </div>
    </div>
@endsection
