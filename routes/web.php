<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';




Route::controller(ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('article.index');
    Route::get('/articles/details/{id}', 'show')->name('article.show');

    Route::middleware(['auth'])->group(function () {
        Route::get('/articles/create', 'create')->name('article.create');
        Route::post('/articles/store', 'store')->name('article.store');
        Route::get('/articles/{id}', 'delete')->name('article.delete');
    });
});
Route::controller(CommentController::class)->group(function () {
    Route::post('/comment/add', 'add')->name('comment.add');
    Route::get('/comment/delete/{id}', 'delete')->name('comment.delete');
});