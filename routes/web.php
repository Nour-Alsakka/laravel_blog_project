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


Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'store_user'])->name('store_user');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_check'])->name('login_check');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group([
    'prefix' => '/dashboard',
    'middleware' => ['IsAdmin'],
    'as' => 'dashboard.'
], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index')->middleware(\App\Http\Middleware\role::class);
    Route::post('/upload', [UploadController::class, 'upload_image'])->name('upload');
    Route::resource('posts', BlogsController::class);
    Route::resource('authors', AuthorsController::class)->middleware(\App\Http\Middleware\role::class);
    Route::get('/authors/{id}/blogs', [AuthorsController::class,'author_blogs'])->middleware(\App\Http\Middleware\role::class)->name('admin.authors.author_blogs');
    Route::resource('categories', CategoriesController::class);
});
