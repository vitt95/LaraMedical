<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MedicalStaffController;
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

Route::get('/dashboard', function () {
    return inertia('Dashboard');
});

Route::get('/profile', function(){
    return inertia('Profile');
});

Route::get('/index', [ReservationController::class, 'index']);
Route::get('/doctor', [MedicalStaffController::class, 'index']);
