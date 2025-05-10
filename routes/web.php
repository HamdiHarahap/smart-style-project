<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HairStyleController;

Route::get('/', function () {
    return view('home');
});

Route::get('/hair-style', [HairStyleController::class, 'index'])->name('style');
Route::get('/question', [ReportController::class, 'index'])->name('question');
Route::get('/result', [ReportController::class, 'show'])->name('recommend');
Route::post('/recommendation', [ReportController::class, 'store'])->name('store');