<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\importDataController;
use App\Http\Controllers\ImportReffController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SideMenuController;
use App\Http\Controllers\UserController;
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
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/', function () {
    return view('content.dashboard.index');
});


Route::middleware(['auth'])->group(function () {
    // Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/disiplin', [DashboardController::class, 'disiplin']);
    Route::get('/kode-etik', [DashboardController::class, 'kodeEtik']);

    // Pelanggaran
    Route::get('/tambah-data', [PelanggaranController::class, 'form'])->name('pelanggaran.add');
    Route::get('/pelanggaran-data', [PelanggaranController::class, 'index'])->name('pelanggaran.index');
    Route::get('/pelanggaran-data/detail/{id}', [PelanggaranController::class, 'getDetail'])->name('pelanggaran.detail');
    Route::get('/pelanggaran-data/edit/{id}', [PelanggaranController::class, 'formEdit'])->name('pelanggaran.form.edit');
    Route::post('/pelanggaran-data/edit/{id}/save', [PelanggaranController::class, 'saveEdit'])->name('pelanggaran.edit.save');
    Route::post('/pelanggaran-data/show', [PelanggaranController::class, 'show'])->name('pelanggaran.show');
    Route::post('/tambah-data/save', [PelanggaranController::class, 'save'])->name('pelanggaran.save');




    Route::group(['middleware' => ['role:admin']], function () {
        // Menu Side
        Route::get('manage/sidebar', [SideMenuController::class, 'index'])->name('menu.index');
        Route::get('manage/sidebar/form', [SideMenuController::class, 'form'])->name('menu.form');
        Route::post('manage/sidebar/save', [SideMenuController::class, 'store'])->name('menu.save');

        // Menu User
        Route::get('manage/user', [UserController::class, 'index'])->name('user.index');
        Route::get('manage/user/show/{id}',  [UserController::class, 'show'])->name('user.show');
        Route::post('manage/user/update',  [UserController::class, 'update'])->name('user.update');
        Route::get('manage/user/delete/{id}',  [UserController::class, 'destroy'])->name('user.delete');
        Route::post('/manage/user/save',  [UserController::class, 'store'])->name('user.save');


        // Permission
        Route::get('manage/permission', [PermissionController::class, 'index'])->name('permission.index');
        Route::post('manage/permission/save',  [PermissionController::class, 'save'])->name('permission.save');

        // Role
        Route::get('manage/roles', [RoleController::class, 'index'])->name('role.index');
        Route::get('manage/roles/delete/{id}',  [RoleController::class, 'delete'])->name('role.delete');
        Route::post('manage/roles/save',  [RoleController::class, 'save'])->name('role.save');
        Route::get('manage/roles/permission/{id}',  [RoleController::class, 'permission'])->name('role.permission');
        Route::post('/manage/roles/permission/{id}',  [RoleController::class, 'savePermission'])->name('role.permission.save');
    });

    Route::get('logout', function () {
        auth()->logout();
        return redirect('/');
    });
});


  Route::get('test', [SideMenuController::class, 'inputSatuan']);
  Route::get('import/pangkat', [ImportReffController::class, 'importReff']);
  Route::get('import/satuan', [ImportReffController::class, 'importSatuan']);
  Route::get('import/wpkepp', [ImportReffController::class, 'importWpKepp']);
  Route::get('import/wpdisiplin', [ImportReffController::class, 'importWpDisiplin']);
