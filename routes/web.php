<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\site\SiteController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::get('/search', [SiteController::class, 'search'])->name('search');
Route::get('/', [SiteController::class, 'index'])->name('index');

Route::get('/news/{id}', [SiteController::class, 'news_details'])->name('news.news_details');
Route::get('/category/{id}', [SiteController::class, 'category_posts'])->name('category_posts');


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_check'])->name('login_check');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group([
    'prefix' => '/dashboard',
    'middleware' => ['IsAdmin'],
    'as' => 'dashboard.'
], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::post('/upload', [UploadController::class, 'upload_image'])->name('upload');
    Route::resource('posts', BlogsController::class);
    Route::resource('authors', AuthorsController::class);
    Route::resource('categories', CategoriesController::class);
});
