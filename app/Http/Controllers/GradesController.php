<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $grades=Grade::all();
        return view('grade.index',compact('grades', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('grade.create',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(Grade::rules());

        Grade::create(['title' => $request['title']]);
        return redirect(route('grade.index'));
    }

    public function show(Grade $grade)
    {
        $user = Auth::user();
        return view('grade.detail',compact('grade', 'user'));
    }

    public function edit(Grade $grade)
    {
        $user = Auth::user();
        return view('grade.edit',compact('grade', 'user'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate(Grade::role());

        $grade->update($request->all());
        return redirect(route('grade.index'));
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect(route('grade.index'));
    }
}
