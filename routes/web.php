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

Route::get('/welcome', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/', 'HomeController@index')
    ->name('home');

Route::namespace('Auth')->group(function () {

    Route::get('/login/admin', 'LoginAdminController@adminLogin')
        ->name('login.admin');

    Route::post('/login/admin', 'LoginAdminController@login')
        ->name('login.admin');
});

Route::namespace('Admin')->group(function () {

    Route::get('/admin/dashboard', 'AdminController@index')
        ->name('admin.dashboard');

    //Destination
    Route::get('/admin/destination', 'DestinationController@index')
        ->name('admin.destination');
    Route::get('/admin/destination/create', 'DestinationController@create')
        ->name('admin.destination.create');
    Route::post('/admin/destination/store', 'DestinationController@store')
        ->name('admin.destination.store');
    Route::delete('/admin/destination/delete/{destination}', 'DestinationController@delete')
        ->name('admin.destination.delete');
    Route::get('/admin/destination/edit/{id}', 'DestinationController@edit')
        ->name('admin.destination.edit');
    Route::put('/admin/destination/update/{id}', 'DestinationController@update')
        ->name('admin.destination.update');
});


