<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountriesController extends Controller
{
    public function index() {
        $countries=Country::all();
        $user = Auth::user();
        return view('country.index',compact('countries', 'user'));
    }

    public function create() {
        $user = Auth::user();
        return view('country.create', compact('user') );
    }

    public function store(Request $request) {

        $request->validate(Country::rules());

        //return $request->all();
        Country::create([
            'title'=>$request['title']
        ]);
        return redirect(route('country.index'));
    }

    public function show(Country $country) {
        //$country=Country::find($id);
        $user = Auth::user();
        return view('country.detail',compact('country', 'user'));
    }

    public function edit(Country $country) {
        $user = Auth::user();
        return view('country.edit',compact('country', 'user'));
    }

    public function update(Request $request, Country $country) {
        $request->validate(Country::role());

        $country->update($request->all());
        return redirect(route('country.index'));
    }

    public function destroy(Country $country) {
        //$country=Country::find($id);
        $country->delete();
        return redirect(route('country.index'));
    }
}
