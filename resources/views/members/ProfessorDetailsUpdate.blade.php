@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="form-group col-md-12">
            <!-- Tabs -->
            <section id="tabs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center professor_list_title">ویرایش مشخصات استاد</h3>
                        </div>
                    </div>
                    <form action="{{route('management.professor_update',[$professor->id])}}" method="post"
                          class="myForm" enctype="multipart/form-data">
                        {{method_field('put')}}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-6">
                                <label>نام:</label>
                                <input type="text" name="FirstName" id="FirstName" value="{{$professor->FirstName}}">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>نام خانوادگی:</label>
                                <input type="text" name="LastName" id="LastName" value="{{$professor->LastName}}">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>نام پدر:</label>
                                <input type="text" name="FatherName" id="FatherName" value="{{$professor->FatherName}}">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>کد ملی:</label>
                                <input type="text" name="NationalCode" id="NationalCode"
                                       value="{{$professor->NationalCode}}">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>شماره شناسنامه:</label>
                                <input type="text" name="IdentityNumber" id="IdentityNumber"
                                       value="{{$professor->IdentityNumber}}">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>محل صدور شناسنامه:</label>
                                <input type="text" name="IdentityPlace" id="IdentityPlace"
                                       value="{{$professor->IdentityPlace}}">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>تاریخ تولد:</label>
                                <input type="text" name="BirthDate-text" id="BirthDate-text"
                                       class="form-control DatePicker-input" placeholder="انتخاب تاریخ"
                                       aria-label="date1" aria-describedby="date1" autocomplete="off"
                                       value="{{$BirthDate}}">
                                <input type="hidden" name="BirthDate_date" id="BirthDate-date" name="start_date"
                                       class="form-control" placeholder="Persian Calendar Date"
                                       aria-label="date11" aria-describedby="date11" autocomplete="off"
                                       value="{{$professor->BirthDate}}">
                                <div class="input-group-prepend">
                                                <span class="input-group-text cursor-pointer DatePicker-icon"
                                                      id="date1">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                </div>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>محل تولد:</label>
                                <input type="text" name="BirthPlace" id="BirthPlace" value="{{$professor->BirthPlace}}"
                                       autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>جنسیت:</label>
                                <select name="gender" id="group">
                                    <option>انتخاب کنید</option>
                                    @foreach($genders as $gender)
                                        <option
                                            value="{{$gender->id}}" {{ ( $gender->id == $professor->gender_id) ? 'selected' : '' }}>{{$gender->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>وضعیت تأهل:</label>
                                <select name="marital_status" id="group">
                                    <option>انتخاب کنید</option>
                                    @foreach($marital_statuses as $marital_status)
                                        <option
                                            value="{{$marital_status->id}}" {{ ( $marital_status->id == $professor->marital_status_id) ? 'selected' : '' }}>{{$marital_status->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>وضعیت نظام وظیفه عمومی:</label>
                                <select name="pc_status" id="group">
                                    <option>انتخاب کنید</option>
                                    @foreach($pc_statuses as $pc_status)
                                        <option
                                            value="{{$pc_status->id}}" {{ ( $pc_status->id == $professor->public_conscription_status_id) ? 'selected' : '' }}>{{$pc_status->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>شماره موبایل:</label>
                                <input type="text" name="mobile" id="mobile" value="{{$professor->mobile}}"
                                       autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>شماره تلفن:</label>
                                <input type="text" name="phone" id="phone" value="{{$professor->phone}}"
                                       autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>پست الکترونیکی:</label>
                                <input type="email" name="email" id="email" value="{{$professor->email}}"
                                       autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>گروه آموزشی:</label>
                                <select name="group" id="group">
                                    <option>انتخاب کنید</option>
                                    @foreach($groups as $group)
                                        <option
                                            value="{{$group->id}}" {{ ( $group->id == $group_id) ? 'selected' : '' }}>{{$group->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>مرتبه علمی:</label>
                                <select name="level" id="group">
                                    <option>انتخاب کنید</option>
                                    @foreach($levels as $level)
                                        <option
                                            value="{{$level->id}}" {{ ( $level->id == $level_id) ? 'selected' : '' }}>{{$level->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>شماره شناسایی استاد:</label>
                                <input type="text" name="ProfessorNumber" id="ProfessorNumber"
                                       value="{{$professor_info->ProfessorNumber}}">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>لقب استاد:</label>
                                <input type="text" name="nickname" id="nickname" value="{{$professor_info->nickname}}">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>تصویر استاد:</label>
                                <input type="file" name="pic" id="pic">
                            </div>
                            <div class="form-group col-lg-4 offset-lg-4 col-md-12">
                                <input type="submit" class="btn btn-primary width-100" name="professor_update_submit"
                                       value="بروزرسانی اطلاعات">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- ./Tabs -->
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#date1').MdPersianDateTimePicker({
                targetTextSelector: '#BirthDate-text',
                targetDateSelector: '#BirthDate-date',
                enableTimePicker: false,
                dateFormat: 'yyyy-MM-dd',
                textFormat: 'yyyy-MM-dd ',
            });
        });
    </script>

@endsection

