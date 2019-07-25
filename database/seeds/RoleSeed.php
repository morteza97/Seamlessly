<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('users_manage');
        $role->givePermissionTo('manage_reservations');
        $role->givePermissionTo('manage_payments');
        $role->givePermissionTo('manage_payments');
        $role->givePermissionTo('manage_AlumniAssociation');

        $role = Role::create(['name' => 'professor']);
        $role->givePermissionTo('manage_resume');

    }
}
