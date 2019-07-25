<?php

namespace App\Http\Controllers;

use App\AdvertisingRecordPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisingRecordPlacesController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $advertisingRecordPlaces=AdvertisingRecordPlace::all();
        return view('advertising_record_place.index',compact('advertisingRecordPlaces', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('advertising_record_place.create',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(AdvertisingRecordPlace::role());

        AdvertisingRecordPlace::create([
            'title'=>$request['title']
        ]);
        return redirect(route('advertising_record_place'));
    }

    public function show(AdvertisingRecordPlace $advertisingRecordPlace)
    {
        $user = Auth::user();
        return view('advertising_record_place.detail',compact('advertisingRecordPlace', 'user'));
    }

    public function edit(AdvertisingRecordPlace $advertisingRecordPlace)
    {
        $user = Auth::user();
        return view('advertising_record_place.edit',compact('advertisingRecordPlace', 'user'));
    }

    public function update(Request $request, AdvertisingRecordPlace $advertisingRecordPlace)
    {
        $request->validate(AdvertisingRecordPlace::role());

        $advertisingRecordPlace->update($request->all());
        return redirect(route('advertising_record_place'));
    }

    public function destroy(AdvertisingRecordPlace $advertisingRecordPlace)
    {
        $advertisingRecordPlace->delete();
        return redirect(route('advertising_record_place'));
    }
}
