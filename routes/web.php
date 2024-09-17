<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_check'])->name('login_check');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::controller(LoginRegisterController::class)->group(function () {
//     Route::get('/register', 'register')->name('register');
//     Route::post('/store', 'store')->name('store');
//     Route::get('userlogin', 'login')->name('userlogin');
//     Route::post('/authenticate', 'authenticate')->name('authenticate');
//     Route::get('/site/index', 'mainsite')->name('mainsite');
//     Route::post('/logout', 'logout')->name('logout');
// });
// Route::group([
//     'middleware' => ['guest'],
//     'controller' => [LoginRegisterController::class],
// ], function () {
//     Route::get('/register', 'register')->name('register');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/userlogin', 'login')->name('userlogin');
//     Route::post('/authenticate', 'authenticate')->name('authenticate');
//     Route::get('/dashboard', 'dashboard')->withoutMiddleware(['guest'])->name('dashboard');
//     Route::post('/logout', 'logout')->withoutMiddleware(['guest'])->name('logout');
// });

Route::group(
    [
        'prefix' => '/dashboard',
        'middleware' => ['IsAdmin'],
        'as' => 'dashboard.'
    ],

    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::post('/upload', [UploadController::class, 'upload_image'])->name('upload');

        Route::resource('blogs', BlogsController::class);
        Route::resource('authors', AuthorsController::class);
        Route::resource('categories', CategoriesController::class);
    }
);
