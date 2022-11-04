<?php

use App\Http\Controllers\API\DossierController;
use App\Http\Controllers\API\LivreController;
use App\Http\Controllers\API\MatiereController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('user_status_activer/{id}',[UserController::class,'user_status_activer']);
Route::get('user_status_desactiver/{id}',[UserController::class,'user_status_desactiver']);
Route::post('login_user',[UserController::class,'login_user']);
Route::resource('/users',UserController::class);
Route::resource('/matieres',MatiereController::class);
Route::resource('/dossiers',DossierController::class);
Route::resource('/livres', LivreController::class);
