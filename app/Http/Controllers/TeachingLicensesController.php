<?php

namespace App\Http\Controllers;

use App\FieldsOtherValue;
use App\Lesson;
use App\TeachingLicense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachingLicensesController extends Controller
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
        $lessons=Lesson::all();
        return view('teaching_license.create',compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request['lesson_id'][0])) {
            $request->validate(TeachingLicense::role());

            $count = count($request['lesson_id']);
            $userId = Auth::id();
            //return $request;

            for ($i = 0; $i < $count; $i++) {



                $teachingLicense=TeachingLicense::create([
                    'lesson_id'=>$request['lesson_id'][$i]=="other"
                        ? null
                        : $request['lesson_id'][$i],
                    'license_number'=>$request['license_number'][$i],
                    'issue_date'=>$request['issue_date'][$i],
                    'user_id'=>$userId ,
                ]);
                //***********************************

                if ($request['lesson_id'][$i]=="other"){
                    $fieldsOtherValue=FieldsOtherValue::create([
                        'table_name' => 'teaching_licenses',
                        'table_title' => 'مجوز تدریس',
                        'field_name' => 'lesson_id',
                        'field_title' => 'نام درس',
                        'record_id' => $teachingLicense->id,
                        'new_value' => $request['lesson_title'][$i],
                        'applied' => false,
                    ]);
                }

                //****************************************
            }
        }

        return redirect(route('advertising_license.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeachingLicense  $teachingLicense
     * @return \Illuminate\Http\Response
     */
    public function show(TeachingLicense $teachingLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeachingLicense  $teachingLicense
     * @return \Illuminate\Http\Response
     */
    public function edit(TeachingLicense $teachingLicense)
    {
        $lessons=Lesson::all();
        return view('teaching_license.edit',compact(['teachingLicense','lessons']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeachingLicense  $teachingLicense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeachingLicense $teachingLicense)
    {
        $request->validate(TeachingLicense::role());
        $teachingLicense->update($request->all());

        return redirect('alumni/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeachingLicense  $teachingLicense
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachingLicense $teachingLicense)
    {
        //
    }
}
