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



/*Route::get('/{vue_capture?}', function () {
    return view('home');
})->where('vue_capture', '[\/\w\.-]*');
*/
Route::get('/', function () {

    return view('welcome');
});
Route::get('/abc', function () {

        $user = auth()->user();
        $profile = $user->profile->first();

    $user_id = auth()->user()->id;

    $result = PostActions::where(['action'=>3, 'action_perform_user_id'=>$user_id])->get();

    //return response()->json($result);


        dd($result);
//        if(is_null($profile));

        dd();

    //  toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')
    return view('welcome');
});

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
Route::post('get_notifications' , 'NotificationController@get_notifications');
Route::get('get_user_info' , 'ProfileController@get_user_info');
Route::post('post_action/{post_id}' , 'PostController@post_action');
Route::post('all_comments' , 'PostController@all_comments');
Route::post('all_friends' , 'ProfileController@all_friends');
Route::post('changePassword' , 'ProfileController@changePassword');
Route::post('get_user-notification_info/{id}' , 'ProfileController@get_user_notification_info');
Route::post('friend_request' , 'ProfileController@friend_request');
Route::get('get_add_friend/{id}' , 'ProfileController@get_add_friend');
Route::get('get_newsFeed' , 'PostController@get_newsFeed');
Route::post('get_friends_comments' , 'PostController@get_friends_comments');