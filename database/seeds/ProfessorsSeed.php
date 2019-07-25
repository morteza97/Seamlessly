<?php

use Illuminate\Database\Seeder;
use App\Professors;
class ProfessorsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Professors::create([
            'ProfessorNumber' => '300044',
            'nickname' => 'حجت الاسلام و المسلمین آقای دكتر',
            'group_id' => 1,
            'level_id' => 2,
            'user_id' => 2,
        ]);

        Professors::create([
            'ProfessorNumber' => '300208',
            'nickname' => 'آقای دكتر',
            'group_id' => 1,
            'level_id' => 3,
            'user_id' => 3,
        ]);

        Professors::create([
            'ProfessorNumber' => '300114',
            'nickname' => 'حجت الاسلام و المسلمین آقای دكتر',
            'group_id' => 1,
            'level_id' => 2,
            'user_id' => 4,
        ]);

        Professors::create([
            'ProfessorNumber' => '300205',
            'nickname' => 'حجت الاسلام و المسلمین آقای دكتر',
            'group_id' => 2,
            'level_id' => 2,
            'user_id' => 5,
        ]);

        Professors::create([
            'ProfessorNumber' => '300136',
            'nickname' => 'آقای دكتر',
            'group_id' => 2,
            'level_id' => 2,
            'user_id' => 6,
        ]);

        Professors::create([
            'ProfessorNumber' => '396014',
            'nickname' => 'حجت الاسلام و المسلمین آقای دكتر',
            'group_id' => 5,
            'level_id' => 2,
            'user_id' => 7,
        ]);
    }
}
