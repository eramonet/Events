<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
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
                'title_ar'=>'فندق صن رايس',
                'title_en'=>'SunRise Hotel',
                'can_add_products'=>'0',

                'can_add_halls'=>'1',
                'admin_id'=>1,
                'commission'=>10,
            ],

            [
                'title_ar'=>'فندق  الفورسيزون',
                'title_en'=>'Four Seasons Hotel',
                'can_add_products'=>'0',
                'can_add_halls'=>'1',
                'admin_id'=>1,
                'commission'=>9,

            ],

            [
                'title_ar'=>'فندق هارموني باي ',
                'title_en'=>'Harmony Bay Hotel',
                'can_add_products'=>'0',
                'can_add_halls'=>'1',
                'admin_id'=>1,
                'commission'=>8,

            ],

            [
                'title_ar'=>'محل ورد البركه',
                'title_en'=>'Baraka flower shop',
                'can_add_products'=>'1',
                'can_add_halls'=>'0',
                'admin_id'=>1,
                'commission'=>12,

            ],

            [
                'title_ar'=>' محل كراسي ',
                'title_en'=>'Chair shop',
                'can_add_products'=>'1',
                'can_add_halls'=>'0',
                'admin_id'=>1,
                'commission'=>13,

            ],
            [
                'title_ar'=>'محل حلوي',
                'title_en'=>'candy store',
                'can_add_products'=>'1',
                'can_add_halls'=>'0',
                'admin_id'=>1,
                'commission'=>5,

            ],

        ];


        foreach($data as $item){
            Vendor::create($item);
        }
    }
}
