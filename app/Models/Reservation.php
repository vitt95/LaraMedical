<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date:d-m-Y',
        'time' => 'time:i:s'
    ];

    public function patient(){
        return $this->hasOne(Patient::class, 'foreign_key', 'id_patient');
    }

    public function service(){
        return $this->hasOne(Service::class, 'foreign_key', 'id_patient');
    }

    public static function getReservationData(){
        $array["data"] = DB::table('reservations')
                                ->join('patients', 'reservations.id_patient', '=' ,'patients.id')
                                ->join('services', 'reservations.id_service', '=', 'services.id')
                                ->select('reservations.*', 'patients.name', 'patients.lastname', 'services.type')
                                ->get()
                                ->toArray();

        echo json_encode($array);
    }

}
