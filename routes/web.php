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



/*Route::get('/{vue_capture?}', function () {
    return view('home');
})->where('vue_capture', '[\/\w\.-]*');
*/

Route::post('basic' , 'ProfileController@basic');
Route::get('get_basic' , 'ProfileController@get_basic');
Route::post('Basic_info' , 'ProfileController@Basic_info');
Route::post('Edu_info' , 'ProfileController@Edu_info');
Route::get('get_edu' , 'ProfileController@get_edu');
Route::post('work_info' , 'ProfileController@Work_info');
Route::post('userImage' , 'ImageController@store');
Route::get('get_auth' , 'ImageController@get_auth');
Route::post('interest' , 'ProfileController@interest');
Route::get('get_Image' , 'ImageController@get_Image');
Route::get('get_all_images' , 'ImageController@get_all_images');
Route::post('addPost' , 'PostController@store');
Route::get('get_posts' , 'PostController@index');
Route::get('showData' , 'PostController@showData');
Route::get('get_friend_Image' , 'ImageController@get_friend_Image');
Route::get('get_friend_info/{id}' , 'ProfileController@get_friend_info');
Route::post('addFriend/{id}' , 'ProfileController@addFriend');