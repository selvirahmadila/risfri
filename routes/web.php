<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\InfoFrekuensiController;
use App\Http\Controllers\Admin\KamusController;
use App\Http\Controllers\Admin\TabelSpektrumController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\RegulasiController;

Route::get('/', [UserController::class, 'home'])->name('home');

// User Routes
Route::get('/info-frekuensi', [UserController::class, 'infoFrekuensi'])->name('info-frekuensi');
Route::get('/kamus', [UserController::class, 'kamus'])->name('kamus');
Route::get('/tabel-spektrum', [UserController::class, 'tabelSpektrum'])->name('tabel-spektrum');
Route::get('/materi', [UserController::class, 'materi'])->name('materi');
Route::get('/regulasi', [UserController::class, 'regulasi'])->name('regulasi');

// Admin Routes (require login)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
	// Redirect /admin -> /admin/dashboard
	Route::get('/', function () {
		return redirect()->route('admin.dashboard');
	})->name('root');

	// Dashboard
	Route::get('/dashboard', function () {
		return view('admin.dashboard');
	})->name('dashboard');

	// Info Frekuensi CRUD
	Route::resource('info-frekuensi', InfoFrekuensiController::class);

	// Kamus CRUD
	Route::resource('kamus', KamusController::class);

	// Tabel Spektrum CRUD
	Route::resource('tabel-spektrum', TabelSpektrumController::class);

	// Materi CRUD
	Route::resource('materi', MateriController::class);

	// Regulasi CRUD
	Route::resource('regulasi', RegulasiController::class);

	// Users Management
	Route::get('/users', function () {
		return view('admin.users.index');
	})->name('users.index');
});

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
