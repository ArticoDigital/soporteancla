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
/*
Route::get('/tickets', function () {
    return view('tickets');
})->name('tickets');*/

Route::get('/tickets', [
    'uses' => 'TicketController@viewTickets',
])->name('tickets');
Route::post('/tickets', [
    'uses' => 'TicketController@filterviewTickets',
])->name('filtertickets');

Route::get('/ticket/{ticket}', 'TicketController@show')->name('ticket');

Route::get('/usuarios', 'UserController@index')->name('users');

Route::get('/usuario/{user}', 'UserController@edit')->name('user');
Route::post('/usuario/{user}', 'UserController@update')->name('userUpdate');

Route::get('/usuarios/nuevo', 'UserController@create')->name('userCreate');
Route::post('/usuarios/nuevo', 'UserController@store')->name('userStore');

Route::get('/categorias', 'CategoryController@index')->name('categories');

Route::get('/categoria/nuevo', 'CategoryController@create')->name('categoryCreate');
Route::post('/categoria/nuevo', 'CategoryController@store')->name('categoryStore');

Route::get('/categoria/{category}', 'CategoryController@edit')->name('category');
Route::post('/categoria/{user}', 'CategoryController@update')->name('categoryUpdate');


Route::get('/perfil', function () {
    return view('profile');
})->name('profile');

Route::get('/admin', function () {
    return view('admin');
})->name('dashboard');


Route::post('/updateTicket/{ticket}', 'TicketController@update')->name('updateTicket');
Route::post('/updateComment', 'CommentController@store')->name('updateComment');
