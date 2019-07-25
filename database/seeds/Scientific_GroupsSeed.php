<?php

use Illuminate\Database\Seeder;
use App\ScientificGroup;

class Scientific_GroupsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScientificGroup::create([
            'title' => 'اخلاق اسلامی',
            'url' => 'http://education.maaref.ac.ir/%da%af%d8%b1%d9%88%d9%87-%d8%a2%d9%85%d9%88%d8%b2%d8%b4%db%8c-%d8%a7%d8%ae%d9%84%d8%a7%d9%82-%d8%a7%d8%b3%d9%84%d8%a7%d9%85%db%8c/',
            'assistant_id' => '1',
        ]);

        ScientificGroup::create([
            'title' => 'انقلاب اسلامی',
            'url' => 'http://education.maaref.ac.ir/%da%af%d8%b1%d9%88%d9%87-%d8%a2%d9%85%d9%88%d8%b2%d8%b4%db%8c-%d8%a7%d9%86%d9%82%d9%84%d8%a7%d8%a8-%d8%a7%d8%b3%d9%84%d8%a7%d9%85%db%8c/',
            'assistant_id' => '1',
        ]);

        ScientificGroup::create([
            'title' => 'تاریخ و تمدن اسلامی',
            'url' => 'http://education.maaref.ac.ir/%da%af%d8%b1%d9%88%d9%87-%d8%a2%d9%85%d9%88%d8%b2%d8%b4%db%8c-%d8%aa%d8%a7%d8%b1%db%8c%d8%ae-%d8%aa%d9%85%d8%af%d9%86-%d8%a7%d8%b3%d9%84%d8%a7%d9%85%db%8c/',
            'assistant_id' => '1',
        ]);

        ScientificGroup::create([
            'title' => 'قرآن و متون اسلامی',
            'url' => 'http://education.maaref.ac.ir/%da%af%d8%b1%d9%88%d9%87-%d8%a2%d9%85%d9%88%d8%b2%d8%b4%db%8c-%d9%82%d8%b1%d8%a2%d9%86-%d9%88-%d9%85%d8%aa%d9%88%d9%86-%d8%a7%d8%b3%d9%84%d8%a7%d9%85%db%8c/',
            'assistant_id' => '1',
        ]);

        ScientificGroup::create([
            'title' => 'مبانی نظری اسلام',
            'url' => 'http://education.maaref.ac.ir/%da%af%d8%b1%d9%88%d9%87-%d8%a2%d9%85%d9%88%d8%b2%d8%b4%db%8c-%d9%85%d8%a8%d8%a7%d9%86%db%8c-%d9%86%d8%b8%d8%b1%db%8c-%d8%a7%d8%b3%d9%84%d8%a7%d9%85/',
            'assistant_id' => '1',
        ]);

        ScientificGroup::create([
            'title' => 'مدیریت فرهنگی',
            'url' => 'http://education.maaref.ac.ir/%da%af%d8%b1%d9%88%d9%87-%d8%a2%d9%85%d9%88%d8%b2%d8%b4%db%8c-%d9%85%d8%af%db%8c%d8%b1%db%8c%d8%aa-%d9%81%d8%b1%d9%87%d9%86%da%af%db%8c/',
            'assistant_id' => '1',
        ]);

        ScientificGroup::create([
            'title' => 'مشاوره',
            'url' => 'http://education.maaref.ac.ir/%da%af%d8%b1%d9%88%d9%87-%d8%a2%d9%85%d9%88%d8%b2%d8%b4%db%8c-%d9%85%d8%b4%d8%a7%d9%88%d8%b1%d9%87/',
            'assistant_id' => '1',
        ]);

        ScientificGroup::create([
            'title' => 'زبان انگلیسی',
            'url' => '',
            'assistant_id' => '1',
        ]);

        ScientificGroup::create([
            'title' => 'تبلیغ دین',
            'url' => '',
            'assistant_id' => '1',
        ]);

        ScientificGroup::create([
            'title' => 'آشنایی با منابع اسلامی',
            'url' => '',
            'assistant_id' => '1',
        ]);

        ScientificGroup::create([
            'title' => 'نامشخص',
            'url' => '',
            'assistant_id' => '1',
        ]);

    }
}
