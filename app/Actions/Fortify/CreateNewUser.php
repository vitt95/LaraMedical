<?php

namespace App\Actions\Fortify;

use App\Models\MedicalStaff;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(MedicalStaff::class),
            ],
            'password' => $this->passwordRules(),
            'fiscal_code' => ['required', 'string', 'max:20'],
            'phone_number' => ['required', 'string', 'max:20'],
            'mobile_number' => ['required', 'string', 'max:20'],
        ])->validate();

        return MedicalStaff::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'fiscal_code' => 'LLAVTR95A03C129X',
            'phone_number' => '3348076677',
            'mobile_number' => '3348076677'
        ]);
    }
}
