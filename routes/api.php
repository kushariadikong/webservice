<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your applicati 	on. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user'],function(){
	//user cuma bisa update data diri, lihat schedulenya, cancel schedule nya?
	Route::post('/login_check','AuthenticationController@authenticate');
	Route::group(['middleware' => ['jwt.auth']],function(){
		Route::resource('transaksi','mainController',['except'=>['show','delete','create','edit','update']]);
		Route::resource('item','ItemController',['except'=>['index','create','delete']]);
		Route::resource('user','UserController',['except'=>['update','create','edit','show','delete']]);
		Route::resource('schedule','ScheduleController',['except'=>['edit','create','store','delete']]);
	});
});
//member masuk , nambahin item , field : data item yang diberikan

Route::group(['prefix' =>'admin'],function(){

	Route::post('/login_check','AuthenticationController@authenticate');
	Route::group(['middleware' => ['jwt.auth']],function(){
		Route::resource('kurir','employeeController');
		Route::resource('transaksi','mainController',['except'=>['delete','edit','create']]);
		Route::resource('item','ItemController',['except'=>['create','delete']]);
		Route::resource('user','UserController',['except'=>['edit','create']]);
		Route::resource('schedule','ScheduleController',['except'=>['edit']]);
	});
});