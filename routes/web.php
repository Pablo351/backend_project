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
    return view('home.home');
}) ->name('home');

Route::resource('post', 'PostController');
Route::group(['prefix'=> 'post'], function (){
    Route::post('search', 'postController@search')->name('post.search');
});

Route::resource('categoria', 'CategoriaController');
Route::group(['prefix'=> 'categoria'], function (){
    Route::post('search', 'CategoriaController@search')->name('categoria.search');
});
