<?php

namespace App\Http\Controllers;

use App\CollegeEducationHistory;
use App\Country;
use App\FieldOfStudy;
use App\FieldsOtherValue;
use App\Grade;
use App\Orientation;
use App\TrainingCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollegeEducationHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

//    public function getOrientationList($fieldOfStudyId)
//    {
//
//        $orientations = Orientation::where("field_of_study_id", $fieldOfStudyId)
//            ->pluck("title", "id");
//        return response()->json($orientations);
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades=Grade::all();
        $fieldOfStudies=FieldOfStudy::all();
        $orientations=Orientation::all();
        $trainingCenters=/*TrainingCenter::all();*/TrainingCenter::where("training_center_type_id",1)->get()/*->pluck("id","title")*/;
        $countries=Country::all();
        //dd($trainingCenters);
        return view('college_education_history/create', compact(['grades',
            'fieldOfStudies','orientations','trainingCenters','countries']));
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

        $count= count($request['grade_id']);
        $userId=array();

        $request->validate(CollegeEducationHistory::role());

        for ($i=0;$i<$count;$i++){
            $userId[$i]=Auth::id();
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
                'country_id'=>$request['country_id'][$i]=="other"
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

        return redirect('educational_experience/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CollegeEducationHistory  $collegeEducationHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CollegeEducationHistory $collegeEducationHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CollegeEducationHistory  $collegeEducationHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(CollegeEducationHistory $collegeEducationHistory)
    {
        $grades=Grade::all();
        $fieldOfStudies=FieldOfStudy::all();
        $orientations=Orientation::where("field_of_study_id",$collegeEducationHistory->field_of_study_id)->get();
        $trainingCenters=TrainingCenter::where("training_center_type_id",1)->get();
        $countries=Country::all();
        //dd($trainingCenters);
        return view('college_education_history/edit', compact(['collegeEducationHistory','grades',
            'fieldOfStudies','orientations','trainingCenters','countries']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CollegeEducationHistory  $collegeEducationHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CollegeEducationHistory $collegeEducationHistory)
    {
        $request->validate(CollegeEducationHistory::role());

        $collegeEducationHistory->update($request->all());

        return redirect('alumni/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CollegeEducationHistory  $collegeEducationHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CollegeEducationHistory $collegeEducationHistory)
    {
        //
    }
}
