<?php

use Illuminate\Database\Seeder;
use App\PublicConscriptionStatus;
class Public_Consciption_StatusesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PublicConscriptionStatus::create(['title' => 'کارت پایان خدمت']);
        PublicConscriptionStatus::create(['title' => 'معافیت تحصیلی']);
        PublicConscriptionStatus::create(['title' => 'معافیت دائم']);
        PublicConscriptionStatus::create(['title' => 'در حال خدمت']);
        PublicConscriptionStatus::create(['title' => 'ندارم (خواهران)']);
    }
}
