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
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'OrderController@index');
    Route::get('/schedule', 'ScheduleController@index')->name('schedule');
    Route::get('/generate_schedule', 'ScheduleController@generateSchedule')->name('schedule.generate');

    Route::resource('order', 'OrderController');

    Route::get('/waktu-baku', 'WaktuBakuController@index')->name('waktu-baku');
    Route::get('/waktu/create', 'WaktuBakuController@create')->name('waktu.create');
    Route::post('/waktu/store', 'WaktuBakuController@store')->name('waktu.store');


    Route::get('logout', function (){
        Auth::logout();
        return redirect('/');
    });

    Route::get('password', 'OrderController@password');
	Route::post('password', 'OrderController@updatePassword');

});
