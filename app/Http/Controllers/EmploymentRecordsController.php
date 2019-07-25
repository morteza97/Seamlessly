<?php

namespace App\Http\Controllers;

use App\City;
use App\EmploymentRecord;
use App\FieldsOtherValue;
use App\Province;
use App\ResponsibilityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploymentRecordsController extends Controller
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
        $provinces=Province::all();
        $responsibilityTypes=ResponsibilityType::all();
        return view('employment_record.create',compact(['provinces','responsibilityTypes']));
    }

    public function getProvinceTitle($provinceID)
    {

        $province = Province::where("id", $provinceID)->first();

        return $province->title;

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
        if (isset($request['workplace_name'][0])) {
            $request->validate(EmploymentRecord::role());

            $count = count($request['workplace_name']);
            $userId =Auth::id();
            //return $request;

            for ($i = 0; $i < $count; $i++) {
                $employmentRecord=EmploymentRecord::create([
                    'workplace_name' => $request['workplace_name'][$i],
                    'responsibility_type_id' => $request['responsibility_type_id'][$i]=="other"
                        ? null
                        : $request['responsibility_type_id'][$i],
                    'city_id' => $request['city_id'][$i]=="other"
                        ? null
                        : $request['city_id'][$i],
                    'start_date' => $request['start_date'][$i],
                    'end_date' => $request['end_date'][$i],
                    'address' => $request['address'][$i],
                    'phone' => $request['phone'][$i],
                    'user_id' => $userId
                ]);
                //***********************************

                if ($request['responsibility_type_id'][$i]=="other"){
                    $fieldsOtherValue=FieldsOtherValue::create([
                        'table_name' => 'employment_records',
                        'table_title' => 'سوابق اشتغال',
                        'field_name' => 'training_center_id',
                        'field_title' => 'نوع مسئولیت',
                        'record_id' => $employmentRecord->id,
                        'new_value' => $request['responsibility_type_title'][$i],
                        'applied' => false,
                    ]);
                }

                if ($request['city_id'][$i]=="other"){
                    $province=$this->getProvinceTitle($request['province_id'][$i]);
                    $fieldsOtherValue=FieldsOtherValue::create([
                        'table_name' => 'employment_records',
                        'table_title' => 'سوابق اشتغال',
                        'field_name' => 'city_id',
                        'field_title' => 'نام شهرستان',
                        'record_id' => $employmentRecord->id,
                        'new_value' => $request['city_title'][$i].' از استان '.$province,
                        'applied' => false,
                    ]);
                }

                //****************************************
            }
        }
        return redirect(route('teaching_license.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmploymentRecord  $employmentRecord
     * @return \Illuminate\Http\Response
     */
    public function show(EmploymentRecord $employmentRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmploymentRecord  $employmentRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(EmploymentRecord $employmentRecord)
    {
        $provinces=Province::all();
        $cities=City::where('province_id',$employmentRecord->city->province_id)->get();
        $responsibilityTypes=ResponsibilityType::all();
        return view('employment_record.edit',compact(['employmentRecord','provinces','cities',
            'responsibilityTypes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmploymentRecord  $employmentRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmploymentRecord $employmentRecord)
    {
        $request->validate(EmploymentRecord::role());
        $employmentRecord->update($request->all());

        return redirect('alumni/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmploymentRecord  $employmentRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmploymentRecord $employmentRecord)
    {
        //
    }
}
