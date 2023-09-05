<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\importDataController;
use App\Http\Controllers\ImportReffController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RefDataController;
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
    Route::get('/export/kepp', [DashboardController::class, 'exportWPKepp']);
    Route::get('/export/disiplin', [DashboardController::class, 'exportWPDisiplin']);

    // Pelanggaran
    Route::get('/tambah-data', [PelanggaranController::class, 'form'])->name('pelanggaran.add');
    Route::get('/pelanggaran-data', [PelanggaranController::class, 'index'])->name('pelanggaran.index');
    Route::get('/pelanggaran-data/edit-data/{id}', [PelanggaranController::class, 'editData'])->name('pelanggaran.edit');
    Route::post('/pelanggaran-data/export', [PelanggaranController::class, 'exportData'])->name('pelanggaran.export');
    Route::get('/pelanggaran-data/detail/{id}', [PelanggaranController::class, 'getDetail'])->name('pelanggaran.detail');
    Route::get('/pelanggaran-data/edit/{id}', [PelanggaranController::class, 'formEdit'])->name('pelanggaran.form.edit');
    Route::post('/pelanggaran-data/edit/{id}/save', [PelanggaranController::class, 'saveEdit'])->name('pelanggaran.edit.save');
    Route::post('/pelanggaran-data/show', [PelanggaranController::class, 'show'])->name('pelanggaran.show');
    Route::post('/tambah-data/save', [PelanggaranController::class, 'save'])->name('pelanggaran.save');
    Route::get('/pelanggaran-data/delete/{id}', [PelanggaranController::class, 'deleteData'])->name('pelanggaran.delete');


    Route::get('data-master/wujud-perbuatan-pidana', [RefDataController::class, 'wujudPerbuatanPidana'])->name('refData.wujud_perbuatan_pidana');
    Route::post('data-master/wujud-perbuatan-pidana', [RefDataController::class, 'wujudPerbuatanPidana'])->name('refData.wujud_perbuatan_pidana.view');
    Route::post('data-master/wujud-perbuatan-pidana/save', [RefDataController::class, 'saveWPP'])->name('refData.wujud_perbuatan_pidana.save');
    Route::post('data-master/wujud-perbuatan-pidana/save/edit', [RefDataController::class, 'saveEditWPP'])->name('refData.wujud_perbuatan_pidana.edit');
    Route::get('data-master/wujud-perbuatan-pidana/delete/{id}', [RefDataController::class, 'deleteWPP'])->name('refData.wujud_perbuatan_pidana.delete');

    Route::get('data-master/wujud-perbuatan', [RefDataController::class, 'wujudPerbuatan'])->name('refData.wujud_perbuatan');
    Route::post('data-master/wujud-perbuatan', [RefDataController::class, 'wujudPerbuatan'])->name('refData.wujud_perbuatan.view');
    Route::post('data-master/wujud-perbuatan/save', [RefDataController::class, 'saveWujudPerbuatan'])->name('refData.wujud_perbuatan.save');
    Route::post('data-master/wujud-perbuatan/save/edit', [RefDataController::class, 'saveEditWP'])->name('refData.wujud_perbuatan.edit');
    Route::get('data-master/wujud-perbuatan/delete/{id}', [RefDataController::class, 'deleteWujudPerbuatan'])->name('refData.wujud_perbuatan.delete');

    Route::get('data-master/satuan-polda', [RefDataController::class, 'satuanPolda'])->name('refData.satuan-polda');
    Route::post('satuan-polda/save', [RefDataController::class, 'savePolda'])->name('refData.satuan-polda.save');
    Route::get('data-master/satuan-polres', [RefDataController::class, 'satuanPolres'])->name('refData.satuan-polres');
    Route::post('satuan-polres/save', [RefDataController::class, 'savePolres'])->name('refData.satuan-polres.save');
    Route::get('data-master/satuan-polsek', [RefDataController::class, 'satuanPolsek'])->name('refData.satuan-polsek');
    Route::post('satuan-polsek/save', [RefDataController::class, 'savePolsek'])->name('refData.satuan-polsek.save');
    Route::post('data-master/satuan-data/polda', [RefDataController::class, 'getPolda'])->name('refData.get-polda');
    Route::post('data-master/satuan-data/polres', [RefDataController::class, 'getPolres'])->name('refData.get-polres');
    Route::post('data-master/satuan-data/polsek', [RefDataController::class, 'getPolsek'])->name('refData.get-polsek');

    Route::get('satuan-data/polsek/delete/{id}', [RefDataController::class, 'deletePolsek']);
    Route::get('satuan-data/polres/delete/{id}', [RefDataController::class, 'deletePolres']);
    Route::get('satuan-data/polda/delete/{id}', [RefDataController::class, 'deletePolda']);




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


Route::get('test', [SideMenuController::class, 'importPangkat']);
Route::get('import/pangkat', [ImportReffController::class, 'importPangkat']);
Route::get('import/satuan', [ImportReffController::class, 'importSatuan']);
Route::get('import/wpkepp', [ImportReffController::class, 'importWpKepp']);
Route::get('import/wpdisiplin', [ImportReffController::class, 'importWpDisiplin']);
Route::get('import/putusan', [ImportReffController::class, 'importPutusan']);
Route::get('import/berhenti', [ImportReffController::class, 'importAlasan']);
