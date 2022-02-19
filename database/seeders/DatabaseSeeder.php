<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        // \App\Models\Patient::factory(10)->create();
        //\App\Models\MedicalStaff::factory(10)->create();

        \App\Models\Reservation::factory(10)
            ->create();

        \App\Models\MedicalExamination::factory(10)
            ->create();

        \App\Models\Reservation::factory(10)
            ->create();

        \App\Models\MedicalStaff::create([
            'name' => 'Vittorio',
            'lastname' => 'Aiello',
            'email' => 'vittorioaiello95@gmail.com',
            'phone_number' => '3348076677',
            'mobile_number' => '3348076677',
            'link_photo' => 'null',
            'role_info' => json_encode(['role' => 'medico', 'specialization' => 'cardiologia']),
            'fiscal_code' => 'LLAVTR95A03C129X',
            'password' => Hash::make('Podrello95')
        ]);
    }
}
