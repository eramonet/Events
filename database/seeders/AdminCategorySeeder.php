<?php

namespace Database\Seeders;

use App\Models\AdminCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminCategorySeeder extends Seeder
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
                'title_ar'=>'مدير',
                'title_en'=>'Manager',
                'details_ar'=>'مدير',
                'details_en'=>'Manager',
            ],
            [
                'title_ar'=>'الموارد البشرية',
                'title_en'=>'HR',
                'details_ar'=>'الموارد البشرية',
                'details_en'=>'HR',
            ],
            [
                'title_ar'=>'الحسابات',
                'title_en'=>'the accounts',
                'details_ar'=>'الحسابات',
                'details_en'=>'the accounts',
            ],
            [
                'title_ar'=>'التسويق',
                'title_en'=>'Marketing',
                'details_ar'=>'التسويق',
                'details_en'=>'Marketing',
            ],
            [
                'title_ar'=>'',
                'title_en'=>'',
                'details_ar'=>'',
                'details_en'=>'',
            ],
            [
                'title_ar'=>'علاقات عامه',
                'title_en'=>'Public relations',
                'details_ar'=>'علاقات عامه',
                'details_en'=>'Public relations',
            ],



        ];


        foreach($data as $category){
            AdminCategory::create($category);
        }
    }
}
