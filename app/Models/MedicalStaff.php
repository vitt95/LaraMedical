<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MedicalStaff extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that sould be hidden to serialization
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_code',
        'two_factor_secret',
        'updated_at',
        'email_verified_at',
        'created_at'
    ];
}
