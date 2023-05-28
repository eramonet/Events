<?php

namespace Database\Seeders;

use App\Models\PackageOption;
use App\Models\PackageOptionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageOptionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packagesOptionsCategory =[

            [
                'title_ar'=>'زهور',
                'title_en'=>'flowers',
            ],
            [
                'title_ar'=>'كراسي',
                'title_en'=>'Chairs',
            ],    [
                'title_ar'=>'زينة',
                'title_en'=>'decoration',
            ],    [
                'title_ar'=>'طاولات',
                'title_en'=>'tables',
            ],
            [
                'title_ar'=>'حلوي',
                'title_en'=>'Dessert',
            ],
             [
                'title_ar'=>'كوافير',
                'title_en'=>'Hairdresser',
            ],


        ];





        foreach($packagesOptionsCategory as $category){
            PackageOptionCategory::create($category);
        }


        $packagesOptions =[

            [
                'title_ar'=>'كراسي طويله',
                'title_en'=>'Long chairs',
                'category_id'=>2,

            ],
            [
                'title_ar'=>'كراسي قصيره',
                'title_en'=>'Short chairs',
                'category_id'=>2,

            ],
            [
                'title_ar'=>'كراسي فاخره',
                'title_en'=>'Luxurious chairs',
                'category_id'=>2,

            ],
            [
                'title_ar'=>'طاولات كبيره',
                'title_en'=>'Big tables',
                'category_id'=>4,

            ],
            [
                'title_ar'=>'طاولات فاخره',
                'title_en'=>'Luxurious tables',
                'category_id'=>4,

            ],
            [
                'title_ar'=>'بوكيه ورد',
                'title_en'=>'Bouquet',
                'category_id'=>3,

            ],



        ];



        foreach($packagesOptions as $option){
            PackageOption::create($option);
        }



    }
}
