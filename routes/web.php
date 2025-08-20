<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home'); // langsung ke halaman utama
})->name('home');

// route tambahan
Route::get('/info-frekuensi', fn() => view('user.info_frekuensi'))->name('info-frekuensi');
Route::get('/kamus', fn() => view('user.kamus'))->name('kamus');
Route::get('/tabel-spektrum', fn() => view('user.tabel_spektrum'))->name('tabel-spektrum');
Route::get('/materi', fn() => view('user.materi'))->name('materi');
Route::get('/regulasi', fn() => view('user.regulasi'))->name('regulasi');
