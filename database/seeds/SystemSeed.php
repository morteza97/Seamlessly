<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Systems;

class SystemSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Systems::create(['name' => 'members']);
        Systems::create(['name' => 'reservation']);
        Systems::create(['name' => 'payments']);
        Systems::create(['name' => 'tickets']);
        Systems::create(['name' => 'AlumniAssociation']);
    }
}
