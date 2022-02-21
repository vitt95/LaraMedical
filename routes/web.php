<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MedicalStaffController;
use App\Models\MedicalStaff;
use Faker\Provider\Medical;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/session', function(Request $request){
    dd($request->session()->all());
});

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', function () {
        return inertia('Dashboard');
    });

    Route::get('/profile', function(){
        return inertia('Profile');
    });

    Route::get('/add/patient', function(){
        return inertia('PatientForm');
    });

    Route::get('/user', function(MedicalStaff $user){
        return $user->getAuthenticatedUser();
    });
});

