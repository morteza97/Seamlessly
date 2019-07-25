@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center professor_list_title">ویرایش گرایش</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-4">
                <form method="post" action="{{route('orientation.update',[$orientation->id])}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label class="control-label"><strong>نام رشته</strong></label>
                        <select class="form-control" id="field_of_study_id" name="field_of_study_id" >
                            <option value="">لطفا رشته را انتخاب کنید</option>
                            @foreach($fieldOfStudies as $fieldOfStudy)

                                @if ($fieldOfStudy->id==$orientation->field_of_study_id)
                                    <option value="{{$fieldOfStudy->id}}" selected>{{$fieldOfStudy->title}}</option>
                                @else
                                <option value="{{$fieldOfStudy->id}}">{{$fieldOfStudy->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><strong>نام گرایش</strong></label>
                        <input class="form-control" id="title" name="title" value="{{$orientation->title}}"/>
                    </div>
                    <div class="form-group">
                        <input type="submit"  value="ثبت" class="btn btn-success col-md-12"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
