<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            'id_doctor' => \App\Models\MedicalStaff::factory(),
            'id_patient' => \App\Models\Patient::factory(),
            'link_pdf' => $this->faker->url(),
        ];
    }
}
