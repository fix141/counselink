<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\GuruBK\GuruBKDashboardController;
use App\Http\Controllers\WaliKelas\WaliKelasDashboardController;
use App\Http\Controllers\Siswa\SiswaDashboardController;
use App\Http\Controllers\Orangtua\OrangtuaDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        $user = Auth::user();

        // FIX: Tambah ->name
        return match($user->role->name) {
            'admin' => redirect()->route('admin.dashboard'),
            'guru_bk' => redirect()->route('guru-bk.dashboard'),
            'wali_kelas' => redirect()->route('wali-kelas.dashboard'),
            'siswa' => redirect()->route('siswa.dashboard'),
            'orangtua' => redirect()->route('orangtua.dashboard'),
            default => abort(403, 'Role tidak dikenali'),
        };
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'verified', 'role:guru_bk'])->prefix('guru-bk')->name('guru-bk.')->group(function () {
    Route::get('/dashboard', [GuruBKDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'verified', 'role:wali_kelas'])->prefix('wali-kelas')->name('wali-kelas.')->group(function () {
    Route::get('/dashboard', [WaliKelasDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'verified', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'verified', 'role:orangtua'])->prefix('orangtua')->name('orangtua.')->group(function () {
    Route::get('/dashboard', [OrangtuaDashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
