<?php

namespace App\Http\Controllers;

use App\AdvertisingLicense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisingLicensesController extends Controller
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
        return view('advertising_license.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request['file_number'][0])) {
            $request->validate(AdvertisingLicense::role());

            $count = count($request['file_number']);
            $userId = Auth::id();
            //return $request;

            for ($i = 0; $i < $count; $i++) {



                $advertisingLicense = AdvertisingLicense::create([
                    'file_number' => $request['file_number'][$i],
                    'license_number' => $request['license_number'][$i],
                    'issue_date' => $request['issue_date'][$i],
                    'user_id' => $userId,
                ]);
            }
        }

        return redirect(route('scientific_reference.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\AdvertisingLicense $advertisingLicense
     * @return \Illuminate\Http\Response
     */
    public function show(AdvertisingLicense $advertisingLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\AdvertisingLicense $advertisingLicense
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvertisingLicense $advertisingLicense)
    {
        return view('advertising_license.edit',compact('advertisingLicense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\AdvertisingLicense $advertisingLicense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertisingLicense $advertisingLicense)
    {
        $request->validate(AdvertisingLicense::role());
        $advertisingLicense->update($request->all());

        return redirect('alumni/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AdvertisingLicense $advertisingLicense
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertisingLicense $advertisingLicense)
    {
        //
    }

}
