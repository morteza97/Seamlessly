<?php

use Illuminate\Database\Seeder;
use App\LessonGender;

class LessonsGenderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LessonGender::create([
            'title' => 'برادران',
        ]);

        LessonGender::create([
            'title' => 'خواهران',
        ]);

        LessonGender::create([
            'title' => 'مختلط',
        ]);

    }
}
