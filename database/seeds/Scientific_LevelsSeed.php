<?php

use Illuminate\Database\Seeder;
use App\ScientificLevel;
class Scientific_LevelsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScientificLevel::create(['title' => 'مربی']);
        ScientificLevel::create(['title' => 'استادیار']);
        ScientificLevel::create(['title' => 'دانشیار']);
        ScientificLevel::create(['title' => 'استاد تمام']);
    }
}
