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
Route::resource('department','DepartmentController');




Route::resource('user','UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('jobs','JobController');
Route::get('jobs/displays/{id}', 'JobController@displays')->name('jobs.displays');
Route::get('jobs/{id}/jobedit', 'JobController@jobedit')->name('jobs.jobedit');
