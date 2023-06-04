<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Welcome;
use App\Http\Livewire\EditProfile;
use App\Http\Livewire\Jadwals;
use App\Http\Livewire\Labs;
use App\Http\Livewire\Kelas;
use App\Http\Livewire\MataKuliahs;
use App\Http\Livewire\UserControls;
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

Route::get('/', [Welcome::class, 'render'])->name('welcome');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified' , 'role:admin'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dosen/jadwal', Jadwals::class)->middleware('auth', 'role:dosen', 'verified')->name('dosen.jadwal');

Route::middleware('auth', 'role:admin', 'verified')->group(function() {
    Route::get('/admin/usercontrol', UserControls::class)->name('admin.usercontrol');
    Route::get('/admin/jadwal', Jadwals::class)->name('admin.jadwal');
    Route::get('/admin/lab', Labs::class)->name('admin.lab');
    Route::get('/admin/kelas', Kelas::class)->name('admin.kelas');
    Route::get('/admin/matkul', MataKuliahs::class)->name('admin.matkul');
});


require __DIR__.'/auth.php';
