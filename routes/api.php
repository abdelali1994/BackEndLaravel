<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', 'UserController@login');
  Route::post('/register', 'UserController@register');
  Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/details', 'UserController@details');
    Route::post('/updateAvatar', 'UserController@updateAvatar');



  });
 

// Route::resource('/location','LocationController');
Route::get('/locations/{id}','LocationController@show');
Route::get('/locations','LocationController@index');
Route::post('/locations','LocationController@store');
Route::delete('/locations/{id}/delete','LocationController@delete');
Route::get('/users','UserController@index');
Route::get('/users/{id}','UserController@show');
Route::put('/users/{id}/update','UserController@update');
Route::post('/cars','CarController@store');
Route::get('/cars','CarController@index');
Route::get('/cars/{id} ','CarController@show');