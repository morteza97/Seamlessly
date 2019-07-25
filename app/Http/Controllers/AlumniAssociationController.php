<?php

namespace App\Http\Controllers;

use App\AdvertisingLicense;
use App\AdvertisingRecord;
use App\AdvertisingRecordPlace;
use App\AlumniAssociation;
use App\City;
use App\CollegeEducation;
use App\CollegeEducationHistory;
use App\Country;
use App\EducationalExperience;
use App\EmploymentRecord;
use App\FieldOfStudy;
use App\FieldsOtherValue;
use App\Grade;
use App\MaritalStatus;
use App\Orientation;
use App\Province;
use App\PublicConscriptionStatus;
use App\Religion;
use App\ResearchActivityRecord;
use App\ScientificReference;
use App\Seminary;
use App\SeminaryAcademicDegree;
use App\SeminaryAcademicDegreeHistory;
use App\SeminaryFieldOfStudy;
use App\SeminaryGrade;
use App\TeachingLicense;
use App\TrainingCenterType;
use App\TrainingCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniAssociationController extends Controller
{

    public function list()
    {
        $alumniAssociations=AlumniAssociation::all();
        return view('alumni/list',compact('alumniAssociations'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Auth::id();
        $alumniAssociation=AlumniAssociation::where('user_id',$userId)->first();
        $seminaryAcademicDegreesHistories=SeminaryAcademicDegreeHistory::where('user_id',$userId)->get();
        $collegeEducationHistories=CollegeEducationHistory::where('user_id',$userId)->get();
        $educationalExperiences=EducationalExperience::where('user_id',$userId)->get();
        $researchActivityRecords=ResearchActivityRecord::where('user_id',$userId)->get();
        $advertisingRecords=AdvertisingRecord::where('user_id',$userId)->get();
        $employmentRecords=EmploymentRecord::where('user_id',$userId)->get();
        $teachingLicenses=TeachingLicense::where('user_id',$userId)->get();
        $advertisingLicenses=AdvertisingLicense::where('user_id',$userId)->get();
        $scientificReferences=ScientificReference::where('user_id',$userId)->get();
        //return $alumniAssociation;
        if ($alumniAssociation==null)//($alumniAssociation->count()==0)
        {

            return redirect(route('alumni_register'));
        }
        return view('alumni/alumni_association_index',compact(['alumniAssociation','seminaryAcademicDegreesHistories',
            'collegeEducationHistories','educationalExperiences','researchActivityRecords','advertisingRecords',
            'employmentRecords','teachingLicenses','advertisingLicenses','scientificReferences']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(AlumniAssociation $alumniAssociation)
    {
        $userId=$alumniAssociation->user_id;
        $alumniAssociation=AlumniAssociation::where('user_id',$userId)->first();
        $seminaryAcademicDegreesHistories=SeminaryAcademicDegreeHistory::where('user_id',$userId)->get();
        $collegeEducationHistories=CollegeEducationHistory::where('user_id',$userId)->get();
        $educationalExperiences=EducationalExperience::where('user_id',$userId)->get();
        $researchActivityRecords=ResearchActivityRecord::where('user_id',$userId)->get();
        $advertisingRecords=AdvertisingRecord::where('user_id',$userId)->get();
        $employmentRecords=EmploymentRecord::where('user_id',$userId)->get();
        $teachingLicenses=TeachingLicense::where('user_id',$userId)->get();
        $advertisingLicenses=AdvertisingLicense::where('user_id',$userId)->get();
        $scientificReferences=ScientificReference::where('user_id',$userId)->get();
        //return $alumniAssociation;
        if ($alumniAssociation->count()>0)
        {
            return view('alumni/detail',compact(['alumniAssociation','seminaryAcademicDegreesHistories',
                'collegeEducationHistories','educationalExperiences','researchActivityRecords','advertisingRecords',
                'employmentRecords','teachingLicenses','advertisingLicenses','scientificReferences']));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $religions=Religion::all();
        $countries=Country::all();
        $maritalStatuses=MaritalStatus::all();
        $provinces=Province::all();
        $publicConscriptionStatuses=PublicConscriptionStatus::all();
        return view('alumni/alumni_association_register', compact(['religions',
            'countries','maritalStatuses','provinces','publicConscriptionStatuses']));
    }


    public function getCityList($provinceID)
    {

        $cities = City::where("province_id", $provinceID)
            ->pluck("title", "id");
        return response()->json($cities);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        //dd(Auth::id());



        $request->validate(AlumniAssociation::role());

        $alumniAssociation=AlumniAssociation::create([
            'father_name'=>$request['father_name'],
            'birth_certificate_number'=>$request['birth_certificate_number'],
            'birth_place'=>$request['birth_place'],
            'issue_place'=>$request['issue_place'],
            'religion_id'=>$request['religion_id'],
            'country_id'=>$request['country_id'],
            'marital_status_id'=>$request['marital_status_id'],
            'home_phone'=>$request['home_phone'],
            //'province_id'=>$request['province_id'],
            'city_id'=>$request['city_id']=="other"
                ? null
                : $request['city_id'],
            'home_Address'=>$request['home_Address'],
            'work_place_phone'=>$request['work_place_phone'],
            'required_phone'=>$request['required_phone'],
            'public_conscription_status_id'=>$request['public_conscription_status_id'],
            'conscription_end_date'=>$request['conscription_end_date'],
            'seminary_grade_id'=>$request['seminary_grade_id'],
            'user_id'=>Auth::id(),
        ]);

        //***********************************

        if ($request['city_id']=="other"){
            $province=$this->getProvinceTitle($request['province_id']);
            FieldsOtherValue::create([
                'table_name' => 'employment_records',
                'table_title' => 'مشخصات متقاضی',
                'field_name' => 'city_id',
                'field_title' => 'نام شهر',
                'record_id' => $alumniAssociation->id,
                'new_value' => $request['city_title'].' از استان '.$province,
                'applied' => false,
            ]);
        }

        //****************************************
        return redirect('seminary_academic_degree_history/create');
    }

    public function getProvinceTitle($provinceID)
    {

        $province = Province::where("id", $provinceID)->first();

        return $province->title;

    }

/*    public function seminary_academic_degree_history_create()
    {
        $seminaryGrades=SeminaryGrade::all();
        $trainingCenters=TrainingCenter::all();
        $seminaryAcademicDegrees=SeminaryAcademicDegree::all();
        $seminaryFieldOfStudies=SeminaryFieldOfStudy::all();
        //dd($seminaryFieldOfStudies);
        return view('alumni/seminary_academic_degree_history', compact(['seminaryGrades',
            'trainingCenters','seminaryAcademicDegrees','seminaryFieldOfStudies']));
    }

    public function seminary_academic_degree_history_store(Request $request)
    {
        //dd($request);
        $count= count($request['seminary_academic_degree_id']);
        $userId=array();
        //$officialDocument=array();

        $request->validate(SeminaryAcademicDegreeHistory::role());

        for ($i=0;$i<$count;$i++){
            if (isset($request['seminary_academic_degree_id'][$i])) {
                $userId[$i] = 1;//Auth::id()

                $seminaryAcademicDegreeHistory=SeminaryAcademicDegreeHistory::create([
                    'seminary_academic_degree_id' => $request['seminary_academic_degree_id'][$i],
                    'seminary_field_of_study_id' => $request['seminary_field_of_study_id'][$i]=="other"
                        ? null
                        : $request['seminary_field_of_study_id'][$i],
                    'training_center_id' => $request['training_center_id'][$i]=="other"
                        ? null
                        : $request['training_center_id'][$i],
                    'average' => $request['average'][$i],
                    'start_date' => $request['start_date'][$i],
                    'end_date' => $request['end_date'][$i],
                    'official_document' => $request['official_document'][$i],
                    'user_id' => $userId[$i]
                ]);
                //return $seminaryAcademicDegreeHistory;
                if ($request['seminary_field_of_study_id'][$i]=="other"){
                    $fieldsOtherValue=FieldsOtherValue::create([
                        'table_name' => 'seminary_academic_degree_histories',
                        'table_title' => 'سوابق تحصیلات حوزوی',
                        'field_name' => 'seminary_field_of_study_id',
                        'field_title' => 'رشته حوزوی',
                        'record_id' => $seminaryAcademicDegreeHistory->id,
                        'new_value' => $request['seminary_field_of_study_title'][$i],
                        'applied' => false,
                    ]);
                }
                if ($request['training_center_id'][$i]=="other"){
                    $fieldsOtherValue=FieldsOtherValue::create([
                        'table_name' => 'seminary_academic_degree_histories',
                        'table_title' => 'سوابق تحصیلات حوزوی',
                        'field_name' => 'training_center_id',
                        'field_title' => 'محل تحصیل',
                        'record_id' => $seminaryAcademicDegreeHistory->id,
                        'new_value' => $request['training_center_title'][$i],
                        'applied' => false,
                    ]);
                }
            }
        }

        return redirect('alumni/college_education_history_create');
    }*/

    private function store_other_value($tableName,$tableTitle,$recordId,$newValue){
        $fieldsOtherValue=FieldsOtherValue::create([
            'table_name' => $tableName,
            'table_title' => $tableTitle,
            'record_id' => $recordId,
            'new_value' => $newValue,
            'applied' => false,
        ]);
        return $fieldsOtherValue;
    }

/*    public function college_education_history_create()
    {
        $grades=Grade::all();
        $fieldOfStudies=FieldOfStudy::all();
        $orientations=Orientation::all();
        $trainingCenters=TrainingCenter::where("training_center_type_id",1)->get();
        $countries=Country::all();
        //dd($trainingCenters);
        return view('alumni/college_education_history', compact(['grades',
            'fieldOfStudies','orientations','trainingCenters','countries']));
    }*/

    public function getOrientationList($fieldOfStudyId)
    {

        $orientations = Orientation::where("field_of_study_id", $fieldOfStudyId)
            ->pluck("title", "id");
        return response()->json($orientations);

    }

/*    public function college_education_history_store(Request $request)
    {
        //return $request;

        $count= count($request['grade_id']);
        $userId=array();

        $request->validate(CollegeEducationHistory::role());

        for ($i=0;$i<$count;$i++){
            $userId[$i]=1;//Auth::id()
            $collegeEducationHistory=CollegeEducationHistory::create([
                'grade_id'=>$request['grade_id'][$i],
                'field_of_study_id'=>$request['field_of_study_id'][$i]=="other"
                    ? null
                    : $request['field_of_study_id'][$i],
                'orientation_id'=>$request['orientation_id'][$i]=="other"
                    ? null
                    : $request['orientation_id'][$i],
                'average'=>$request['average'][$i],
                'training_center_id'=>$request['training_center_id'][$i]=="other"
                    ? null
                    : $request['training_center_id'][$i],
                'Country_id'=>$request['country_id'][$i]=="other"
                    ? null
                    : $request['country_id'][$i],
                'start_date'=>$request['start_date'][$i],
                'end_date'=>$request['end_date'][$i],
                'user_id'=>$userId[$i]
            ]);

        //**********************************
        //return $collegeEducationHistory;
        if ($request['field_of_study_id'][$i]=="other"){

            $fieldsOtherValue=FieldsOtherValue::create([
                'table_name' => 'college_education_histories',
                'table_title' => 'سوابق تحصیلات دانشگاهی',
                'field_name' => 'field_of_study_id',
                'field_title' => 'رشته',
                'record_id' => $collegeEducationHistory->id,
                'new_value' => $request['field_of_study_title'][$i],
                'applied' => false,
            ]);
        }

        if ($request['orientation_id'][$i]=="other"){
            $fieldsOtherValue=FieldsOtherValue::create([
                'table_name' => 'college_education_histories',
                'table_title' => 'سوابق تحصیلات دانشگاهی',
                'field_name' => 'orientation_id',
                'field_title' => 'گرایش',
                'record_id' => $collegeEducationHistory->id,
                'new_value' => $request['orientation_title'][$i],
                'applied' => false,
            ]);
        }

        if ($request['training_center_id'][$i]=="other"){
            $fieldsOtherValue=FieldsOtherValue::create([
                'table_name' => 'college_education_histories',
                'table_title' => 'سوابق تحصیلات دانشگاهی',
                'field_name' => 'training_center_id',
                'field_title' => 'دانشگاه محل تحصیل',
                'record_id' => $collegeEducationHistory->id,
                'new_value' => $request['training_center_title'][$i],
                'applied' => false,
            ]);
        }

        if ($request['country_id'][$i]=="other"){
            $fieldsOtherValue=FieldsOtherValue::create([
                'table_name' => 'college_education_histories',
                'table_title' => 'سوابق تحصیلات دانشگاهی',
                'field_name' => 'country_id',
                'field_title' => 'کشور محل تحصیل',
                'record_id' => $collegeEducationHistory->id,
                'new_value' => $request['country_title'][$i],
                'applied' => false,
            ]);
        }

        //**********************************
        }

        return redirect('alumni/educational_experience_create');
    }


    public function educational_experience_create()
    {
        $trainingCenterTypes = TrainingCenterType::all();
        $grades = Grade::all();
        return view('alumni/educational_experience',compact(['trainingCenterTypes','grades']));
    }*/


    public function getTrainingCenterList($trainingCenterTypeId)
    {

        $trainingCenters = TrainingCenter::where("training_center_type_id",$trainingCenterTypeId)
            ->pluck("title", "id");
        return response()->json($trainingCenters);

    }

    public function getGradeList()
    {

        $grades = Grade::all()
            ->pluck("title", "id");
        return response()->json($grades);

    }


/*    public function educational_experience_store(Request $request)
    {
        $request->validate(EducationalExperience::role());

        $count= count($request['grade_id']);
        $userId=array();

        for ($i=0;$i<$count;$i++) {
            $userId[$i] = 1;//Auth::id()

            $educationalExperience=EducationalExperience::create([
                'training_center_id'=>$request['training_center_id'][$i]=="other"
                    ? null
                    : $request['training_center_id'][$i],
                'lessons_title'=>$request['lessons_title'][$i],
                'grade_id'=>$request['grade_id'][$i],
                'start_date'=>$request['start_date'][$i],
                'end_date'=>$request['end_date'][$i],
                'address'=>$request['address'][$i],
                'phone'=>$request['phone'][$i],
                'user_id'=>$userId[$i]//Auth::id(),
            ]);

            //***********************************


            if ($request['training_center_id'][$i]=="other"){
                $fieldsOtherValue=FieldsOtherValue::create([
                    'table_name' => 'educational_experiences',
                    'table_title' => 'سوابق آموزشی',
                    'field_name' => 'training_center_id',
                    'field_title' => 'نام مرکز آموزشی',
                    'record_id' => $educationalExperience->id,
                    'new_value' => $request['training_center_title'][$i],
                    'applied' => false,
                ]);
            }

            //****************************************
        }


        return redirect('alumni/research_activity_record_create');
    }

    public function research_activity_record_create()
    {
        $trainingCenterTypes = TrainingCenterType::all();
        return view('alumni/research_activity_record',compact('trainingCenterTypes'));
    }

    public function research_activity_record_store(Request $request)
    {
        if (isset($request['training_center_id'][0])) {
            $request->validate(ResearchActivityRecord::role());

            $count = count($request['training_center_id']);
            $userId = array();
            //return $request;

            for ($i = 0; $i < $count; $i++) {
                $userId[$i] = 1;//Auth::id()
                $researchActivityRecord=ResearchActivityRecord::create([
                    'training_center_id' => $request['training_center_id'][$i]=="other"
                        ? null
                        : $request['training_center_id'][$i],
                    'researches_title' => $request['researches_title'][$i],
                    'start_date' => $request['start_date'][$i],
                    'end_date' => $request['end_date'][$i],
                    'address' => $request['address'][$i],
                    'phone' => $request['phone'][$i],
                    'user_id' => 1//Auth::id(),
                ]);

                //***********************************

                if ($request['training_center_id'][$i]=="other"){
                    $fieldsOtherValue=FieldsOtherValue::create([
                        'table_name' => 'research_activity_records',
                        'table_title' => 'سوابق پژوهشی',
                        'field_name' => 'training_center_id',
                        'field_title' => 'نام مرکز پژوهشی',
                        'record_id' => $researchActivityRecord->id,
                        'new_value' => $request['training_center_title'][$i],
                        'applied' => false,
                    ]);
                }

                //****************************************
            }
        }

        return redirect('advertising_record/create');
    }
*/


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
