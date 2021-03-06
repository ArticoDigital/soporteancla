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
/*Route::post('/tickets', [
    'uses' => 'TicketController@filterviewTickets',
])->name('filtertickets');*/

//usar este sobre el filterviewtickets
Route::get('/ticketsget', [
    'uses' => 'TicketController@filterviewTicketsget',
])->name('filterticketsget');
/*Route::post('/tickets/{user}', [
    'uses' => 'TicketController@filterviewTicketsUser',
])->name('filterticketsuser');*/


Route::get('/ticket/{ticket}', 'TicketController@show')
    ->name('ticket')
    ->middleware('ticketUser');

Route::get('/usuarios', 'UserController@index')->name('users');

Route::get('/usuario/{user}', 'UserController@edit')->name('user');
//Route::post('/usuariof/{user}', 'UserController@editfiltrado')->name('ticketuserfiltered');
//Route::get('/usuariof/{user}', 'UserController@editfiltradoget')->name('ticketuserfilteredget');
Route::post('/usuario/{user}', 'UserController@update')->name('userUpdate');

Route::get('/usuarios/nuevo', 'UserController@create')->name('userCreate');
Route::post('/usuarios/nuevo', 'UserController@store')->name('userStore');

Route::get('/categorias', 'CategoryController@index')->name('categories');
Route::get('/categoria/nuevo', 'CategoryController@create')->name('categoryCreate');
Route::post('/categoria/nuevo', 'CategoryController@store')->name('categoryStore');
Route::get('/categoria/{category}', 'CategoryController@edit')->name('category');
Route::post('/categoria/{user}', 'CategoryController@update')->name('categoryUpdate');

Route::get('/categoria/{category}/subcategoria/nuevo', 'ServiceSubcategoryController@create')->name('subcategoryCreate');
Route::post('/categoria/{category}/subcategoria/nuevo', 'ServiceSubcategoryController@store')->name('subcategoryStore');
Route::get('/subcategoria/{subcategory}', 'ServiceSubcategoryController@edit')->name('subcategory');
Route::post('/subcategoria/{subcategory}', 'ServiceSubcategoryController@update')->name('subcategoryUpdate');

Route::get('/perfil', 'UserProfileController@edit')->name('profile');
Route::post('/perfil', 'UserProfileController@update')->name('profileUpdate');

Route::get('/admin', function () {
   return redirect()->route('tickets');
})->name('dashboard');


Route::post('/updateTicket/{ticket}', 'TicketController@update')->name('updateTicket');
Route::post('/updateComment', 'CommentController@store')->name('updateComment');

Route::delete('/usuario/{user}', 'UserController@destroy')->name('userDelete');
Route::delete('/categoria/{subcategory}', 'ServiceSubcategoryController@destroy')->name('subcategoryDelete');
Route::delete('/categorias/{category}', 'CategoryController@destroy')->name('categoryDelete');
Route::get('/downloadExcel', 'ExportController@tickets')->name('downloadExcel');
