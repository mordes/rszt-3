<?php

use Illuminate\Support\Facades\Route;
use App\Events\FormSubmitted;

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

Route::get('/testblade', function () {
    return view('emails.sendNewsletter');
});

Route::get('/sendall', 'NewsletterController@index');
Route::post('/sendall/send', 'NewsletterController@send');

Route::patch('/b/place/{sales}', 'PlaceBidController@update');

Route::get('/b/{sales}', 'BidController@show');
Route::post('/b/{sales}', 'PlaceBidController@sendMessage');

Route::get('/s/create', 'BidController@create');
Route::post('/s', 'BidController@store');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/', 'HomeController@index')->name('home.index');;
