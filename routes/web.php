<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MedicalStaffController;
use Illuminate\Http\Request;
use IMedicalStaffService;

use Inertia\Inertia;
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



Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/attemptlogin', [App\Http\Controllers\LoginController::class, 'authenticate']);

Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout']);

Route::get('/index', [ReservationController::class, 'index']);
Route::get('/doctor', [MedicalStaffController::class, 'index']);


Route::middleware(['auth:medical'])->group(function(){
    Route::get('/dashboard', function () {
        return inertia('Dashboard');
    });

    Route::get('/profile', [MedicalStaffController::class, 'getCurrentUserData']);

    Route::get('/add/patient', function(){
        return inertia('PatientForm');
    });

    Route::get('visitCount', [MedicalStaffController::class, 'getVisitCountByDoctor']);

});
