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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/{year?}','BookController@home')
//    ->where('year','\d+')
//    ->name('home');
Route::get('/','BookController@home')
    ->name('home');
Route::get('/details/{id}', 'BookController@details')
    ->where('id','\d+')
    ->name('details');
Route::get('/delete/{id}', 'BookController@delete')
    ->name('delete');
Route::get('/search', 'BookController@search')
    ->name('search');
Route::post('/register', 'BookController@register')
    ->name('register');