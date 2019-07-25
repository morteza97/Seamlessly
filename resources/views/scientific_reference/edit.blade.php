@extends('layouts.app')
@section('content')
    <h3>ویرایش مشخصات دانشکده</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <form method="post" action="{{route('scientific_reference.update',[$scientificReference->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>نام</strong></label>
                            <input name="first_name" id="first_name" class="form-control"
                                   value="{{$scientificReference->first_name}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>نام خانوادگی</strong></label>
                            <input name="last_name" id="last_name" class="form-control"
                                   value="{{$scientificReference->last_name}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>نوع رابطه</strong></label>
                            <input name="relation_type" id="relation_type" class="form-control"
                                   value="{{$scientificReference->relation_type}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>نحوه آشنایی</strong></label>
                            <input name="acquaintance_method" id="acquaintance_method" class="form-control"
                                   value="{{$scientificReference->acquaintance_method}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>مدت آشنایی</strong></label>
                            <input type="number" min="0" max="100" name="acquaintance_time" id="acquaintance_time"
                                   class="form-control"value="{{$scientificReference->acquaintance_time}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>شغل معرف</strong></label>
                            <input name="reference_job" id="reference_job" class="form-control"
                                   value="{{$scientificReference->reference_job}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>نشانی محل کار یا سکونت</strong></label>
                            <input name="address" id="address" class="form-control"
                                   value="{{$scientificReference->address}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label"><strong>تلفن</strong></label>
                            <input name="phone" id="phone" class="form-control"
                                   value="{{$scientificReference->phone}}"/>
                        </div>

                        <div class="form-group">
                            <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                        </div>
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
