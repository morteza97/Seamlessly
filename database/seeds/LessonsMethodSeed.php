<?php

use Illuminate\Database\Seeder;
use App\LessonGender;

class LessonsMethodSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LessonGender::create([
            'title' => 'تئوری',
        ]);

        LessonGender::create([
            'title' => 'عملی',
        ]);

        LessonGender::create([
            'title' => 'تئوری / عملی',
        ]);

    }
}
