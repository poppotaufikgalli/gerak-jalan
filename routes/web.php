<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KonfigController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PosJuriController;
use App\Http\Controllers\JuriKategoriController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\KatPesertaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/daftar-peserta/{id?}', [MainController::class, 'daftarPeserta'])->name('daftar-peserta');
Route::get('/form-pendaftaran-peserta/{id_lomba?}/{id_peserta?}', [MainController::class, 'formPendaftaranPeserta'])->name('form-pendaftaran-peserta');
Route::post('/daftar-umum', [MainController::class, 'daftarUmum'])->name('daftar-umum');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/main', [MainController::class, 'main'])->middleware(['auth', 'verified'])->name('main');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //User
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        //Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    //konfig
    Route::prefix('konfig')->group(function () {
        Route::get('/{tahun?}', [KonfigController::class, 'index'])->name('konfig');
        //Route::get('/create', [KonfigController::class, 'create'])->name('konfig.create');
        Route::post('/store', [KonfigController::class, 'store'])->name('konfig.store');
        //Route::get('/show/{id}', [KonfigController::class, 'show'])->name('konfig.show');
        //Route::get('/edit/{id}', [KonfigController::class, 'edit'])->name('konfig.edit');
        Route::post('/update', [KonfigController::class, 'update'])->name('konfig.update');
        Route::delete('/destroy/{id}', [KonfigController::class, 'destroy'])->name('konfig.destroy');
    });

    //lomba
    Route::prefix('lomba')->group(function () {
        Route::get('/', [LombaController::class, 'index'])->name('lomba');
        Route::get('/create', [LombaController::class, 'create'])->name('lomba.create');
        Route::post('/store', [LombaController::class, 'store'])->name('lomba.store');
        Route::get('/show/{id}', [LombaController::class, 'show'])->name('lomba.show');
        Route::get('/edit/{id}', [LombaController::class, 'edit'])->name('lomba.edit');
        Route::post('/update', [LombaController::class, 'update'])->name('lomba.update');
        Route::delete('/destroy/{id}', [LombaController::class, 'destroy'])->name('lomba.destroy');
    });

    //lomba
    Route::prefix('kat_peserta')->group(function () {
        Route::get('/', [KatPesertaController::class, 'index'])->name('kat_peserta');
        Route::get('/create', [KatPesertaController::class, 'create'])->name('kat_peserta.create');
        Route::post('/store', [KatPesertaController::class, 'store'])->name('kat_peserta.store');
        Route::get('/show/{id}', [KatPesertaController::class, 'show'])->name('kat_peserta.show');
        Route::get('/edit/{id}', [KatPesertaController::class, 'edit'])->name('kat_peserta.edit');
        Route::post('/update', [KatPesertaController::class, 'update'])->name('kat_peserta.update');
        Route::delete('/destroy/{id}', [KatPesertaController::class, 'destroy'])->name('kat_peserta.destroy');
    });

    //pos juri
    Route::prefix('pos_juri')->group(function () {
        Route::get('/', [PosJuriController::class, 'index'])->name('pos_juri');
        Route::get('/create', [PosJuriController::class, 'create'])->name('pos_juri.create');
        Route::post('/store', [PosJuriController::class, 'store'])->name('pos_juri.store');
        Route::get('/show/{id}', [PosJuriController::class, 'show'])->name('pos_juri.show');
        Route::get('/edit/{id}', [PosJuriController::class, 'edit'])->name('pos_juri.edit');
        Route::post('/update', [PosJuriController::class, 'update'])->name('pos_juri.update');
        Route::delete('/destroy/{id}', [PosJuriController::class, 'destroy'])->name('pos_juri.destroy');
    });

    //juri kategori
    Route::prefix('juri_kategori')->group(function () {
        Route::get('/', [JuriKategoriController::class, 'index'])->name('juri_kategori');
        Route::get('/create', [JuriKategoriController::class, 'create'])->name('juri_kategori.create');
        Route::post('/store', [JuriKategoriController::class, 'store'])->name('juri_kategori.store');
        Route::get('/show/{id}', [JuriKategoriController::class, 'show'])->name('juri_kategori.show');
        Route::get('/edit/{id}', [JuriKategoriController::class, 'edit'])->name('juri_kategori.edit');
        Route::post('/update', [JuriKategoriController::class, 'update'])->name('juri_kategori.update');
        Route::delete('/destroy/{id}', [JuriKategoriController::class, 'destroy'])->name('juri_kategori.destroy');
    });

     //pendaftar
    Route::prefix('pendaftar')->group(function () {
        Route::get('{id?}/', [PendaftarController::class, 'index'])->name('pendaftar');
        Route::get('{id}/create', [PendaftarController::class, 'create'])->name('pendaftar.create');
        Route::post('/store', [PendaftarController::class, 'store'])->name('pendaftar.store');
        Route::get('/show/{id}', [PendaftarController::class, 'show'])->name('pendaftar.show');
        Route::get('/edit/{id}', [PendaftarController::class, 'edit'])->name('pendaftar.edit');
        Route::post('/update', [PendaftarController::class, 'update'])->name('pendaftar.update');
        Route::post('/destroy', [PendaftarController::class, 'destroy'])->name('pendaftar.destroy');
    });

    //Penilaian
    Route::prefix('penilaian')->group(function () {
        Route::get('/{id?}', [PenilaianController::class, 'index'])->name('penilaian');
        //Route::get('/create', [PenilaianController::class, 'create'])->name('penilaian.create');
        Route::post('/store', [PenilaianController::class, 'store'])->name('penilaian.store');
        Route::get('/show/{id}', [PenilaianController::class, 'show'])->name('penilaian.show');
        //Route::get('/edit/{id}', [PenilaianController::class, 'edit'])->name('penilaian.edit');
        Route::post('/update', [PenilaianController::class, 'update'])->name('penilaian.update');
        Route::delete('/destroy/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

//require __DIR__.'/auth.php';
