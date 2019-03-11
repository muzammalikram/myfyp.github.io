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
|auth:api
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();

});

//Auth::routes();
/*Route::post('basic' , 'ProfileController@basic');
Route::post('Basic_info' , 'ProfileController@Basic_info');
Route::post('Edu_info/{id}' , 'ProfileController@Edu_info');
Route::post('work_info/{id}' , 'ProfileController@Work_info');

Route::post('interest/{id}' , 'ProfileController@interest');*/