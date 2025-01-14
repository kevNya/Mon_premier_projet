<?php

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
use App\Http\Controllers\RendezVousController;

// Récupérer les disponibilités pour une date
Route::get('/disponibilites', [RendezVousController::class, 'disponibilites']);

// Créer un nouveau rendez-vous
Route::post('/rendezvous', [RendezVousController::class, 'storee']);

// Récupérer tous les rendez-vous
Route::get('/rendezvous', [RendezVousController::class, 'indexx']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
