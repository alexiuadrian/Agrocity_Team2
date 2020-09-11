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


Route::get('/contact', function(){
    return view('contact');
});

Route::get('/about', function(){
    return view('about', [
        'articles'=>App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', 'ArticlesController@showAll');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show');
Route::put('/articles/{article}/edit', 'ArticlesController@edit');
