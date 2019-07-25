<?php

use Illuminate\Database\Seeder;
use App\Term;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Term::create([
            'AcademicYear' => '1397',
            'StartDate' => '2019-02-04',
            'EndDate' => '2019-07-31',
            'Semester' => 'نیمسال دوم',
        ]);
    }
}
