<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [
                'name' => 'S',
            ],
            [
                'name' => 'M',
            ],
            [
                'name' => 'L',
            ],
            [
                'name' => 'XL',
            ],
            [
                'name' => 'XXL',
            ]
        ];
        foreach($data as $Size){
            Size::create($Size);
        }
    }
}
