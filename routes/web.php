<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\listPassportController;
use App\Http\Controllers\maingroupController;
use App\Http\Controllers\passportController;
use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\personilController;
use App\Http\Controllers\visaController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    // HALAMAN DASHBOARD
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    // CRUD PASSPORT
    Route::get('/passport', [passportController::class, 'index']);
    Route::get('/passport/create', [passportController::class, 'create']);
    Route::post('/passport/simpan', [passportController::class, 'store']);
    Route::delete('/passport/delete/{id}', [passportController::class, 'destroy']);
    Route::get('/passport/edit/{id}', [passportController::class, 'edit']);
    Route::put('/passport/update/{id}', [passportController::class, 'update']);
    // CRUD PEGAWAI
    Route::get('/pegawai', [pegawaiController::class, 'index'])->name('pegawai');
    Route::get('/pegawai/export', [pegawaiController::class, 'export'])->name('exportpegawai');
    Route::get('/pegawai/pdf', [pegawaiController::class, 'cetak_pdf'])->name('pdfpegawai');
    Route::get('/pegawai/create', [pegawaiController::class, 'create'])->name('tambahpegawai');
    Route::post('/pegawai/simpan', [pegawaiController::class, 'store']);
    Route::delete('/pegawai/delete/{id}', [pegawaiController::class, 'destroy']);
    Route::get('/pegawai/edit/{id}', [pegawaiController::class, 'edit']);
    Route::put('/pegawai/update/{id}', [pegawaiController::class, 'update']);
    // LIST OF PASSPORT
    Route::get('/listpassport', [listPassportController::class, 'index'])->name('listpassport');
    Route::post('/listpassport/simpan', [listpassportController::class, 'store']);
    Route::delete('/listpassport/delete/{id}', [listpassportController::class, 'destroy']);
    Route::get('/listpassport/edit/{id}', [listpassportController::class, 'edit']);
    Route::put('/listpassport/update/{id}', [listpassportController::class, 'update']);
    // PERSONIL
    Route::get('/listpassport/personil/{id1}/{id2}/{id3}', [personilController::class, 'index'])->name('personil');
    Route::post('/listpassport/personil/simpan/{id}', [personilController::class, 'store']);
    Route::get('/listpassport/personil/export/{id}', [personilController::class, 'export']);

    Route::get('/listpassport/personil/add-visa/{id1}/{id2}/{id3}/{id4}', [visaController::class, 'addVisa']);
    Route::get('/listpassport/personil/edit/{id1}/{id2}/{id3}/{id4}', [visaController::class, 'edit'])->name('editvisa');
    Route::post('/listpassport/personil/store-visa', [visaController::class, 'storeVisa'])->name('storeVisa');
    Route::post('/listpassport/personil/update-visa', [visaController::class, 'updateVisa'])->name('updateVisa');
    
    // MAIN GROUP
    Route::get('/listpassport/maingroup/{id1}/{id2}/{id3}', [maingroupController::class, 'index'])->name('maingroup');
    Route::post('/listpassport/maingroup/simpan/{id}', [maingroupController::class, 'store']);
    Route::get('/listpassport/maingroup/export/{id}', [maingroupController::class, 'export']);

    // VISA
    Route::delete('/listpassport/visa/delete/{id1}/{id2}/{id3}/{id4}', [visaController::class, 'hapusVISA']);
});

Route::post('/login', function () {
    $credentials = request()->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('/dashboard');
    } else {
        return redirect('/login');
    }
})->name('login');
