<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class to represent MedicalExamination
 */

class MedicalExamination extends Model
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

    public function doctor(){
        return $this->hasOne(MedicalStaff::class, 'id_doctor', 'id');
    }

    public function patient(){
        return $this->hasOne(Patient::class, 'id_patient', 'id');
    }

}
