<?php

use App\Http\Controllers\BonusController;
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

Route::get('/', [BonusController::class, 'index'])->name('bonus.index');
Route::get('bonus/create', [BonusController::class, 'create'])->name('bonus.create');
Route::post('bonus', [BonusController::class, 'store'])->name('bonus.store');
Route::get('bonus/{id}/edit', [BonusController::class, 'edit'])->name('bonus.edit');
Route::put('bonus/{id}', [BonusController::class, 'update'])->name('bonus.update');
Route::delete('bonus/{id}', [BonusController::class, 'destroy'])->name('bonus.destroy');
Route::get('bonus/{id}', [BonusController::class, 'show'])->name('bonus.show');
