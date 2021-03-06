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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/drugs', 'ProductsController')->only([
    'create', 'store', 'index', 'edit', 'update'
]);
Route::resource('/patients', 'PatientsController')->only([
    'create', 'store', 'index'
]);
Route::resource('/transactions', 'TransactionsController')->only([
    'create', 'store', 'index'
]);