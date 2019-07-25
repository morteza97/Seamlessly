<?php

use Illuminate\Database\Seeder;
use App\Assistants;
class AssistantSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assistants::create(['title' => 'آموزشی']);
        Assistants::create(['title' => 'پژوهشی']);
        Assistants::create(['title' => 'دانشجویی و فرهنگی']);
    }
}
