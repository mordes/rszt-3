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

Route::get('/s/create', 'BidController@create');
Route::post('/s', 'BidController@store');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/redirect', 'RedirectController@index')->name('redirect');;
