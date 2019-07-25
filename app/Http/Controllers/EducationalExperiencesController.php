<?php

namespace App\Http\Controllers;

use App\EducationalExperience;
use App\FieldsOtherValue;
use App\Grade;
use App\TrainingCenter;
use App\TrainingCenterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationalExperiencesController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainingCenterTypes = TrainingCenterType::all();
        $grades = Grade::all();
        return view('educational_experience/create',compact(['trainingCenterTypes','grades']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(EducationalExperience::role());

        $count= count($request['grade_id']);
        $userId = Auth::id();

        for ($i=0;$i<$count;$i++) {


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
                'user_id'=>$userId//Auth::id(),
            ]);

            //***********************************
            /*if ($request['country_id'][$i]=="other"){
                $fieldsOtherValue=FieldsOtherValue::create([
                    'table_name' => 'educational_experiences',
                    'table_title' => 'سوابق آموزشی',
                    'field_name' => 'training_center_type_id',
                    'field_title' => 'نوع مرکز آموزشی',
                    'record_id' => $educationalExperience->id,
                    'new_value' => $request['training_center_type_title'][$i],
                    'applied' => false,
                ]);

            }*/

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


        return redirect('research_activity_record/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EducationalExperience  $educationalExperience
     * @return \Illuminate\Http\Response
     */
    public function show(EducationalExperience $educationalExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EducationalExperience  $educationalExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationalExperience $educationalExperience)
    {
        $trainingCenterTypes = TrainingCenterType::all();
        $trainingCenters=TrainingCenter::where('training_center_type_id',
            $educationalExperience->trainingCenter->training_center_type_id)->get();
        $grades = Grade::all();
        return view('educational_experience/edit',compact(['educationalExperience','trainingCenterTypes',
            'trainingCenters','grades']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EducationalExperience  $educationalExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationalExperience $educationalExperience)
    {
        $request->validate(EducationalExperience::role());
        $educationalExperience->update($request->all());

        return redirect('alumni/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EducationalExperience  $educationalExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationalExperience $educationalExperience)
    {
        //
    }
}
