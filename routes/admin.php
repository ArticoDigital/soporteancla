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


Route::get('/tickets', function () {
    return view('tickets');
})->name('tickets');
Route::get('/ticket', function () {
    return view('ticket');
})->name('ticket');

Route::get('/usuarios', function () {
    return view('users');
})->name('users');
Route::get('/usuario', function () {
    return view('user');
})->name('user');
Route::get('/usuario/nuevo', function () {
    return view('user-create');
})->name('userCreate');
Route::get('/perfil', function () {
    return view('profile');
})->name('profile');

Route::get('/admin', function () {
    return view('admin');
})->name('dashboard');




