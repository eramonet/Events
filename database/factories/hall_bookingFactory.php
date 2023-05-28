<?php

namespace Database\Factories;

use App\Models\Hall;
use App\Models\Package;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\hall_booking>
 */
class hall_bookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('+1 week', '+2 months');
       $timeFrom = $this->faker->dateTimeInInterval('08:00:00', '16:00:00');
       $timeTo = $this->faker->dateTimeInInterval($timeFrom, '+4 hours');

    return [
        'status' => $this->faker->randomElement(['success', 'cancelled']),
        'date' => $date->format('Y-m-d'),
        'time_from' => $timeFrom->format('H:i:s'),
        'time_to' => $timeTo->format('H:i:s'),

        'packge_id' => Package::all()->random()->id,

        'hall_id' => Hall::all()->random()->id ,
        'user_id' => User::all()->random()->id,

        'vendor_id' => Vendor::all()->random()->id,
        'total' => $this->faker->numberBetween(1000, 50000),
        'extra_guest' => 55,
         ];
    }
}
