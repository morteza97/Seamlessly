<?php

namespace App\Http\Controllers;

use App\SeminaryGrade;
use Illuminate\Http\Request;
use Auth;

class SeminaryGradesController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $seminaryGrades=SeminaryGrade::all();
        return view('seminary_grade.index', compact('seminaryGrades', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('seminary_grade.create', compact( 'user'));
    }

    public function store(Request $request)
    {
        $request->validate(SeminaryGrade::role());

        //return $request->all();
        SeminaryGrade::create([
            'title'=>$request['title']
        ]);
        return redirect(route('seminary_grade.index'));
    }

    public function show(SeminaryGrade $seminaryGrade)
    {
        $user = Auth::user();
        return view('seminary_grade.detail', compact('seminaryGrade', 'user'));
    }

    public function edit(SeminaryGrade $seminaryGrade)
    {
        $user = Auth::user();
        return view('seminary_grade.edit', compact('seminaryGrade', 'user'));
    }

    public function update(Request $request, SeminaryGrade $seminaryGrade)
    {
        $request->validate(SeminaryGrade::role());

        $seminaryGrade->update($request->all());
        return redirect(route('seminary_grade.index'));
    }

    public function destroy(SeminaryGrade $seminaryGrade)
    {
        $seminaryGrade->delete();
        return redirect(route('seminary_grade.index'));
    }
}
