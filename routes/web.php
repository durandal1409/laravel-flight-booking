<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//all listings
Route::get('/', [FlightController::class, 'index']);

//store new reservation
Route::post('/reservation/{flight_id}', [FlightController::class, 'store']);


//single flight
Route::get('/flights/{flight_id}', [FlightController::class, 'show']);
