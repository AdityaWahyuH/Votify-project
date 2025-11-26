<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/calon', [CalonPublicController::class, 'index'])->name('calon.public');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');