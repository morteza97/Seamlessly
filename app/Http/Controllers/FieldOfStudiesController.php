<?php

namespace App\Http\Controllers;

use App\FieldOfStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FieldOfStudiesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $fieldOfStudies=FieldOfStudy::all();
        return view('field_of_study.index',compact('fieldOfStudies', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('field_of_study.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(FieldOfStudy::rules());

        FieldOfStudy::create([
            'title'=>$request['title']
        ]);
        return redirect(route('field_of_study.index'));
    }

    public function show(FieldOfStudy $fieldOfStudy)
    {
        $user = Auth::user();
        return view('field_of_study.detail',compact('fieldOfStudy', 'user'));
    }

    public function edit(FieldOfStudy $fieldOfStudy)
    {
        $user = Auth::user();
        return view('field_of_study.edit',compact('fieldOfStudy', 'user'));
    }

    public function update(Request $request, FieldOfStudy $fieldOfStudy)
    {
        $request->validate(FieldOfStudy::rules());

        $fieldOfStudy->update($request->all());
        return redirect(route('field_of_study.index'));
    }

    public function destroy(FieldOfStudy $fieldOfStudy)
    {
        $fieldOfStudy->delete();
        return redirect(route('field_of_study.index'));
    }
}
