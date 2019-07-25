<?php

namespace App\Http\Controllers;

use App\FieldsOtherValue;
use App\ResearchActivityRecord;
use App\TrainingCenter;
use App\TrainingCenterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResearchActivityRecordsController extends Controller
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
        return view('research_activity_record/create',compact('trainingCenterTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request['training_center_id'][0])) {
            $request->validate(ResearchActivityRecord::role());

            $count = count($request['training_center_id']);
            $userId = Auth::id();
            //return $request;

            for ($i = 0; $i < $count; $i++) {

                $researchActivityRecord=ResearchActivityRecord::create([
                    'training_center_id' => $request['training_center_id'][$i]=="other"
                        ? null
                        : $request['training_center_id'][$i],
                    'researches_title' => $request['researches_title'][$i],
                    'start_date' => $request['start_date'][$i],
                    'end_date' => $request['end_date'][$i],
                    'address' => $request['address'][$i],
                    'phone' => $request['phone'][$i],
                    'user_id' => $userId,
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

    /**
     * Display the specified resource.
     *
     * @param  \App\ResearchActivityRecord  $researchActivityRecord
     * @return \Illuminate\Http\Response
     */
    public function show(ResearchActivityRecord $researchActivityRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResearchActivityRecord  $researchActivityRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(ResearchActivityRecord $researchActivityRecord)
    {
        $trainingCenterTypes = TrainingCenterType::all();
        $trainingCenters=TrainingCenter::where('training_center_type_id',
            $researchActivityRecord->trainingCenter->training_center_type_id)->get();
        return view('research_activity_record/edit',compact(['researchActivityRecord','trainingCenterTypes',
            'trainingCenters']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResearchActivityRecord  $researchActivityRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchActivityRecord $researchActivityRecord)
    {
        $request->validate(ResearchActivityRecord::role());
        $researchActivityRecord->update($request->all());

        return redirect('alumni/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResearchActivityRecord  $researchActivityRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResearchActivityRecord $researchActivityRecord)
    {
        //
    }
}
