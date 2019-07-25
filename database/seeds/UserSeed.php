<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'FirstName' => 'سید مرتضی',
            'LastName' => 'طاهری',
            'email' => 'taheri@maaref.ac.ir',
            'NationalCode' => '0372971601',
            'mobile' => '09196912014',
            'pic' => '1.jpg',
            'username' => 'Taheri',
            'password' => bcrypt('Smt372971601')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'FirstName' => 'سیدحسین',
            'LastName' => 'رکن الدینی',
            'email' => 'roknodini@maaref.ac.ir',
            'NationalCode' => '0384480144',
            'mobile' => '09123532115',
            'pic' => '2.jpg',
            'username' => 'Roknodini',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole('professor');

        $user = User::create([
            'FirstName' => 'محمدجواد',
            'LastName' => 'فلاح',
            'email' => 'falah@maaref.ac.ir',
            'NationalCode' => '6229754940',
            'mobile' => '09127525790',
            'pic' => '3.jpg',
            'username' => 'Fallah',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole('professor');

        $user = User::create([
            'FirstName' => 'محمد',
            'LastName' => 'هدایتی',
            'email' => 'hedayati@maaref.ac.ir',
            'NationalCode' => '0380931771',
            'mobile' => '09123512108',
            'pic' => '4.jpg',
            'username' => 'Hedayati',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole('professor');

        $user = User::create([
            'FirstName' => 'حسین',
            'LastName' => 'ارجینی',
            'email' => 'arjini@maaref.ac.ir',
            'NationalCode' => '5099459201',
            'mobile' => '09125520451',
            'pic' => '5.jpg',
            'username' => 'arjini',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole('professor');

        $user = User::create([
            'FirstName' => 'یعقوب',
            'LastName' => 'توکلی',
            'email' => 'Tavakoli@maaref.ac.ir',
            'NationalCode' => '0450810224',
            'mobile' => '09126014481',
            'pic' => '6.jpg',
            'username' => 'Tavakoli',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole('professor');

        $user = User::create([
            'FirstName' => 'كامران',
            'LastName' => 'اویسی',
            'email' => 'oveysi@maaref.ac.ir',
            'NationalCode' => '0069868281',
            'mobile' => '09351365503',
            'pic' => '7.jpg',
            'username' => 'Oveysi',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole('professor');

    }
}
