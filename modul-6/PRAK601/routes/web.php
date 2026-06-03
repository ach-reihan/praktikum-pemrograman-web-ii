<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('beranda');
Route::get('/profil', [PortfolioController::class, 'profile'])->name('profil');
Route::get('/pengalaman/{id}', [PortfolioController::class, 'detail'])->name('detail');