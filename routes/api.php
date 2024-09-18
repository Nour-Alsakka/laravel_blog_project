<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/search?query={key}', [ApiController::class, 'search'])->name('search');
// Route::get('/search', 'ApiController@search')->name('search');
Route::get('/search', [ApiController::class, 'search'])->name('search');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
