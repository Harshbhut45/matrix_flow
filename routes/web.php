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




// USER CRUD


Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
Route::post('/users/{id}', 'UserController@update')->name('users.update');
Route::get('/users/{id}','UserController@destroy')->name('users.delete');


// Points CRUD
Route::get('/points', 'PointController@index')->name('points.index');
Route::get('/points/create', 'PointController@create')->name('points.create');
Route::post('/points', 'PointController@store')->name('points.store');
Route::get('/points/{id}/edit', 'PointController@edit')->name('points.edit');
Route::post('/points/{id}', 'PointController@update')->name('points.update');
Route::get('/points/{id}','PointController@destroy')->name('points.delete');


// Department CRUD
Route::get('/departments', 'DepartmentController@index')->name('departments.index');
Route::get('/departments/create', 'DepartmentController@create')->name('departments.create');
Route::post('/departments', 'DepartmentController@store')->name('departments.store');
Route::get('/departments/{id}/edit', 'DepartmentController@edit')->name('departments.edit');
Route::post('/departments/{id}', 'DepartmentController@update')->name('departments.update');
Route::get('/departments/{id}','DepartmentController@destroy')->name('departments.delete');


// Flow CRUD
Route::get('/flows', 'FlowController@index')->name('flows.index');
Route::get('/flows/create', 'FlowController@create')->name('flows.create');
Route::post('/flows', 'FlowController@store')->name('flows.store');
Route::get('/flows/{id}/edit', 'FlowController@edit')->name('flows.edit');
Route::post('/flows/{id}', 'FlowController@update')->name('flows.update');
Route::get('/flows/{id}','FlowController@destroy')->name('flows.delete');




// Route::get('/show', function () {
//     return view('pages.users.show');
// });


Route::get('/show/{id}', 'PointController@show')->name('points.show');