<?php

namespace App\Http\Controllers;

use App\SeminaryAcademicDegree;
use Illuminate\Http\Request;
use Auth;

class SeminaryAcademicDegreesController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $seminaryAcademicDegrees=SeminaryAcademicDegree::all();
        return view('seminary_academic_degree.index',compact('seminaryAcademicDegrees', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('seminary_academic_degree.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(SeminaryAcademicDegree::role());

        //return $request->all();
        SeminaryAcademicDegree::create([
            'title'=>$request['title']
        ]);
        return redirect(route('seminary_academic_degree.index'));
    }

    public function show(SeminaryAcademicDegree $seminaryAcademicDegree)
    {
        $user = Auth::user();
        return view('seminary_academic_degree.detail',compact('seminaryAcademicDegree', 'user'));
    }

    public function edit(SeminaryAcademicDegree $seminaryAcademicDegree)
    {
        $user = Auth::user();
        return view('seminary_academic_degree.edit',compact('seminaryAcademicDegree', 'user'));
    }

    public function update(Request $request, SeminaryAcademicDegree $seminaryAcademicDegree)
    {
        $request->validate(SeminaryAcademicDegree::role());

        $seminaryAcademicDegree->update($request->all());
        return redirect(route('seminary_academic_degree.index'));
    }

    public function destroy(SeminaryAcademicDegree $seminaryAcademicDegree)
    {
        $seminaryAcademicDegree->delete();
        return redirect(route('seminary_academic_degree.index'));
    }
}
