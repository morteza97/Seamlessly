<?php

namespace App\Http\Controllers;

use App\LessonMethod;
use Illuminate\Http\Request;
use Auth;

class LessonMethodController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $lessons_method = LessonMethod::all();
        return view('maaref_lessons.lesson_method_index',compact('lessons_method', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('maaref_lessons.lesson_method_create', compact('user') );
    }

    public function store(Request $request)
    {
        $request->validate(LessonMethod::rules());

        LessonMethod::create([
            'title'=>$request['title']
        ]);
        return redirect( route('lesson_methods.index') );
    }

    public function show(LessonMethod $lessonMethod)
    {
        $user = Auth::user();
        return view('maaref_lessons.lesson_method_detail',compact('lessonMethod', 'user'));
    }

    public function edit(LessonMethod $lessonMethod)
    {
        $user = Auth::user();
        return view('maaref_lessons.lesson_method_edit',compact('lessonMethod', 'user'));
    }

    public function update(Request $request, LessonMethod $lessonMethod)
    {
        $request->validate(LessonMethod::rules());

        $lessonMethod->update($request->all());
        return redirect(route('lesson_methods.index'));
    }

    public function destroy(LessonMethod $lessonMethod)
    {
        $lessonMethod->delete();
        return redirect(route('lesson_methods.index'));
    }
}
