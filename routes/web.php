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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{id}', 'NewsController@show')->name('news.show')->where('id', '[0-9]+');
Route::middleware('auth')->group(function () {
    Route::get('/news/create', 'NewsController@create')->name('news.create');
    Route::post('/news/store', 'NewsController@store')->name('news.store');
});
Route::middleware('is_admin')->group(function () {
    Route::get('/news/published', 'NewsController@indexNotPublished')->name('news.index_not_published');
    Route::post('/news/published/{id}', 'NewsController@published')->where('id','[0-9]+')->name('news.published');
});


