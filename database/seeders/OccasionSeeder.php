<?php

namespace Database\Seeders;

use App\Models\Occasion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OccasionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "title_ar"=>"اخري",
                "title_en"=>"other",
                "description_ar"=>"اخري",
                "description_en"=>"other",
            ],

            [
                "title_ar"=>"اعياد ميلاد",
                "title_en"=>"Birthdays",
                "description_ar"=>"اعياد ميلاد",
                "description_en"=>"Birthdays",

            ],


            [
                "title_ar"=>"خطوبة",
                "title_en"=>"engagement",
                "description_ar"=>"خطوبة",
                "description_en"=>"engagement",
            ],

            [
                "title_ar"=>"مؤتمرات",
                "title_en"=>"conferences",
                "description_ar"=>"مؤتمرات",
                "description_en"=>"conferences",
            ],

            [
                "title_ar"=>"حفلات خاصه",
                "title_en"=>"private parties",
                "description_ar"=>"حفلات خاصه",
                "description_en"=>"private parties",
            ],

            [
                "title_ar"=>"زفاف",
                "title_en"=>"wedding",
                "description_ar"=>"زفاف",
                "description_en"=>"wedding",
            ],









        ];



        foreach($data as $d){
            Occasion::create($d);
        }
    }
}
