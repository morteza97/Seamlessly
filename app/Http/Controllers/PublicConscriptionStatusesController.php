<?php

namespace App\Http\Controllers;

use App\PublicConscriptionStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicConscriptionStatusesController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $publicConscriptionStatuses=PublicConscriptionStatus::all();
        return view('public_conscription_status.index',compact('publicConscriptionStatuses', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('public_conscription_status.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(PublicConscriptionStatus::role());

        PublicConscriptionStatus::create([
            'title'=>$request['title']
        ]);
        return redirect('public_conscription_status');
    }

    public function show(PublicConscriptionStatus $publicConscriptionStatus)
    {
        $user = Auth::user();
        return view('public_conscription_status.detail',compact('publicConscriptionStatus', 'user'));
    }

    public function edit(PublicConscriptionStatus $publicConscriptionStatus)
    {
        $user = Auth::user();
        return view('public_conscription_status.edit',compact('publicConscriptionStatus', 'user'));
    }

    public function update(Request $request, PublicConscriptionStatus $publicConscriptionStatus)
    {
        $request->validate(PublicConscriptionStatus::role());

        $publicConscriptionStatus->update($request->all());
        return redirect('public_conscription_status');
    }

    public function destroy(PublicConscriptionStatus $publicConscriptionStatus)
    {
        $publicConscriptionStatus->delete();
        return redirect('public_conscription_status');
    }
}
