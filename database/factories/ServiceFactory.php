<?php

namespace Database\Factories;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{

    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'max' => random_int(3,5),
            'duration' => $this->faker->time('m:s'),
            'available_days' => json_encode(["days" => ["lunedi", "mercoledi"]]),
            'delta' => $this->faker->time('m:s'),
            'type' => "DH"
        ];
    }
}
