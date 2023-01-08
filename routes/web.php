<?php

use App\Http\Controllers\PhaseController;
use App\Http\Controllers\ProjetController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProjetController::class,'index']);

Route::get('/ajout', [ProjetController::class, 'ajout']);

Route::get('/enregistrer', [ProjetController::class, 'enregistrer']);
Route::get('/detail', [ProjetController::class, 'detail']);
Route::get('/ajoutPhase', [PhaseController::class, 'ajout']);
Route::get('/ajouter', [PhaseController::class, 'ajouter']);
