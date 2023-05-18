<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('/clubs')->group(function() {
    Route::get('/get', [\App\Http\Controllers\ClubController::class, 'index'])->name('club.index');
    Route::post('/create', [\App\Http\Controllers\ClubController::class, 'store'])->name('club.store');
    Route::post('/update', [\App\Http\Controllers\ClubController::class, 'update'])->name('club.update');
});
