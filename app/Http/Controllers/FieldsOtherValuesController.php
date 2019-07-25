<?php

namespace App\Http\Controllers;

use App\FieldsOtherValue;
use Illuminate\Http\Request;

class FieldsOtherValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fieldOtherValues=FieldsOtherValue::all();

        return view('field_other_value.index',compact('fieldOtherValues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FieldsOtherValue  $fieldsOtherValue
     * @return \Illuminate\Http\Response
     */
    public function show(FieldsOtherValue $fieldsOtherValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FieldsOtherValue  $fieldsOtherValue
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldsOtherValue $fieldsOtherValue)
    {
        switch ($fieldsOtherValue->table_name)
        {
            case 'seminary_academic_degree_histories':

                break;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FieldsOtherValue  $fieldsOtherValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldsOtherValue $fieldsOtherValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FieldsOtherValue  $fieldsOtherValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldsOtherValue $fieldsOtherValue)
    {
        //
    }
}
