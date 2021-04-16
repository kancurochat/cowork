<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {

    // Usar controlador para la vista
    Route::get('/', function () {
        return view('dashboard');
    });

    // Roles
    Route::resource('roles', RoleController::class);

    // Users
    Route::resource('users', UserController::class);

    // Owners
    Route::get('owners', [UserController::class, 'getOwners']);
    Route::get('owners/{id}', [UserController::class, 'showOwner']);

    // Reservations
    Route::get('reservations', [ReservationController::class, 'getReservations']);
});
