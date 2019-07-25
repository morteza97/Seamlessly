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
                    @if( count($errors) > 0 )
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('management.Add_Professor')}}" method="post" class="myForm" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-6">
                                <label>نام:</label>
                                <input type="text" name="FirstName" id="FirstName" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>نام خانوادگی:</label>
                                <input type="text" name="LastName" id="LastName" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>نام پدر:</label>
                                <input type="text" name="FatherName" id="FatherName" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>نام کاربری:</label>
                                <input type="text" name="username" id="username" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>رمز عبور:</label>
                                <input type="password" name="password" id="password" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>کد ملی:</label>
                                <input type="text" name="NationalCode" id="NationalCode" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>شماره شناسنامه:</label>
                                <input type="text" name="IdentityNumber" id="IdentityNumber" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>محل صدور شناسنامه:</label>
                                <input type="text" name="IdentityPlace" id="IdentityPlace" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>تاریخ تولد:</label>
                                <input type="text" name="BirthDate-text" id="BirthDate-text"
                                       class="form-control DatePicker-input" placeholder="انتخاب تاریخ"
                                       aria-label="date1" aria-describedby="date1" autocomplete="off">
                                <input type="hidden" name="BirthDate_date" id="BirthDate-date" name="start_date"
                                       class="form-control" placeholder="Persian Calendar Date"
                                       aria-label="date11" aria-describedby="date11" autocomplete="off">
                                <div class="input-group-prepend">
                                    <span class="input-group-text cursor-pointer DatePicker-icon" id="date1">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>محل تولد:</label>
                                <input type="text" name="BirthPlace" id="BirthPlace" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>جنسیت:</label>
                                <select name="gender" id="group">
                                    <option>انتخاب کنید</option>
                                    @foreach($genders as $gender)
                                        <option
                                            value="{{$gender->id}}">{{$gender->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>وضعیت تأهل:</label>
                                <select name="marital_status" id="group">
                                    <option>انتخاب کنید</option>
                                    @foreach($marital_statuses as $marital_status)
                                        <option
                                            value="{{$marital_status->id}}">{{$marital_status->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>وضعیت نظام وظیفه عمومی:</label>
                                <select name="pc_status" id="group">
                                    <option>انتخاب کنید</option>
                                    @foreach($pc_statuses as $pc_status)
                                        <option
                                            value="{{$pc_status->id}}">{{$pc_status->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>شماره موبایل:</label>
                                <input type="text" name="mobile" id="mobile" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>شماره تلفن:</label>
                                <input type="text" name="phone" id="phone" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>پست الکترونیکی:</label>
                                <input type="email" name="email" id="email" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>گروه آموزشی:</label>
                                <select name="group" id="group">
                                    <option>انتخاب کنید</option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}"> {{$group->title}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>مرتبه علمی:</label>
                                <select name="level" id="group">
                                    <option>انتخاب کنید</option>
                                    @foreach($levels as $level)
                                        <option value="{{$level->id}}"> {{$level->title}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>شماره شناسایی استاد:</label>
                                <input type="text" name="ProfessorNumber" id="ProfessorNumber" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>لقب استاد:</label>
                                <input type="text" name="nickname" id="nickname" autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>تصویر استاد:</label>
                                <input type="file" name="pic" id="pic">
                            </div>
                            <div class="form-group col-lg-4  col-md-6">
                                <label>فایل رزومه استاد:</label>
                                <input type="file" name="resume_file" id="resume_file">
                            </div>
                            <div class="form-group col-lg-4 offset-lg-4 col-md-12">
                                <input type="submit" class="btn btn-primary width-100" name="professor_update_submit"
                                       value="ثبت مشخصات">
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

