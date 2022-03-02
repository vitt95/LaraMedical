<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth' => 'date:m-d-Y'
    ];

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'mobile_phone',
        'nation',
        'birth',
        'fiscal_code',
        'address',
        'sex',
        'zip',
        'city'
    ];

    public function getJsonData(){
        $array['data'] = self::all()->toArray();

        echo json_encode($array);
    }
}

