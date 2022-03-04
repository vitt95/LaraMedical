<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalExaminationFactory extends Factory
{

    protected $model = \App\Models\MedicalExamination::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            'id_doctor' => \App\Models\MedicalStaff::factory()->create()->id,
            'id_patient' => \App\Models\Patient::factory()->create()->id,
            'link_pdf' => $this->faker->url(),
        ];
    }
}
