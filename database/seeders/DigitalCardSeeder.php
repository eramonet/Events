<?php

namespace Database\Seeders;

use App\Models\DigitalCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DigitalCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DigitalCard::truncate();
        DigitalCard::create([
            "from" => 1,
            "to" => 50,
            "type" => "bronze",
            "image" => "bronze.jpg",
        ]);

        DigitalCard::create([
            "from" => 50,
            "to" => 150,
            "type" => "silver",
            "image" => "silver.jpg",
        ]);

        DigitalCard::create([
            "from" => 150,
            "to" => 500,
            "type" => "gold",
            "image" => "gold.jpg",
        ]);

        DigitalCard::create([
            "from" => 500,
            "to" => 1250,
            "type" => "platinum",
            "image" => "platinum.jpg",
        ]);

        DigitalCard::create([
            "from" => 1250,
            "to" => 4000,
            "type" => "platinum*",
            "image" => "platinum_plus.jpg",
        ]);

        DigitalCard::create([
            "from" => 4000,
            "to" => 7000,
            "type" => "platinum**",
            "image" => "platinum_plus_plus.jpg",
        ]);


        DigitalCard::create([
            "from" => 7000,
            "to" => 10000,
            "type" => "titanum",
            "image" => "titinum.jpg",
        ]);

        DigitalCard::create([
            "from" => 10000,
            "to" => 15000,
            "type" => "titanum*",
            "image" => "titanum_plus.jpg",
        ]);

        DigitalCard::create([
            "from" => 15000,
            "to" => 20000,
            "type" => "titanum**",
            "image" => "titnum_plus_plus.jpg",
        ]);
    }
}
