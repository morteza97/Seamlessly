<?php

use Illuminate\Database\Seeder;
use App\Orientation;

class OrientationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orientation::create([
            'title' => 'اخلاق اسلامی',
            'field_of_study_id' => 1
        ]);

        Orientation::create([
            'title' => 'انقلاب اسلامی',
            'field_of_study_id' => 1
        ]);

        Orientation::create([
            'title' => 'تاریخ و تمدن اسلامی',
            'field_of_study_id' => 1
        ]);

        Orientation::create([
            'title' => 'قرآن و متون اسلامی',
            'field_of_study_id' => 1
        ]);

        Orientation::create([
            'title' => 'مبانی نظری اسلام',
            'field_of_study_id' => 1
        ]);

        Orientation::create([
            'title' => 'تبليغ دين',
            'field_of_study_id' => 2
        ]);

        Orientation::create([
            'title' => 'مديريت فرهنگی',
            'field_of_study_id' => 2
        ]);

        Orientation::create([
            'title' => 'مشاوره',
            'field_of_study_id' => 2
        ]);

        Orientation::create([
            'title' => 'اخلاق اسلامی',
            'field_of_study_id' => 3
        ]);

        Orientation::create([
            'title' => 'انقلاب اسلامی',
            'field_of_study_id' => 4
        ]);

        Orientation::create([
            'title' => 'تاریخ و تمدن اسلامی',
            'field_of_study_id' => 5
        ]);

        Orientation::create([
            'title' => 'قرآن و متون اسلامی',
            'field_of_study_id' => 6
        ]);

        Orientation::create([
            'title' => 'مبانی نظری اسلام',
            'field_of_study_id' => 7
        ]);
    }
}
