<?php

namespace App\Http\Controllers;

use App\ResponsibilityType;
use Illuminate\Http\Request;
use Auth;

class ResponsibilityTypesController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $responsibilityTypes=ResponsibilityType::all();
        return view('responsibility_type.index',compact('responsibilityTypes', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('responsibility_type.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(ResponsibilityType::role());

        ResponsibilityType::create([
            'title'=>$request['title']
        ]);
        return redirect(route('responsibility_type'));
    }

    public function show(ResponsibilityType $responsibilityType)
    {
        $user = Auth::user();
        return view('responsibility_type.detail',compact('responsibilityType', 'user'));
    }

    public function edit(ResponsibilityType $responsibilityType)
    {
        $user = Auth::user();
        return view('responsibility_type.edit',compact('responsibilityType', 'user'));
    }

    public function update(Request $request, ResponsibilityType $responsibilityType)
    {
        $request->validate(ResponsibilityType::role());

        $responsibilityType->update($request->all());
        return redirect(route('responsibility_type'));
    }

    public function destroy(ResponsibilityType $responsibilityType)
    {
        $responsibilityType->delete();
        return redirect(route('responsibility_type'));
    }
}
