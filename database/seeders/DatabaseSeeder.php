<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        
        
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(PackageOptionCategorySeeder::class);


        $this->call(AdminCategorySeeder::class);

        $this->call(LaratrustSeeder::class);
        $this->call(HallCategorySeeder::class);
        $this->call(VendorSeeder::class);

        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
           $this->call(SizeSeeder::class);

        // \App\Models\Hall_booking::factory(40)->create();

         \App\Models\Color::factory(100)->create();
         \App\Models\Become_vendor::factory(200)->create();

    }
}
