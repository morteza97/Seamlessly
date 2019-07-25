@extends('layouts.app')
@section('content')
    <h3>لیست دانشجویان</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="control-label" for="first_name"><strong>نام</strong></label>
                        <input readonly class="form-control" id="first_name" name="father_name"
                                                               value="{{$alumniAssociation->user->FirstName}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>نام خانوادگی</strong></label>
                        <input readonly class="form-control" id="last_name" name="father_name"
                               value="{{$alumniAssociation->user->LastName}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>نام پدر</strong></label>
                        <input readonly class="form-control" id="father_name" name="father_name"
                               value="{{$alumniAssociation->father_name}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>شماره شناسنامه</strong></label>
                        <input readonly name="birth_certificate_number" id="birth_certificate_number"
                               class="form-control" value="{{$alumniAssociation->birth_certificate_number}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>محل تولد</strong></label>
                        <input readonly name="birth_place" id="birth_place" class="form-control"
                               value="{{$alumniAssociation->birth_place}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label"><strong>محل صدور</strong></label>
                        <input readonly name="issue_place" id="issue_place" class="form-control"
                               value="{{$alumniAssociation->issue_place}}"/>
                    </div>
                </div>

                <div class="block-content">
                    <h5>سوابق تحصیلات حوزوی</h5><a href="{{route('seminary_academic_degree_history.create')}}" class="btn btn-primary btn-margin" >جدید</a>
                    <label class="control-label"><strong>آخرین پایه تحصیلی : </strong>
                        {{$alumniAssociation->seminary_grade_id==null?"---":$alumniAssociation->seminaryGrade->title}}
                    </label>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                مقطع تحصیلی
                            </th>
                            <th>
                                رشته
                            </th>
                            <th>
                                محل تحصیل
                            </th>
                            <th>
                                معدل
                            </th>
                            <th>
                                تاریخ شروع
                            </th>
                            <th>
                                تاریخ پایان
                            </th>
                            <th>
                                مدرک رسمی
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($seminaryAcademicDegreesHistories as $seminaryAcademicDegreesHistory)
                            <tr>
                                <td>
                                    {{$seminaryAcademicDegreesHistory->seminary_academic_degree_id==null?"---":
                                    $seminaryAcademicDegreesHistory->seminaryAcademicDegree->title}}
                                </td>
                                <td>
                                    {{$seminaryAcademicDegreesHistory->seminary_field_of_study_id==null?"---":
                                    $seminaryAcademicDegreesHistory->seminaryFieldOfStudy->title}}
                                </td>
                                <td>
                                    {{$seminaryAcademicDegreesHistory->training_center_id==null?"---":
                                    $seminaryAcademicDegreesHistory->trainingCenter->title}}
                                </td>
                                <td>
                                    {{$seminaryAcademicDegreesHistory->average}}
                                </td>
                                <td>
                                    {{$seminaryAcademicDegreesHistory->start_date}}
                                </td>
                                <td>
                                    {{$seminaryAcademicDegreesHistory->end_date}}
                                </td>
                                <td>
                                    {{$seminaryAcademicDegreesHistory->official_document}}
                                </td>
                                <td>
                                    <a href="{{route('seminary_academic_degree_history.delete',[$seminaryAcademicDegreesHistory->id])}}" class="btn btn-danger">
                                        حذف
                                    </a>
                                    <a href="{{route('seminary_academic_degree_history.edit',[$seminaryAcademicDegreesHistory->id])}}" class="btn btn-warning">
                                        ویرایش
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="block-content">
                    <h5>سوابق تحصیلات دانشگاهی</h5><a href="{{route('college_education_history.create')}}" class="btn btn-primary btn-margin" >جدید</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                مقطع تحصیلی
                            </th>
                            <th>
                                رشته
                            </th>
                            <th>
                                گرایش
                            </th>
                            <th>
                                معدل
                            </th>
                            <th>
                                دانشگاه محل تحصیل
                            </th>
                            <th>
                                کشور محل تحصیل
                            </th>
                            <th>
                                تاریخ شروع
                            </th>
                            <th>
                                تاریخ پایان
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($collegeEducationHistories as $collegeEducationHistory)
                            <tr>
                                <td>
                                    {{$collegeEducationHistory->grade_id==null?"---":
                                    $collegeEducationHistory->grade->title}}
                                </td>
                                <td>
                                    {{$collegeEducationHistory->field_of_study_id==null?"----":
                                    $collegeEducationHistory->fieldOfStudy->title}}
                                </td>
                                <td>
                                    {{$collegeEducationHistory->orientation_id==null?"---":
                                    $collegeEducationHistory->orientation->title}}
                                </td>
                                <td>
                                    {{$collegeEducationHistory->average}}
                                </td>
                                <td>
                                    {{$collegeEducationHistory->training_center_id==null?"---":
                                    $collegeEducationHistory->trainingCenter->title}}
                                </td>
                                <td>
                                    {{$collegeEducationHistory->country_id==null?"---":
                                    $collegeEducationHistory->country->title}}
                                </td>
                                <td>
                                    {{$collegeEducationHistory->start_date}}
                                </td>
                                <td>
                                    {{$collegeEducationHistory->end_date}}
                                </td>
                                <td>
                                    <a href="{{route('college_education_history.delete',[$collegeEducationHistory->id])}}" class="btn btn-danger">
                                        حذف
                                    </a>
                                    <a href="{{route('college_education_history.edit',[$collegeEducationHistory->id])}}" class="btn btn-warning">
                                        ویرایش
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="block-content">
                    <h5>سوابق آموزشی</h5><a href="{{route('educational_experience.create')}}" class="btn btn-primary btn-margin" >جدید</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                نوع مرکز آموزشی
                            </th>
                            <th>
                                نام مرکز آموزشی
                            </th>
                            <th class="col-md-2">
                                عنوان درس هایی که تدریس نموده یا می نمائید
                            </th>
                            <th>
                                مقطع
                            </th>
                            <th>
                                تاریخ شروع
                            </th>
                            <th>
                                تاریخ پایان
                            </th>
                            <th>
                                نشانی موسسه
                            </th>
                            <th>
                                تلفن
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($educationalExperiences as $educationalExperience)
                            <tr>
                                <td>
                                    {{$educationalExperience->training_center_id==null?"---":
                                    $educationalExperience->trainingCenter->trainingCenterType->title}}
                                </td>
                                <td>
                                    {{$educationalExperience->training_center_id==null?"----":
                                    $educationalExperience->trainingCenter->title}}
                                </td>
                                <td>
                                    {{$educationalExperience->lessons_title}}
                                </td>
                                <td>
                                    {{$educationalExperience->grade_id==null?"---":
                                    $educationalExperience->grade->title}}
                                </td>
                                <td>
                                    {{$educationalExperience->start_date}}
                                </td>
                                <td>
                                    {{$educationalExperience->end_date}}
                                </td>
                                <td>
                                    {{$educationalExperience->address}}
                                </td>
                                <td>
                                    {{$educationalExperience->phone}}
                                </td>
                                <td>
                                    <a href="{{route('educational_experience.delete',[$educationalExperience->id])}}" class="btn btn-danger">
                                        حذف
                                    </a>
                                    <a href="{{route('educational_experience.edit',[$educationalExperience->id])}}" class="btn btn-warning">
                                        ویرایش
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="block-content">
                    <h5>سوابق پژوهشی</h5><a href="{{route('research_activity_record.create')}}" class="btn btn-primary btn-margin" >جدید</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                نوع مرکز پژوهشی
                            </th>
                            <th>
                                نام مرکز پژوهشی
                            </th>
                            <th class="col-md-2">
                                عنوان پژوهش هایی که نموده یا می نمائید
                            </th>
                            <th>
                                تاریخ شروع
                            </th>
                            <th>
                                تاریخ پایان
                            </th>
                            <th>
                                نشانی موسسه
                            </th>
                            <th>
                                تلفن
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($researchActivityRecords as $researchActivityRecord)
                            <tr>
                                <td>
                                    {{$researchActivityRecord->training_center_id==null?"---":
                                    $researchActivityRecord->trainingCenter->trainingCenterType->title}}
                                </td>
                                <td>
                                    {{$researchActivityRecord->training_center_id==null?"----":
                                    $researchActivityRecord->trainingCenter->title}}
                                </td>
                                <td>
                                    {{$researchActivityRecord->researches_title}}
                                </td>
                                <td>
                                    {{$researchActivityRecord->start_date}}
                                </td>
                                <td>
                                    {{$researchActivityRecord->end_date}}
                                </td>
                                <td>
                                    {{$researchActivityRecord->address}}
                                </td>
                                <td>
                                    {{$researchActivityRecord->phone}}
                                </td>
                                <td>
                                    <a href="{{route('research_activity_record.delete',[$researchActivityRecord->id])}}" class="btn btn-danger">
                                        حذف
                                    </a>
                                    <a href="{{route('research_activity_record.edit',[$researchActivityRecord->id])}}" class="btn btn-warning">
                                        ویرایش
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="block-content">
                    <h5>سوابق تبلیغی</h5><a href="{{route('advertising_record.create')}}" class="btn btn-primary btn-margin" >جدید</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                نوع مرکز تبلیغی
                            </th>
                            <th>
                                نام مرکز تبلیغی
                            </th>
                            <th>
                                محل تبلیغ
                            </th>
                            <th>
                                تاریخ شروع
                            </th>
                            <th>
                                تاریخ پایان
                            </th>
                            <th>
                                نشانی موسسه
                            </th>
                            <th>
                                تلفن
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($advertisingRecords as $advertisingRecord)
                            <tr>
                                <td>
                                    {{$advertisingRecord->training_center_id==null?"---":
                                    $advertisingRecord->trainingCenter->trainingCenterType->title}}
                                </td>
                                <td>
                                    {{$advertisingRecord->training_center_id==null?"----":
                                    $advertisingRecord->trainingCenter->title}}
                                </td>
                                <td>
                                    {{$advertisingRecord->advertising_record_place_id==null?"----":
                                    $advertisingRecord->advertisingRecordPlace->title}}
                                </td>
                                <td>
                                    {{$advertisingRecord->start_date}}
                                </td>
                                <td>
                                    {{$advertisingRecord->end_date}}
                                </td>
                                <td>
                                    {{$advertisingRecord->address}}
                                </td>
                                <td>
                                    {{$advertisingRecord->phone}}
                                </td>
                                <td>
                                    <a href="{{route('advertising_record.delete',[$advertisingRecord->id])}}" class="btn btn-danger">
                                        حذف
                                    </a>
                                    <a href="{{route('advertising_record.edit',[$advertisingRecord->id])}}" class="btn btn-warning">
                                        ویرایش
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="block-content">
                    <h5>سوابق اشتغال</h5><a href="{{route('employment_record.create')}}" class="btn btn-primary btn-margin" >جدید</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                نام محل کار
                            </th>
                            <th>
                                نوع مسئولیت
                            </th>
                            <th>
                                شهر
                            </th>
                            <th>
                                تاریخ شروع
                            </th>
                            <th>
                                تاریخ پایان
                            </th>
                            <th>
                                نشانی موسسه
                            </th>
                            <th>
                                تلفن
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employmentRecords as $employmentRecord)
                            <tr>
                                <td>
                                    {{$employmentRecord->workplace_name}}
                                </td>
                                <td>
                                    {{$employmentRecord->responsibility_type_id==null?"----":
                                    $employmentRecord->responsibilityType->title}}
                                </td>
                                <td>
                                    {{$employmentRecord->city_id==null?"----":
                                    $employmentRecord->city->title}}
                                </td>
                                <td>
                                    {{$employmentRecord->start_date}}
                                </td>
                                <td>
                                    {{$employmentRecord->end_date}}
                                </td>
                                <td>
                                    {{$employmentRecord->address}}
                                </td>
                                <td>
                                    {{$employmentRecord->phone}}
                                </td>
                                <td>
                                    <a href="{{route('employment_record.delete',[$employmentRecord->id])}}" class="btn btn-danger">
                                        حذف
                                    </a>
                                    <a href="{{route('employment_record.edit',[$employmentRecord->id])}}" class="btn btn-warning">
                                        ویرایش
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="block-content">
                    <h5>مجوز تدریس دروس معارف اسلامی</h5><a href="{{route('teaching_license.create')}}" class="btn btn-primary btn-margin" >جدید</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                عنوان درس
                            </th>
                            <th>
                                شماره مجوز
                            </th>
                            <th>
                                تاریخ صدور
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachingLicenses as $teachingLicense)
                            <tr>
                                <td>
                                    {{$teachingLicense->lesson_id==null?"----":
                                    $teachingLicense->lesson->title}}
                                </td>
                                <td>
                                    {{$teachingLicense->license_number}}
                                </td>
                                <td>
                                    {{$teachingLicense->issue_date}}
                                </td>
                                <td>
                                    <a href="{{route('teaching_license.delete',[$teachingLicense->id])}}" class="btn btn-danger">
                                        حذف
                                    </a>
                                    <a href="{{route('teaching_license.edit',[$teachingLicense->id])}}" class="btn btn-warning">
                                        ویرایش
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="block-content">
                    <h5>مجوز تبلیغ در دانشگاه ها</h5><a href="{{route('advertising_license.create')}}" class="btn btn-primary btn-margin" >جدید</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                شماره پرونده
                            </th>
                            <th>
                                شماره مجوز
                            </th>
                            <th>
                                تاریخ صدور
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($advertisingLicenses as $advertisingLicense)
                            <tr>
                                <td>
                                    {{$advertisingLicense->file_number}}
                                </td>
                                <td>
                                    {{$advertisingLicense->license_number}}
                                </td>
                                <td>
                                    {{$advertisingLicense->issue_date}}
                                </td>
                                <td>
                                    <a href="{{route('advertising_license.delete',[$advertisingLicense->id])}}" class="btn btn-danger">
                                        حذف
                                    </a>
                                    <a href="{{route('advertising_license.edit',[$advertisingLicense->id])}}" class="btn btn-warning">
                                        ویرایش
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="block-content">
                    <h5>معرفان علمی</h5><a href="{{route('scientific_reference.create')}}" class="btn btn-primary btn-margin" >جدید</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                نام و نام خانوادگی
                            </th>
                            <th>
                                نوع رابطه و نحوه آشنایی
                            </th>
                            <th>
                                مدت آشنایی
                            </th>
                            <th>
                                شغل معرف
                            </th>
                            <th>
                                نشانی محل کار یا سکونت
                            </th>
                            <th>
                                تلفن
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($scientificReferences as $scientificReference)
                            <tr>
                                <td>
                                    {{$scientificReference->first_name.' '.$scientificReference->last_name}}
                                </td>
                                <td>
                                    {{$scientificReference->relation_type.' '.$scientificReference->acquaintance_method}}
                                </td>
                                <td>
                                    {{$scientificReference->acquaintance_time}}
                                </td>
                                <td>
                                    {{$scientificReference->reference_job}}
                                </td>
                                <td>
                                    {{$scientificReference->address}}
                                </td>
                                <td>
                                    {{$scientificReference->phone}}
                                </td>
                                <td>
                                    <a href="{{route('scientific_reference.delete',[$scientificReference->id])}}" class="btn btn-danger">
                                        حذف
                                    </a>
                                    <a href="{{route('scientific_reference.edit',[$scientificReference->id])}}" class="btn btn-warning">
                                        ویرایش
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
