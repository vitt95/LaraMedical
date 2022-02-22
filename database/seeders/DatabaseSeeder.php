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

        /*\App\Models\Reservation::factory(10)
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
            'link_photo' => 'https://pxhere.com/en/photo/1447673',
            'role_info' => json_encode(['role' => 'medico', 'specialization' => 'cardiologia']),
            'fiscal_code' => 'LLAVTR95A03C129X',
            'password' => Hash::make('Podrello95')
        ]);*/

        \App\Models\MedicalStaff::create([
            'name' => 'Giovanni',
            'lastname' => 'Anastasio',
            'email' => 'giovanni.anastasio@laramedical.it',
            'phone_number' => '3313232222',
            'mobile_number' => '3313232222',
            'role_info' => json_encode(['role' => 'operatore']),
            'fiscal_code' => 'GGNANA4403CD340',
            'password' => Hash::make('Titillo95'),
            'link_photo' => 'https://images.generated.photos/rFp-IFr2EbOtXy0574OIhlORLwb-7ErNb26JBKS_Npw/rs:fit:512:512/wm:0.95:sowe:18:18:0.33/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LnBob3Rvcy92M18w/OTYxNzg1LmpwZw.jpg',
        ]);
    }
}
