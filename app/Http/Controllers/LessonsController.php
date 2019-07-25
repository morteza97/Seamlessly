<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $lessons=Lesson::all();
        return view('lesson.index',compact('lessons', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('lesson.create', compact('user') );
    }

    public function store(Request $request)
    {
        $request->validate(Lesson::role());

        Lesson::create([
            'title'=>$request['title']
        ]);
        return redirect(route('lesson.index'));
    }

    public function show(Lesson $lesson)
    {
        $user = Auth::user();
        return view('lesson.detail',compact('lesson', 'user'));
    }

    public function edit(Lesson $lesson)
    {
        $user = Auth::user();
        return view('lesson.edit',compact('lesson', 'user'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate(Lesson::role());

        $lesson->update($request->all());
        return redirect(route('lesson.index'));
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect(route('lesson.index'));
    }
}
