<?php

namespace App\Http\Controllers;

use App\SeminaryFieldOfStudy;
use Illuminate\Http\Request;
use Auth;

class SeminaryFieldOfStudiesController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $seminaryFieldOfStudies=SeminaryFieldOfStudy::all();
        return view('seminary_field_of_study.index',compact('seminaryFieldOfStudies', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('seminary_field_of_study.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(SeminaryFieldOfStudy::role());

        //return $request->all();
        SeminaryFieldOfStudy::create([
            'title'=>$request['title']
        ]);
        return redirect(route('seminary_field_of_study.index'));
    }

    public function show(SeminaryFieldOfStudy $seminaryFieldOfStudy)
    {
        $user = Auth::user();
        return view('seminary_field_of_study.detail',compact('seminaryFieldOfStudy', 'user'));
    }

    public function edit(SeminaryFieldOfStudy $seminaryFieldOfStudy)
    {
        $user = Auth::user();
        return view('seminary_field_of_study.edit',compact('seminaryFieldOfStudy', 'user'));
    }

    public function update(Request $request, SeminaryFieldOfStudy $seminaryFieldOfStudy)
    {
        $request->validate(SeminaryFieldOfStudy::role());

        $seminaryFieldOfStudy->update($request->all());
        return redirect(route('seminary_field_of_study.index'));
    }

    public function destroy(SeminaryFieldOfStudy $seminaryFieldOfStudy)
    {
        $seminaryFieldOfStudy->delete();
        return redirect(route('seminary_field_of_study.index'));
    }
}
