<?php

use Illuminate\Database\Seeder;
use App\LessonType;

class LessonsTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LessonType::create([
            'title' => 'اختیاری',
        ]);

        LessonType::create([
            'title' => 'اصلی',
        ]);

        LessonType::create([
            'title' => 'امتحان جامع',
        ]);

        LessonType::create([
            'title' => 'پروژه',
        ]);

        LessonType::create([
            'title' => 'تخصصی',
        ]);

        LessonType::create([
            'title' => 'اختیاری',
        ]);

        LessonType::create([
            'title' => 'جبرانی',
        ]);

        LessonType::create([
            'title' => 'رساله دکتری',
        ]);

    }
}
