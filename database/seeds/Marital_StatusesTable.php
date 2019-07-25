<?php

use Illuminate\Database\Seeder;
use App\MaritalStatus;
class Marital_StatusesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MaritalStatus::create(['title' => 'مجرد']);
        MaritalStatus::create(['title' => 'متأهل']);
    }
}
