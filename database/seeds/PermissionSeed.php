<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'users_manage','system_id' => 1]);
        Permission::create(['name' => 'manage_resume','system_id' => 1]);
        Permission::create(['name' => 'manage_payments','system_id' => 3]);
        Permission::create(['name' => 'manage_reservations','system_id' => 2]);
        Permission::create(['name' => 'manage_tickets','system_id' => 4]);
        Permission::create(['name' => 'manage_AlumniAssociation','system_id' => 5]);
    }
}
