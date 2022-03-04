<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MedicalStaffController;
use App\Models\MedicalStaff;
use App\Models\Patient;
use App\Models\Reservation;
use Faker\Provider\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Redirect;

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


/**
 * Testing routes
 */
Route::get('execute', [Patient::class, 'getJsonData']);

Route::get('dtlanguageit', function(){
    return Storage::disk('local')->get('lang.json');
});

Route::get('testnat', function(){
    header('Content-Type: application/json; charset=utf-8');
    echo Storage::disk('local')->get('nations.json');
});


/**
 * Protected routes
 */
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

    Route::get('/aggiungi-paziente', function(){
        return inertia('Operator/PatientForm');
    });

    Route::get('/lista-pazienti', function(){
        return Inertia::render('Operator/PatientList');
    });

    Route::get('/lista-prenotazioni', function(){
        return Inertia::render('Operator/Reservations');
    });

    Route::get('prenota-visita', function(){
        return Inertia::render('Operator/ReservationForm');
    });

    Route::post('/patient/create', [PatientController::class, 'create']);

    Route::get('/reservations', [ReservationController::class, 'listReservation']);

    Route::get('/profilo/paziente/{id}', [PatientController::class, 'show']);
});

//Route::get('testjoin', [Reservation::class, 'getTestData']);

Route::get('/', function(){
    return redirect('dashboard', 301);
});

