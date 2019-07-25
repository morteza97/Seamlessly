<?php

namespace App\Http\Controllers;

use App\AdvertisingRecord;
use App\AdvertisingRecordPlace;
use App\FieldsOtherValue;
use App\TrainingCenter;
use App\TrainingCenterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisingRecordsController extends Controller
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
            $advertisingRecordPlaces = AdvertisingRecordPlace::all();
        return view('advertising_record.create',compact(['trainingCenterTypes','advertisingRecordPlaces']));
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
            $request->validate(AdvertisingRecord::role());

            $count = count($request['training_center_id']);
            $userId = Auth::id();

            for ($i = 0; $i < $count; $i++) {

                $advertisingRecord=AdvertisingRecord::create([
                    'training_center_id' => $request['training_center_id'][$i]=="other"
                        ? null
                        : $request['training_center_id'][$i],
                    'advertising_record_place_id' => $request['advertising_record_place_id'][$i]=="other"
                        ? null
                        : $request['advertising_record_place_id'][$i],
                    'start_date' => $request['start_date'][$i],
                    'end_date' => $request['end_date'][$i],
                    'address' => $request['address'][$i],
                    'phone' => $request['phone'][$i],
                    'user_id' => $userId,
                ]);
                //***********************************

                if ($request['training_center_id'][$i]=="other"){
                    $fieldsOtherValue=FieldsOtherValue::create([
                        'table_name' => 'advertising_records',
                        'table_title' => 'سوابق تبلیغی',
                        'field_name' => 'training_center_id',
                        'field_title' => 'نام مرکز تبلیغی',
                        'record_id' => $advertisingRecord->id,
                        'new_value' => $request['training_center_title'][$i],
                        'applied' => false,
                    ]);
                }

                if ($request['advertising_record_place_id'][$i]=="other"){
                    $fieldsOtherValue=FieldsOtherValue::create([
                        'table_name' => 'advertising_records',
                        'table_title' => 'سوابق تبلیغی',
                        'field_name' => 'advertising_record_place_id',
                        'field_title' => 'محل تبلیغ',
                        'record_id' => $advertisingRecord->id,
                        'new_value' => $request['advertising_record_place_title'][$i],
                        'applied' => false,
                    ]);
                }

                //****************************************
            }
        }
        return redirect('employment_record/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdvertisingRecord  $advertisingRecord
     * @return \Illuminate\Http\Response
     */
    public function show(AdvertisingRecord $advertisingRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdvertisingRecord  $advertisingRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvertisingRecord $advertisingRecord)
    {

        $trainingCenterTypes = TrainingCenterType::all();
        $trainingCenters=TrainingCenter::where('training_center_type_id',
            $advertisingRecord->trainingCenter->training_center_type_id)->get();
        $advertisingRecordPlaces = AdvertisingRecordPlace::all();
        //return $advertisingRecordPlaces;
        return view('advertising_record.edit',compact(['advertisingRecord','trainingCenterTypes',
            'advertisingRecordPlaces','trainingCenters']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdvertisingRecord  $advertisingRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertisingRecord $advertisingRecord)
    {
        $request->validate(AdvertisingRecord::role());
        $advertisingRecord->update($request->all());

        return redirect('alumni/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdvertisingRecord  $advertisingRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertisingRecord $advertisingRecord)
    {
        //
    }
}
