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

/* Get Method */
Route::get('/', 'PagesController@index');
Route::get('/viewActivity/{id}', 'PagesController@view');
Route::get('/EditAct/{id}', 'PagesController@edit');
Route::get('/time_in/{member_id}/{activity_id}', 'AttendanceController@time_in');
Route::get('/time_out/{attendance_log_id}/{activity_id}', 'AttendanceController@time_out');
Route::get('/newActivity', 'PagesController@create');

/* Post Method */
Route::post('/create','ActivityController@store'); 
Route::post('/updateAct','ActivityController@update'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
