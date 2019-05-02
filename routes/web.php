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

/*Route::get('/', function () {
    return view('welcome');
});*/
use App\PostActions;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('push_test' , function (){
    $myarray = array('foo',  'bar');

    $pu = array_push($myarray, 'hello');

    dd($pu);
});

/*Route::get('/{vue_capture?}', function () {
    return view('home');
})->where('vue_capture', '[\/\w\.-]*');
*/
Route::get('/', function () {

    return view('welcome');
});

Route::group(['middleware' => 'checkProfile' ], function () {
    // Auth::routes();
   // Route::get('/checkProfile', 'PostController@checkProfile');



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
Route::post('addFriendCustom' , 'ProfileController@addFriendCustom');
Route::post('get_notifications' , 'NotificationController@get_notifications');
Route::get('get_user_info' , 'ProfileController@get_user_info');
Route::post('post_action/{post_id}' , 'PostController@post_action');
Route::get('all_comments' , 'PostController@all_comments');
Route::post('all_friends' , 'ProfileController@all_friends');
Route::post('changePassword' , 'ProfileController@changePassword');
Route::post('get_user-notification_info/{id}' , 'ProfileController@get_user_notification_info');
Route::post('friend_request' , 'ProfileController@friend_request');
Route::get('get_add_friend/{id}' , 'ProfileController@get_add_friend');
Route::get('get_newsFeed' , 'PostController@get_newsFeed');
Route::post('add_comments' , 'PostController@add_comments');
Route::post('accept_Request/{id}' , 'ProfileController@accept_Request');
Route::get('send' , 'ChatController@chat');
Route::post('send_message' , 'ChatController@send_message');
Route::get('get_user' , 'ChatController@get_user');
Route::get('get_friends' , 'ChatController@get_friends');
Route::get('getUserMessages/{id}' , 'ChatController@getUserMessages');
Route::get('get_newsfeed_comments' , 'PostController@get_newsfeed_comments');
Route::get('get_user_newsfeed_similar_data' , 'PostController@get_user_newsfeed_similar_data');
Route::get('get_interest' , 'ProfileController@get_interest');
Route::post('interestDelete/{id}' , 'ProfileController@interestDelete');
Route::post('friendAdded' , 'ProfileController@friendAdded');
Route::post('liked' , 'PostController@liked');
Route::post('deleteComment/{id}' , 'PostController@deleteComment');
Route::get('get_newsFeed_new', 'PostController@get_newsFeed_new');
Route::get('who_to_follow' , 'ProfileController@who_to_follow');

});
