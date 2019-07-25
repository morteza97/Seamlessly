<?php

namespace App\Http\Controllers;

use App\FieldOfStudy;
use App\Orientation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrientationsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orientations=Orientation::all();
        return view('orientation.index',compact('orientations', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $fieldOfStudies=FieldOfStudy::all();

        return view('orientation.create',compact('fieldOfStudies', 'user'));

    }

    public function store(Request $request)
    {
        $request->validate(Orientation::rules());

        Orientation::create([
            'title' => $request['title'],
            'field_of_study_id' => $request['field_of_study_id']
        ]);
        return redirect(route('orientation.index'));
    }

    public function show(Orientation $orientation)
    {
        $user = Auth::user();
        return view('orientation.detail', compact('orientation', 'user'));
    }

    public function edit(Orientation $orientation)
    {
        $user = Auth::user();
        $fieldOfStudies = FieldOfStudy::all();

        return view('orientation.edit', compact('fieldOfStudies', 'user' ,'orientation'));
    }

    public function update(Request $request, Orientation $orientation)
    {
        $request->validate(Orientation::rules());
        $orientation->update($request->all());
        return redirect(route('orientation.index'));
    }

    public function destroy(Orientation $orientation)
    {
        $orientation->delete();
        return redirect(route('orientation.index'));
    }
}
