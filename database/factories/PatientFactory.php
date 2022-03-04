<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastname,
            'phone' => $this->faker->phoneNumber,
            'mobile_phone' => $this->faker->phoneNumber,
            'birth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'address' => $this->faker->address,
            'email' => $this->faker->safeEmail,
            'note' => $this->faker->text,
            'fiscal_code' => $this->faker->taxId(),
            'region' => $this->faker->city(),
            'province' => $this->faker->city(),
            'zip' => $this->faker->postcode(),
            "city" => $this->faker->city(),
            'heigth' => rand(150, 210),
            'weigth' => rand(45, 110),
            'sex' => $this->random_sex(),
            'blood_group' => $this->random_blood_group(),
            'rh' => $this->random_rh()
        ];
    }

    public function random_sex(){
        $random = random_int(1,2);
        if($random == 1){
            return 'male';
        }else return 'female';
    }

    public function random_blood_group(){
        $random = random_int(1,4);
        switch($random){
            case 1:
                return 'A';
            case 2:
                return 'B';
            case 3:
                return 'AB';
            case 4:
                return '0';
        }
    }

    public function random_rh(){
        $random = random_int(1,2);
        if($random == 1){
            return 'positive';
        }else return 'negative';
    }
}
