<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WorkspaceController;
use App\Models\Workspace;

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

    // Workspaces
    Route::get('workspaces', [WorkspaceController::class, 'getWorkspaces'])->name('workspaces');

    Route::get('workspaces/create', [WorkspaceController::class, 'getCreate']);
    Route::post('workspaces/create', [WorkspaceController::class, 'postCreate'])->name('workspaces.create');

    Route::get('workspaces/{id}/edit', [WorkspaceController::class, 'getEdit'])->name('workspaces.edit');
    Route::put('workspaces/{id}/edit', [WorkspaceController::class, 'putEdit']);

    Route::get('workspaces/{id}', [WorkspaceController::class, 'show'])->name('workspaces.show');

    Route::delete('workspaces/{id}', [WorkspaceController::class, 'destroy']);


    // Reservations
    Route::get('reservations', [ReservationController::class, 'getReservations'])->name('reservations');

    Route::get('reservations/create', [ReservationController::class, 'getCreate']);
    Route::post('reservations/create', [ReservationController::class, 'postCreate'])->name('reservations.create');

    Route::get('reservations/{id}/edit', [ReservationController::class, 'getEdit'])->name('reservations.edit');
    Route::put('reservations/{id}/edit', [ReservationController::class, 'putEdit']);

    Route::get('reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');

    Route::delete('reservations/{id}', [ReservationController::class, 'destroy']);
});
