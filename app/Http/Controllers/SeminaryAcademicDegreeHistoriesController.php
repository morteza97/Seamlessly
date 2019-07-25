<?php

namespace App\Http\Controllers;

use App\AlumniAssociation;
use App\FieldsOtherValue;
use App\SeminaryAcademicDegree;
use App\SeminaryAcademicDegreeHistory;
use App\SeminaryFieldOfStudy;
use App\SeminaryGrade;
use App\TrainingCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeminaryAcademicDegreeHistoriesController extends Controller
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
        $seminaryGrades=SeminaryGrade::all();
        $trainingCenters=TrainingCenter::where('training_center_type_id',3)->get();
        $seminaryAcademicDegrees=SeminaryAcademicDegree::all();
        $seminaryFieldOfStudies=SeminaryFieldOfStudy::all();
        //dd($seminaryFieldOfStudies);
        return view('seminary_academic_degree_history/create', compact(['seminaryGrades',
            'trainingCenters','seminaryAcademicDegrees','seminaryFieldOfStudies']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $count= count($request['seminary_academic_degree_id']);
        $userId=array();
        //$officialDocument=array();

        $request->validate(SeminaryAcademicDegreeHistory::role());

        $userId = Auth::id();
        $alumniAssociation=AlumniAssociation::where('user_id',$userId)->first();
        $alumniAssociation->seminary_grade_id=$request['seminary_grade_id'];
        $alumniAssociation->save();

        for ($i=0;$i<$count;$i++){
            if (isset($request['seminary_academic_degree_id'][$i])) {

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
                    'user_id' => $userId
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

        return redirect('college_education_history/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SeminaryAcademicDegreeHistory  $seminaryAcademicDegreeHistory
     * @return \Illuminate\Http\Response
     */
    public function show(SeminaryAcademicDegreeHistory $seminaryAcademicDegreeHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeminaryAcademicDegreeHistory  $seminaryAcademicDegreeHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(SeminaryAcademicDegreeHistory $seminaryAcademicDegreeHistory)
    {
        $trainingCenters=TrainingCenter::where('training_center_type_id',3)->get();
        $seminaryFieldOfStudies=SeminaryFieldOfStudy::all();
        //dd($seminaryFieldOfStudies);
        return view('seminary_academic_degree_history/edit', compact(['seminaryAcademicDegreeHistory',
            'trainingCenters','seminaryFieldOfStudies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeminaryAcademicDegreeHistory  $seminaryAcademicDegreeHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeminaryAcademicDegreeHistory $seminaryAcademicDegreeHistory)
    {
        //return $seminaryAcademicDegreeHistory;
        $request->validate(SeminaryAcademicDegreeHistory::role());

        $seminaryAcademicDegreeHistory->update($request->all());

        return redirect('alumni/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeminaryAcademicDegreeHistory  $seminaryAcademicDegreeHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeminaryAcademicDegreeHistory $seminaryAcademicDegreeHistory)
    {
        //
    }
}
