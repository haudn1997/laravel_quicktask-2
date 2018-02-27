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



/**
 * Show Task Dashboard
 */
Route::get('/{lang?}', 'TasksController@index')->name('lang');

Route::resource('/tasks','TasksController',['names'=>
    [
        'index' => 'index',
        'store' => 'add-tasks',
        'destroy' => 'del-task'
    ]
]);
