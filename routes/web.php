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
Route::get('/home/{id}', 'PeopleController@show')->name('showPeople');


Route::post('/storePeople', 'PeopleController@store')->name('storePeople');
Route::put('/editPeople', 'PeopleController@edit')->name('editPeople');
Route::delete('/deletePeople/{id}', 'PeopleController@destroy')->name('deletePeople');



