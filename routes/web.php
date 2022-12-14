<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\SideMenuController;
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
Route::get('/login', function () {
    return view('content.auth.login');
})->name('auth-login-basic');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/', function () {
    return view('content.dashboard.index');
});


Route::middleware(['auth'])->group(function () {
    // Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');
    Route::get('/tambah-data', [PelanggaranController::class, 'form'])->name('pelanggaran.add');
    Route::group(['middleware' => ['role:admin']], function () {
  
      // Menu Side
      Route::get('manage/sidebar', [SideMenuController::class, 'index'])->name('menu.index');
    });
  });