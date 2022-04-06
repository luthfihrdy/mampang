<?php

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

Route::get('/', function () {
    if (auth()->user()->role_id == 1) {
        return redirect()->route('admin.dash');
    }elseif(auth()->user()->role_id == 2) {
        return redirect()->route('validator.dash');
    }elseif(auth()->user()->role_id == 3) {
        return redirect()->route('pegawai.dash');
    }
})->middleware('auth');

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminDash'])->name('admin.dash')->middleware('admin');
Route::get('/admin/user', [App\Http\Controllers\AdminController::class, 'showUser'])->name('admin.user')->middleware(['admin', 'auth']);
Route::get('/admin/user/data', [App\Http\Controllers\AdminController::class, 'getUser'])->name('admin.user_get')->middleware('admin');
Route::post('/admin/user/create', [App\Http\Controllers\AdminController::class, 'createUser'])->name('admin.user_create')->middleware('admin');
Route::get('/admin/user/update', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('admin.user_update')->middleware('admin');
Route::post('/admin/user/edit', [App\Http\Controllers\AdminController::class, 'editUser'])->name('admin.user_edit')->middleware('admin');
Route::post('/admin/user/delete/{ids}', [App\Http\Controllers\AdminController::class, 'destroyUser'])->name('admin.user_destroy')->middleware('admin');
Route::get('/admin/report', [App\Http\Controllers\AdminController::class, 'report'])->name('admin.report')->middleware(['admin', 'auth']);
Route::get('/admin/report/data', [App\Http\Controllers\AdminController::class, 'getData'])->name('admin.report_get')->middleware('admin');
Route::get('/admin/report/json', [App\Http\Controllers\AdminController::class, 'getUserJson'])->name('admin.get_user')->middleware('admin');
Route::get('/admin/report/filter', [App\Http\Controllers\AdminController::class, 'filter'])->name('admin.filter')->middleware('admin');

Route::get('/admin/harikerja', [App\Http\Controllers\AdminController::class, 'showHari'])->name('admin.harikerja')->middleware(['admin', 'auth']);
Route::get('/admin/harikerja/data', [App\Http\Controllers\AdminController::class, 'getHari'])->name('admin.hari_get')->middleware('admin');
Route::get('/admin/harikerja/create', [App\Http\Controllers\AdminController::class, 'createHari'])->name('admin.hari_create')->middleware('admin');

Route::get('/validator', [App\Http\Controllers\HomeController::class, 'validatorDash'])->name('validator.dash')->middleware('validator');
Route::get('/validator/aktivitas', [App\Http\Controllers\ValidatorController::class, 'index'])->name('validator.aktivitas')->middleware('validator');
Route::get('/validator/aktivitas/data', [App\Http\Controllers\ValidatorController::class, 'create'])->name('validator.aktivitas_get')->middleware('validator');
Route::post('/validator/aktivitas/approve/{ids}', [App\Http\Controllers\ValidatorController::class, 'approve'])->name('validator.aktivitas_approve')->middleware('validator');
Route::post('/validator/aktivitas/reject/{ids}', [App\Http\Controllers\ValidatorController::class, 'reject'])->name('validator.aktivitas_reject')->middleware('validator');

Route::get('/validator/skpvalidasi', [App\Http\Controllers\ValidatorskpController::class, 'index'])->name('validator.skpvalidasi')->middleware('validator');

Route::get('/pegawai', [App\Http\Controllers\HomeController::class, 'pegawaiDash'])->name('pegawai.dash')->middleware('pegawai');
Route::get('/pegawai/kegiatan', [App\Http\Controllers\KegiatanController::class, 'index'])->name('pegawai.kegiatan')->middleware(['pegawai','auth']);
Route::get('/pegawai/kegiatan/data', [App\Http\Controllers\KegiatanController::class, 'create'])->name('pegawai.kegiatan_get')->middleware('pegawai');
Route::post('/pegawai/kegiatan/store', [App\Http\Controllers\KegiatanController::class, 'storeKegiatan'])->name('pegawai.kegiatan_store')->middleware('pegawai');
Route::get('/pegawai/kegiatan/update', [App\Http\Controllers\KegiatanController::class, 'updateKegiatan'])->name('pegawai.kegiatan_update')->middleware('pegawai');
Route::post('/pegawai/kegiatan/edit', [App\Http\Controllers\KegiatanController::class, 'editKegiatan'])->name('pegawai.kegiatan_edit')->middleware('pegawai');
Route::post('/pegawai/kegiatan/delete/{ids}', [App\Http\Controllers\KegiatanController::class, 'destroyKegiatan'])->name('pegawai.kegiatan_destroy')->middleware('pegawai');

Route::get('/pegawai/kinerja', [App\Http\Controllers\KinerjaController::class, 'index'])->name('pegawai.ckinerja')->middleware('pegawai');

Route::get('/pegawai/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('pegawai.profile')->middleware('pegawai');


Route::get('/pegawai/cuti', [App\Http\Controllers\CutiController::class, 'index'])->name('pegawai.cuti')->middleware(['pegawai']);
Route::get('/pegawai/cuti/data', [App\Http\Controllers\CutiController::class, 'create'])->name('pegawai.cuti_get')->middleware('pegawai');

Route::get('/pegawai/skp', [App\Http\Controllers\SkpController::class, 'index'])->name('pegawai.skp')->middleware('pegawai');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/aktivitas', [App\Http\Controllers\AktivitasController::class, 'showAktivitas'])->name('aktivitas.dash')->middleware('pegawai');
//bedakan parameter /aktivitas dan /aktivitas/data, saya tambahkan /data untuk membedakan
Route::get('/aktivitas/data', [App\Http\Controllers\AktivitasController::class, 'getAktivitas'])->name('aktivitas.keg_get')->middleware('pegawai');