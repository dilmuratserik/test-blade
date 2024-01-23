<?php

use App\Http\Controllers\FlightController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/flights/longest-route', [FlightController::class, 'findLongestRoute']);
Route::get('/flights', [FlightController::class, 'getAllFlights']);
Route::post('/flights',[FlightController::class, 'addFlight']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});
