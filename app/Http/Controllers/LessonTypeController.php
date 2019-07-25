<?php

namespace App\Http\Controllers;

use App\LessonType;
use Illuminate\Http\Request;
use Auth;

class LessonTypeController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $lessons_type = LessonType::all();
        return view('maaref_lessons.lesson_type_index',compact('lessons_type', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('maaref_lessons.lesson_type_create', compact('user') );
    }

    public function store(Request $request)
    {
        $request->validate(LessonType::rules());

        LessonType::create([
            'title'=>$request['title']
        ]);
        return redirect( route('lesson_types.index') );
    }

    public function show(LessonType $lessonType)
    {
        $user = Auth::user();
        return view('maaref_lessons.lesson_type_detail',compact('lessonType', 'user'));
    }

    public function edit(LessonType $lessonType)
    {
        $user = Auth::user();
        return view('maaref_lessons.lesson_type_edit',compact('lessonType', 'user'));
    }

    public function update(Request $request, LessonType $lessonType)
    {
        $request->validate(LessonType::rules());

        $lessonType->update($request->all());
        return redirect(route('lesson_types.index'));
    }

    public function destroy(LessonType $lessonType)
    {
        $lessonType->delete();
        return redirect(route('lesson_types.index'));
    }
}
