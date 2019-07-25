<?php

namespace App\Http\Controllers;

use App\LessonGender;
use Illuminate\Http\Request;
use Auth;

class LessonGenderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $lessons_gender = LessonGender::all();
        return view('maaref_lessons.lesson_gender_index',compact('lessons_gender', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('maaref_lessons.lesson_gender_create', compact('user') );
    }

    public function store(Request $request)
    {
        $request->validate(LessonGender::rules());

        LessonGender::create([
            'title'=>$request['title']
        ]);
        return redirect( route('lesson_genders.index') );
    }

    public function show(LessonGender $lessonGender)
    {
        $user = Auth::user();
        return view('maaref_lessons.lesson_gender_detail',compact('lessonGender', 'user'));
    }

    public function edit(LessonGender $lessonGender)
    {
        $user = Auth::user();
        return view('maaref_lessons.lesson_gender_edit',compact('lessonGender', 'user'));
    }

    public function update(Request $request, LessonGender $lessonGender)
    {
        $request->validate(LessonGender::rules());

        $lessonGender->update($request->all());
        return redirect(route('lesson_genders.index'));
    }

    public function destroy(LessonGender $lessonGender)
    {
        $lessonGender->delete();
        return redirect(route('lesson_genders.index'));
    }
}
