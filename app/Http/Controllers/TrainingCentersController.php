<?php

namespace App\Http\Controllers;

use App\TrainingCenter;
use App\TrainingCenterType;
use Illuminate\Http\Request;
use Auth;

class TrainingCentersController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $trainingCenters=TrainingCenter::all();
        return view('training_center.index',compact('trainingCenters', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $trainingCenterTypes=TrainingCenterType::all();
        return view('training_center.create',compact('trainingCenterTypes', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate(TrainingCenter::role());

        TrainingCenter::create([
            'training_center_type_id'=>$request['training_center_type_id'],
            'title'=>$request['title'],
            'address'=>$request['address'],
            'phone'=>$request['phone']
        ]);
        return redirect(route('training_center'));

    }

    public function show(TrainingCenter $trainingCenter)
    {
        $user = Auth::user();
        return view('training_center.detail',compact('$trainingCenter', 'user'));
    }

    public function edit(TrainingCenter $trainingCenter)
    {
        $user = Auth::user();
        return view('training_center.edit',compact('$trainingCenter', 'user'));
    }


    public function update(Request $request, TrainingCenter $trainingCenter)
    {
        $request->validate(TrainingCenter::role());

        $trainingCenter->update($request->all());
        return redirect(route('training_center'));
    }

    public function destroy(TrainingCenter $trainingCenter)
    {
        $trainingCenter->delete();
        return redirect(route('training_center'));
    }
}
