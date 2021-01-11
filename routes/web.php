<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('article', ArticleController::class);
Route::resource('new', NewsController::class);
Route::resource('gallery', GalleryController::class);
Route::resource('photo', PhotoController::class);

Route::get('/', [IndexController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home',  [IndexController::class, 'index'])->name('home');


Route::get('/verify/{id}/{token}', [RegisterController::class, 'verify'])->name('register.verify');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
