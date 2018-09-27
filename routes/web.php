<?php

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



Route::get('/', 'TicketController@create')->name('home');


Route::post('/createticket','TicketController@store')->name('storeticket');

Route::get('/inicio-sesion', function () {
    return view('home');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Auth::routes();
