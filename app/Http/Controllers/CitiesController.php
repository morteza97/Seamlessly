<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Province;
use Illuminate\Http\Request;
use Auth;

class CitiesController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $cities=City::all();
        return  view('city.index',compact('cities', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $countries=Country::all();
        return view('city.create',compact('countries', 'user'));
    }

    public function getProvinceList($country_id)
    {
//        return $request;
        //if ($request->ajax()) {
            $provinces = Province::where("country_id", $country_id)
                ->pluck("title", "id");
                return response()->json($provinces);
        //}
    }

    public function store(Request $request)
    {
        $request->validate(City::role());

        //return $request->all();
        City::create([
            'title'=>$request['title'],
            'province_id'=>$request['province_id']
        ]);
        return redirect(route('city.index'));
    }

    public function show(City $city)
    {
        $user = Auth::user();
        return view('city.detail',compact('city', 'user'));
    }

    public function edit(City $city)
    {
        $user = Auth::user();
        $countries=Country::all();
        $provinces=Province::where('country_id',1)->get();
        //dd($provinces);
        return view('city.edit',compact('city','countries','provinces', 'user'));
    }

    public function update(Request $request, City $city)
    {
        $city->update($request->all());
        return redirect(route('city.index'));
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect(route('city.index'));
    }
}
