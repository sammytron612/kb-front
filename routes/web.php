<?php

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

Route::get('/search', function () {
    return view('search');
})->name('search')->middleware('token');

Route::get('/show', 'App\Http\Controllers\ArticleController@show')->name('article.show')->middleware('token');



require __DIR__.'/auth.php';
