<?php

namespace Database\Seeders;

use App\Models\HallCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallCategorySeeder extends Seeder
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
                "summary_ar"=>"اخري",
                "summary_en"=>"other",
                "description_ar"=>"اخري",
                "description_en"=>"other",
                "keywords_ar"=>"اخري",
                "keywords_en"=>"other",
            ],

            [
                "title_ar"=>"اعياد ميلاد",
                "title_en"=>"Birthdays",
                "summary_ar"=>"اعياد ميلاد",
                "summary_en"=>"Birthdays",
                "description_ar"=>"اعياد ميلاد",
                "description_en"=>"Birthdays",
                "keywords_ar"=>"اعياد ميلاد",
                "keywords_en"=>"Birthdays",
            ],


            [
                "title_ar"=>"خطوبة",
                "title_en"=>"engagement",
                "summary_ar"=>"خطوبة",
                "summary_en"=>"engagement",
                "description_ar"=>"خطوبة",
                "description_en"=>"engagement",
                "keywords_ar"=>"خطوبة",
                "keywords_en"=>"engagement",
            ],

            [
                "title_ar"=>"مؤتمرات",
                "title_en"=>"conferences",
                "summary_ar"=>"مؤتمرات",
                "summary_en"=>"conferences",
                "description_ar"=>"مؤتمرات",
                "description_en"=>"conferences",
                "keywords_ar"=>"مؤتمرات",
                "keywords_en"=>"conferences",
            ],

            [
                "title_ar"=>"حفلات خاصه",
                "title_en"=>"private parties",
                "summary_ar"=>"حفلات خاصه",
                "summary_en"=>"private parties",
                "description_ar"=>"حفلات خاصه",
                "description_en"=>"private parties",
                "keywords_ar"=>"حفلات خاصه",
                "keywords_en"=>"private parties",
            ],

            [
                "title_ar"=>"زفاف",
                "title_en"=>"wedding",
                "summary_ar"=>"زفاف",
                "summary_en"=>"wedding",
                "description_ar"=>"زفاف",
                "description_en"=>"wedding",
                "keywords_ar"=>"زفاف",
                "keywords_en"=>"wedding",
            ],









        ];



        foreach($data as $category){
            HallCategory::create($category);
        }
    }
}
