<?php

use Illuminate\Database\Seeder;
use App\FieldOfStudy;

class FieldOfStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FieldOfStudy::create([
            'title' => 'مدرسی معارف اسلامی'
        ]);

        FieldOfStudy::create([
            'title' => 'توسعه و تبليغ فرهنگ دينی'
        ]);

        FieldOfStudy::create([
            'title' => 'مدرسی اخلاق اسلامی'
        ]);

        FieldOfStudy::create([
            'title' => 'مدرسی انقلاب اسلامی'
        ]);

        FieldOfStudy::create([
            'title' => 'مدرسی تاریخ و تمدن اسلامی'
        ]);

        FieldOfStudy::create([
            'title' => 'مدرسی قرآن و متون اسلامی'
        ]);

        FieldOfStudy::create([
            'title' => 'مدرسی مبانی نظری اسلام'
        ]);
    }
}
