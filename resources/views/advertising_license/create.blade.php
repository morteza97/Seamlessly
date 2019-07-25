@extends('layouts.app')
@section('content')
    <h4 class="section-header">مجوز تبلیغ در دانشگاه ها</h4>
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
                <li class="current"><label>مجوز تبلیغ در دانشگاه ها</label></li>
                <li><label>معرفان علمی</label></li>
            </ol>
        </nav>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('advertising_license.store')}}">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="form-group col-md-6">
                            <input type="hidden" value="1" name="row_count" id="row_count"/>
                            <p>
                                <a class="btn btn-primary" id="new_row" >سطر جدید</a>
                            </p>
                        </div>

                        <div id="rows">
                            <div class="row" id="row1">
                                <div class="form-group col-md-4">
                                    <label class="control-label text-center label-height "><strong>شماره پرونده</strong></label>
                                    <input name="file_number[]" id="file_number" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label text-center label-height "><strong>شماره مجوز</strong></label>
                                    <input name="license_number[]" id="license_number" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label text-center label-height "><strong>تاریخ صدور</strong></label>
                                    <input type="date"  name="issue_date[]" id="issue_date" class="form-control"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                        </div>
                    </div>
                </form>
                <div id="client_error">

                </div>
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


    <script>


        $(document).ready(function() {

            $("#new_row").click(function () {
                var val=$("#row_count").val();
                val++;


                $("#row1").clone().attr('id',"row"+val).appendTo("#rows");

                $("#row"+val+" label").addClass('display-none');//غیر فعال کردن عناوین در سطر دوم

                $("#row_count").val(val);
            });

        });
    </script>
@endsection
