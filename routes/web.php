<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarcodeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [BarcodeController::class, 'index'])->name('dashboard');

    Route::get('/barcodes/create', [BarcodeController::class, 'create'])->name('barcodes.create');
    Route::post('/barcodes', [BarcodeController::class, 'store'])->name('barcodes.store');
    Route::get('/barcodes/scan', [BarcodeController::class, 'scanForm'])->name('barcodes.scan');
    Route::post('/barcodes/scan', [BarcodeController::class, 'processScan'])->name('barcodes.processScan');
    Route::get('/barcodes/{id}/edit', [BarcodeController::class, 'edit'])->name('barcodes.edit');
    Route::post('/barcodes/update', [BarcodeController::class, 'update'])->name('barcodes.update');
});

require __DIR__.'/auth.php';
