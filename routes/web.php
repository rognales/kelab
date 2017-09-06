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

Route::get('/registration', 'ParticipantController@index')->name('registration_home');
Route::post('/registration', 'ParticipantController@store')->name('registration_create');

Route::get('/participant/{participant}', 'ParticipantController@show')->name('registration_show');


Route::get('/attend/{slug}', 'ParticipantController@attend')->name('attend');
Route::get('/attend', 'AttendanceController@index')->name('attendance_index');

Route::get('/admin', 'AdminController@index')->name('admin_index');
Route::get('/admin/user', 'AdminController@user')->name('admin_user');
Route::get('/admin/payment', 'AdminController@payment')->name('admin_payment');
Route::get('/admin/payment/ajax', 'AdminController@payment_ajax')->name('admin_payment_ajax');
Route::get('/admin/attendance', 'AdminController@attendance')->name('admin_attendance');
