<?php

use App\Models\News;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    $berita = News::latest()->take(6)->get();
    return view('welcome', [
        'news' => $berita,
    ]);
})->name('home');

Route::get('/profil-desa', function () {
    return view('profil-desa');
})->name('profil-desa');

Route::get('berita', [BeritaController::class, 'index'])->name('berita');

Route::get('berita/articel/{id}', [BeritaController::class, 'article'])->name('artikel');

Route::get('/admin/report', function () {
    return view('pages.report');
})->name('report');