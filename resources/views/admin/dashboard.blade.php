@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halo Admin 👋</h1>
    <p>Selamat datang di halaman Admin RISFRI.</p>

    <ul>
        <li><a href="{{ url('/admin/info-frekuensi') }}">Kelola Info Frekuensi</a></li>
        <li><a href="{{ url('/admin/kamus') }}">Kelola Kamus SFR</a></li>
        <li><a href="{{ url('/admin/materi') }}">Kelola Materi Pembelajaran</a></li>
        <li><a href="{{ url('/admin/regulasi') }}">Kelola Regulasi</a></li>
        <li><a href="{{ url('/admin/tabel-spektrum') }}">Kelola Tabel Spektrum</a></li>
    </ul>
</div>
@endsection
