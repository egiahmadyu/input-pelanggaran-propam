<?php

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
Route::get('wujud_perbuatan/type/{type}', [WujudPerbuatanController::class, 'getWPbyType']);