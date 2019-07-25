@extends('layouts.app')
@section('content')
    <h3>ثبت نام در انجمن فارغ التحصیلان</h3>
    <h4 class="section-header">معرفان علمی</h4>
    <section class="section-padding">
        <nav>
            <ol class="cd-breadcrumb triangle">
                <li><label>مشخصات متقاضی</label></li>
                <li><label>سوابق تحصیلات حوزوی</label></li>
                <li><label>سوابق تحصیلات دانشگاهی</label></li>
                <li><label>سوابق آموزشی</label></li>
                <li><label>سوابق پژوهشی</label></li>
                <li><label>سوابق تبلیغی</label></li>
                <li><label>سوابق اشتغال</label></li>
                <li><label>مجوز تدریس دروس معارف</label></li>
                <li><label>مجوز تبلیغ در دانشگاه ها</label></li>
                <li class="current"><label>معرفان علمی</label></li>
            </ol>
        </nav>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('scientific_reference.store')}}">
                    {{csrf_field()}}
                    <div class="row">
                        <div id="rows">
                            @for($id = 1; $id <= $count; $id++)
                                <div class="row" id="row{{$id}}">
                                    <div class="form-group col-md-2">
                                        <label class="control-label text-center label-height {{$id==1?"display-block":"display-none"}}"><strong>نام</strong></label>
                                        <input name="first_name[]" id="first_name" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label text-center label-height {{$id==1?"display-block":"display-none"}}"><strong>نام خانوادگی</strong></label>
                                        <input name="last_name[]" id="last_name" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="control-label text-center label-height {{$id==1?"display-block":"display-none"}}"><strong>نوع رابطه</strong></label>
                                        <input name="relation_type[]" id="relation_type" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="control-label text-center label-height {{$id==1?"display-block":"display-none"}}"><strong>نحوه آشنایی</strong></label>
                                        <input name="acquaintance_method[]" id="acquaintance_method" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="control-label text-center label-height {{$id==1?"display-block":"display-none"}}"><strong>مدت آشنایی</strong></label>
                                        <input type="number" min="0" max="100" name="acquaintance_time[]" id="acquaintance_time" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="control-label text-center label-height {{$id==1?"display-block":"display-none"}}"><strong>شغل معرف</strong></label>
                                        <input name="reference_job[]" id="reference_job" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label text-center label-height {{$id==1?"display-block":"display-none"}}"><strong>نشانی محل کار یا سکونت</strong></label>
                                        <input name="address[]" id="address" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label text-center label-height {{$id==1?"display-block":"display-none"}}"><strong>تلفن</strong></label>
                                        <input name="phone[]" id="phone" class="form-control"/>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <div class="form-group col-md-12">
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
