<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Cruds\DriverController;
use App\Http\Controllers\Cruds\VehicleController;
use App\Http\Controllers\Cruds\TripController;
use Illuminate\Support\Facades\Route;

Route::delete('/drivers/{driver}/destroy',[DriverController::class, 'destroy'])->name('drivers.destroy');
Route::get('/drivers/create',[DriverController::class, 'create'])->name('drivers.create');
Route::get('/drivers/{driver}',[DriverController::class, 'show'])->name('drivers.show');
Route::put('/drivers/{driver}',[DriverController::class, 'update'])->name('drivers.update');
Route::get('/drivers/{driver}/edit',[DriverController::class, 'edit'])->name('drivers.edit');
Route::post('/drivers',[DriverController::class, 'store'])->name('drivers.store');
Route::get('/drivers',[DriverController::class, 'index'])->name('drivers.index');

Route::delete('/vehicles/{vehicle}/destroy',[VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::get('/vehicles/create',[VehicleController::class, 'create'])->name('vehicles.create');
Route::get('/vehicles/{vehicle}',[VehicleController::class, 'show'])->name('vehicles.show');
Route::put('/vehicles/{vehicle}',[VehicleController::class, 'update'])->name('vehicles.update');
Route::get('/vehicles/{vehicle}/edit',[VehicleController::class, 'edit'])->name('vehicles.edit');
Route::post('/vehicles',[VehicleController::class, 'store'])->name('vehicles.store');
Route::get('/vehicles',[VehicleController::class, 'index'])->name('vehicles.index');

Route::delete('/trips/{trip}/destroy',[TripController::class, 'destroy'])->name('trips.destroy');
Route::get('/trips/create',[TripController::class, 'create'])->name('trips.create');
Route::get('/trips/{trip}',[TripController::class, 'show'])->name('trips.show');
Route::put('/trips/{trip}',[TripController::class, 'update'])->name('trips.update');
Route::get('/trips/{trip}/edit',[TripController::class, 'edit'])->name('trips.edit');
Route::post('/trips',[TripController::class, 'store'])->name('trips.store');
Route::get('/trips',[TripController::class, 'index'])->name('trips.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
