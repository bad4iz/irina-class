<?php

use App\Http\Controllers\ArticleController;
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
Route::get('/articles',[ArticleController::class, 'index'])->name('all');
Route::get('/create',[ArticleController::class,'create'])->name('create');
Route::post('/create',[ArticleController::class, 'store'])->name('store');
Route::delete('/destroy',[ArticleController::class, 'destroy'])->name('destroy');

Route::get('/', function () {
    return view('welcome');
});
