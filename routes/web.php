<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CalonController;
use App\Http\Controllers\Admin\PemilihController;
use App\Http\Controllers\Admin\HasilController;
use App\Http\Controllers\Admin\KontrolVotingController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\CalonPublicController;

// ======================
// PUBLIC ROUTES
// ======================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/calon', [CalonPublicController::class, 'index'])->name('calon.public');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

// ======================
// VOTING ROUTES (PEMILIH)
// ======================

Route::get('/voting', [VotingController::class, 'index'])->name('voting.index');
Route::post('/voting/verify', [VotingController::class, 'verify'])->name('voting.verify');
Route::post('/voting/submit', [VotingController::class, 'submit'])->name('voting.submit');

Route::get('/voting/success', function () {
    return view('voting.success');
})->name('voting.success');

Route::get('/voting/history', [VotingController::class, 'history'])
    ->middleware(['pemilih.only', 'admin.block.voting'])
    ->name('voting.history');

// ======================
// ADMIN ROUTES
// ======================

Route::prefix('admin')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

        // CRUD Calon
        Route::resource('calon', CalonController::class);

        // CRUD Pemilih
        Route::resource('pemilih', PemilihController::class);
        Route::post('pemilih/import', [PemilihController::class, 'import'])->name('pemilih.import');

        // Hasil Real-time
        Route::get('hasil', [HasilController::class, 'index'])->name('admin.hasil');

        // Kontrol Voting
        Route::post('kontrol/buka', [KontrolVotingController::class, 'buka'])->name('admin.voting.buka');
        Route::post('kontrol/tutup', [KontrolVotingController::class, 'tutup'])->name('admin.voting.tutup');
    });
});
