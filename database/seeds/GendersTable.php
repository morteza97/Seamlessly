<?php

use Illuminate\Database\Seeder;
use App\Gender;

class GendersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Gender = Gender::create(['title' => 'مرد']);
        $Gender = Gender::create(['title' => 'زن']);
    }
}
