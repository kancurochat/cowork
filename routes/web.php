<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SpaceTypeController;

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

    // SpaceTypes
    Route::get('types', [SpaceTypeController::class, 'getTypes'])->name('types');

    Route::get('types/create', [SpaceTypeController::class, 'getCreate'])->name('types.create');
    Route::post('types/create', [SpaceTypeController::class, 'postCreate']);

    Route::get('types/{id}/edit', [SpaceTypeController::class, 'getEdit'])->name('types.edit');
    Route::put('types/{id}/edit', [SpaceTypeController::class, 'putEdit']);

    Route::delete('types/{id}', [SpaceTypeController::class, 'destroy'])->name('types.destroy');

    // Reservations
    Route::get('reservations', [ReservationController::class, 'getReservations']);
});
