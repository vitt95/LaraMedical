<?php

namespace App\Policies;

use App\Models\MedicalStaff;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalStaffPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given medical user can add patient to db
     *
     * @param \App\Models\MedicalStaff
     */
    public function checkMedicalRole(MedicalStaff $user)
    {
        $role[] = json_decode($user->role_info);
        return $role['role'];
    }
}
