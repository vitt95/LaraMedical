<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{

    /**
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            'time' => $this->faker->time('i:s'),
            'id_patient' => \App\Models\Patient::factory()->create()->id,
            'id_service' => \App\Models\Service::factory()->create()->id,
        ];
    }
}
