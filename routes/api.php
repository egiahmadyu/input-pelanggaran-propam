<?php

use App\Http\Controllers\PangkatController;
use App\Http\Controllers\PutusanController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\WujudPerbuatanController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('polda/{id}', [SatuanController::class, 'getPolresByPolda']);
Route::get('polres/{id}', [SatuanController::class, 'getPolseByPolres']);

Route::get('polda_terduga/{id}', [SatuanController::class, 'getPolresByPoldaTerduga']);
Route::get('polres_terduga/{id}', [SatuanController::class, 'getPolseByPolresTerduga']);

Route::get('polres/{id}/delete', [SatuanController::class, 'deletePolres']);
Route::get('polda/{id}/delete', [SatuanController::class, 'deletePolda']);
Route::get('wujud_perbuatan/type/{type}', [WujudPerbuatanController::class, 'getWPbyType']);
Route::get('wujud_perbuatan/checkNarkoba/{type}', [WujudPerbuatanController::class, 'checkNarkoba']);
Route::get('putusan/type/{type}', [PutusanController::class, 'getPutusanByType']);
Route::get('pangkat/type/{type}', [PangkatController::class, 'pangkatByType']);
