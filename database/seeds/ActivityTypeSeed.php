<?php

use Illuminate\Database\Seeder;
use App\ActivityType;

class ActivityTypeSeed extends Seeder
{
    public function run()
    {
        ActivityType::create(['title' => 'آموزشی']);
        ActivityType::create(['title' => 'پژوهشی']);
        ActivityType::create(['title' => 'فرهنگی']);
        ActivityType::create(['title' => 'اجرایی']);
    }
}
