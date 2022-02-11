<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date:d-m-Y HH:mm',
    ];

    public function patient(){
        return $this->hasOne(Patient::class, 'foreign_key', 'id_patient');
    }

    public function service(){
        return $this->hasOne(Service::class, 'foreign_key', 'id_patient');
    }

}
