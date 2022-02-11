<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'max' => random_int(3,5),
            'duration' => $this->faker->time('H:i:s'),
            'available_days' => json_encode(["days" => ["lunedi", "mercoledi"]]),
            'delta' => $this->faker->time('H:i:s'),
            'type' => "DH"
        ];
    }
}
