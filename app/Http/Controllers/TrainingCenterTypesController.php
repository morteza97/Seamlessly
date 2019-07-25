<?php

namespace App\Http\Controllers;

use App\TrainingCenterType;
use Illuminate\Http\Request;
use Auth;

class TrainingCenterTypesController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $trainingCenterTypes=TrainingCenterType::all();
        return view('training_center_type.index',compact('trainingCenterTypes', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('training_center_type.create',compact( 'user'));
    }

    public function store(Request $request)
    {
        $request->validate(TrainingCenterType::role());

        TrainingCenterType::create([
            'title'=>$request['title']
        ]);
        return redirect(route('training_center_type.index'));
    }

    public function show(TrainingCenterType $trainingCenterType)
    {
        $user = Auth::user();
        return view('training_center_type.detail',compact('trainingCenterType', 'user'));
    }

    public function edit(TrainingCenterType $trainingCenterType)
    {
        $user = Auth::user();
        return view('training_center_type.edit',compact('trainingCenterType', 'user'));
    }

    public function update(Request $request, TrainingCenterType $trainingCenterType)
    {
        $request->validate(TrainingCenterType::role());

        $trainingCenterType->update($request->all());
        return redirect(route('training_center_type.index'));
    }

    public function destroy(TrainingCenterType $trainingCenterType)
    {
        $trainingCenterType->delete();
        return redirect(route('training_center_type.index'));
    }
}
