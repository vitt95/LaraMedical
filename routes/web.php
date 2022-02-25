<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MedicalStaffController;
use App\Models\MedicalStaff;
use App\Models\Patient;
use Faker\Provider\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        return Inertia::render('Profile', [
            'user' => $user = Auth::user(),
        ]);
    });

    Route::get('/user', function(MedicalStaff $user){
        return $user->getAuthenticatedUser();
    });

    Route::get('/add/patient', function(){
        return inertia('PatientForm');
    });

    Route::get('patients-list', function(){
        return Inertia::render('PatientList');
    });
});

Route::get('execute', [Patient::class, 'getJsonData']);

Route::get('dtlanguageit', function(){
    return Storage::disk('local')->get('lang.json');
});

Route::get('testnat', function(){
    header('Content-Type: application/json; charset=utf-8');
    echo Storage::disk('local')->get('nations.json');
});
