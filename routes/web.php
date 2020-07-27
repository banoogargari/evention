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

Route::get('/', 'HomepageController@index')->name('homepage');
Route::get('/search', 'SearchController@index')->name('search');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function() { return "Goodbye"; });

Route::resource('bookings', 'BookingController');
Route::get('/bookings/createNew/{id}', 'BookingController@createNew')->name('bookings.createNew')->middleware('auth');


Route::resource('events', 'EventController');
Route::get('/events/viewParticipants/{id}', 'EventController@viewParticipants')->name('viewParticipants')->middleware('auth');
