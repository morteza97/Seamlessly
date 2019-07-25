<?php

namespace App\Http\Controllers;

use App\MaritalStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaritalStatusesController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $maritalStatuses=MaritalStatus::all();
        return view('marital_status.index',compact('maritalStatuses', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('marital_status.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(MaritalStatus::role());

        MaritalStatus::create([
            'title'=>$request['title']
        ]);
        return redirect(route('marital_status.index'));
    }

    public function show(MaritalStatus $maritalStatus)
    {
        $user = Auth::user();
        return view('marital_status.detail',compact('maritalStatus', 'user'));
    }

    public function edit(MaritalStatus $maritalStatus)
    {
        $user = Auth::user();
        return view('marital_status.edit',compact('maritalStatus', 'user'));
    }

    public function update(Request $request, MaritalStatus $maritalStatus)
    {
        $request->validate(MaritalStatus::role());

        $maritalStatus->update($request->all());
        return redirect(route('marital_status.index'));
    }

    public function destroy(MaritalStatus $maritalStatus)
    {
        $maritalStatus->delete();
        return redirect(route('marital_status.index'));
    }
}
