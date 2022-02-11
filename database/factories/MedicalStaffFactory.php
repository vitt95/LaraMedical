<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalStaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'fiscal_code' => $this->faker->taxId(),
            'phone_number' => $this->faker->phoneNumber(),
            'mobile_number' => $this->faker->phoneNumber,
            'email' => $this->faker->email(),
            'email_verified_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'password' => $this->faker->password,
            'role_info' => $this->random_json_info(),
            'link_photo' => $this->faker->imageUrl(),
        ];
    }

    public function random_json_info(){
        $json_data = [];
        $random = random_int(1,5);
        switch($random){
            case 1:
                $json_data = [
                    "role" => "medico",
                    "specialization" => "cardiologia",
                    "administrator" => "no",
                ];

            case 2:
                $json_data = [
                    "role" => "operatore",
                    "administrator" => "no"
                ];

            case 3:
                $json_data = [
                    "role" => "medico",
                    "specialization" => "dermatologia",
                    "administrator" => "si"
                ];

            case 4:
                $json_data = [
                    "role" => "medico",
                    "specialization" => "ortopedia",
                    "administrator" => "no"
                ];

            case 5:
                $json_data = [
                    "role" => "medico",
                    "specialization" => "osteopata",
                    "administrator" => "no"
                ];
        }
        return json_encode($json_data);
    }
}
