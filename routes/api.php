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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/resources')->group(function() {
    Route::post('/update', [\App\Http\Controllers\ResourceController::class, 'update'])->name('resources.update');
});
Route::prefix('/club')->group(function() {
    Route::get('/get', [\App\Http\Controllers\ClubController::class, 'index'])->name('club.index');
    Route::post('/create', [\App\Http\Controllers\ClubController::class, 'store'])->name('club.store');
});
