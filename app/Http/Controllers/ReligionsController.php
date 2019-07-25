<?php

namespace App\Http\Controllers;

use App\Religion;
use Illuminate\Http\Request;
use Auth;

class ReligionsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $religions=Religion::all();
        return view('religion.index',compact('religions', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('religion.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(Religion::role());

        Religion::create([
            'title'=>$request['title']
        ]);
        return redirect(route('religion.index'));
    }

    public function show(Religion $religion)
    {
        $user = Auth::user();
        return view('religion.detail',compact('religion', 'user'));
    }

    public function edit(Religion $religion)
    {
        $user = Auth::user();
        return view('religion.edit',compact('religion', 'user'));

    }

    public function update(Request $request, Religion $religion)
    {
        $request->validate(Religion::role());

        $religion->update($request->all());
        return redirect(route('religion.index'));
    }

    public function destroy(Religion $religion)
    {
        $religion->delete();
        return redirect(route('religion.index'));
    }
}
