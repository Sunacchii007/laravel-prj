<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticlesController;
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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('auth.form');

Route::post('/login', [AdminController::class, 'login'])->name('auth.login');
Route::middleware('authentication')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('auth.logout');

    Route::get('/articles/search', [ArticlesController::class, 'search'])->name('articles.search');
    Route::post('/articles/search', [ArticlesController::class, 'result'])->name('articles.find');
    // Route::post('/articles/result', [ArticlesController::class, 'result'])->name('articles.result');

    Route::resource('articles', ArticlesController::class);
    Route::redirect('/', route('articles.index'));
});