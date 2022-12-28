<?php

use App\Http\Controllers\KalenderController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\LpjController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
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

Route::get('/', function () {
    return view('admin.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dasboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dasboard');
Route::prefix('surat')->group(function () {
    Route::prefix('surat_masuk')->group( function () {
        Route::GET('/data', [SuratMasukController::class, 'data'])->name('surat.surat_masuk.data');
        Route::get('/', [SuratMasukController::class, 'index'])->name('surat.surat_masuk');
        Route::get('/add', [SuratMasukController::class, 'create'])->name('surat.surat_masuk.add');
        Route::post('/store', [SuratMasukController::class, 'store'])->name('surat.surat_masuk.store');
        Route::get('/edit/{id}', [SuratMasukController::class, 'edit'])->name('surat.surat_masuk.edit');
        Route::post('/update/{id}', [SuratMasukController::class, 'update'])->name('surat.surat_masuk.update');
        Route::get('/destory/{id}', [SuratMasukController::class, 'destroy'])->name('surat.surat_masuk.destroy');
    });
    Route::prefix('surat_keluar')->group(function () {
        Route::GET('/data', [SuratKeluarController::class, 'data'])->name('surat.surat_keluar.data');
        Route::get('/', [SuratKeluarController::class, 'index'])->name('surat.surat_keluar');
        Route::get('/add', [SuratKeluarController::class, 'create'])->name('surat.surat_keluar.add');
        Route::POST('/store', [SuratKeluarController::class,'store'])->name('surat.surat_keluar.store');
        Route::get('/edit/{id}', [SuratKeluarController::class, 'edit'])->name('surat.surat_keluar.edit');
        Route::POST('/update/{id}', [SuratKeluarController::class,'update'])->name('surat.surat_keluar.update');
        Route::GET('/destroy/{id}', [SuratKeluarController::class,'destroy'])->name('surat.surat_keluar.destroy');
    });
});
Route::prefix('proposal')->group(function () {
    Route::GET('/data', [ProposalController::class, 'data'])->name('proposal.data');
    Route::get('/', [ProposalController::class, 'index'])->name('proposal');
    Route::get('/add', [ProposalController::class, 'create'])->name('proposal.add');
    Route::POST('/store', [ProposalController::class,'store'])->name('proposal.store');
    Route::get('/edit/{id}', [ProposalController::class, 'edit'])->name('proposal.edit');
    Route::POST('/update/{id}', [ProposalController::class,'update'])->name('proposal.update');
    Route::GET('/destroy/{id}', [ProposalController::class,'destroy'])->name('proposal.destroy');
});
Route::prefix('lpj')->group(function () {
    Route::GET('/data', [LpjController::class, 'data'])->name('lpj.data');
    Route::get('/', [LpjController::class, 'index'])->name('lpj');
    Route::get('/add', [LpjController::class, 'create'])->name('lpj.add');
    Route::POST('/store', [LpjController::class,'store'])->name('lpj.store');
    Route::get('/edit/{id}', [LpjController::class, 'edit'])->name('lpj.edit');
    Route::POST('/update/{id}', [LpjController::class,'update'])->name('lpj.update');
    Route::GET('/destroy/{id}', [LpjController::class,'destroy'])->name('lpj.destroy');
});
Route::prefix('kegiatan')->group(function () {
    Route::GET('/data', [KalenderController::class, 'data'])->name('kegiatan.data');
    Route::get('/', [KalenderController::class, 'index'])->name('kegiatan');
    Route::get('/add', [KalenderController::class, 'create'])->name('kegiatan.add');
    Route::POST('/store', [KalenderController::class,'store'])->name('kegiatan.store');
    Route::get('/edit/{id}', [KalenderController::class, 'edit'])->name('kegiatan.edit');
    Route::POST('/update/{id}', [KalenderController::class,'update'])->name('kegiatan.update');
    Route::GET('/destroy/{id}', [KalenderController::class,'destroy'])->name('kegiatan.destroy');
});

Route::prefix('user')->group(function () {
    Route::GET('/data', [UserController::class, 'data'])->name('user.data');
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('/add', [UserController::class, 'create'])->name('user.add');
    Route::POST('/store', [UserController::class,'store'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::POST('/update/{id}', [UserController::class,'update'])->name('user.update');
    Route::GET('/destroy/{id}', [UserController::class,'destroy'])->name('user.destroy');
});
Route::prefix('kas')->group(function () {
    Route::GET('/data', [KasController::class, 'data'])->name('kas.data');
    Route::get('/', [KasController::class, 'index'])->name('kas');
    Route::get('/add', [KasController::class, 'create'])->name('kas.add');
    Route::POST('/store', [KasController::class,'store'])->name('kas.store');
    Route::get('/edit/{id}', [KasController::class, 'edit'])->name('kas.edit');
    Route::POST('/update/{id}', [KasController::class,'update'])->name('kas.update');
    Route::GET('/destroy/{id}', [KasController::class,'destroy'])->name('kas.destroy');
});
Route::prefix('nota')->group(function () {
    Route::GET('/data', [NotaController::class, 'data'])->name('nota.data');
    Route::get('/', [NotaController::class, 'index'])->name('nota');
    Route::get('/add', [NotaController::class, 'create'])->name('nota.add');
    Route::POST('/store', [NotaController::class,'store'])->name('nota.store');
    Route::get('/edit/{id}', [NotaController::class, 'edit'])->name('nota.edit');
    Route::POST('/update/{id}', [NotaController::class,'update'])->name('nota.update');
    Route::GET('/destroy/{id}', [NotaController::class,'destroy'])->name('nota.destroy');
});
