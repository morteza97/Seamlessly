<?php

use Illuminate\Database\Seeder;
use App\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create([
            'title' => 'کارشناسی'
        ]);

        Grade::create([
            'title' => 'کارشناسی ارشد'
        ]);

        Grade::create([
            'title' => 'دکتری'
        ]);
    }
}
