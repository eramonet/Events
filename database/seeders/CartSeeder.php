<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cart::create([
        //     "quantity" => 10,
        //     "user_id" => 241,
        //     "product_id" => 1
        // ]);

        Cart::create([
            "quantity" => 10,
            "user_id" => 501,
            "product_id" => 1
        ]);
    }
}
