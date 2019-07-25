<?php

namespace App\Http\Controllers;

use App\Country;
use App\Province;
use Illuminate\Http\Request;
use Auth;

class ProvincesController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $provinces=Province::all();
        return view('province.index',compact('provinces', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $countries=Country::all();
        return view('province.create',compact('countries', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate(Province::role());

        Province::create([
            'title'=>$request['title'],
            'country_id'=>$request['country_id']
        ]);

        return redirect(route('province.index'));
    }

    public function show(Province $province)
    {
        $user = Auth::user();
        return view('province.detail',compact('province', 'user'));
    }

    public function edit(Province $province)
    {
        $user = Auth::user();
        $countries=Country::all();
        return view('province.edit',compact('province','countries', 'user'));
    }

    public function update(Request $request, Province $province)
    {
        $request->validate(Province::role());

        $province->update($request->all());

        return redirect(route('province.index'));

    }

    public function destroy(Province $province)
    {
        $province->delete();

        return redirect(route('province.index'));

    }
}
