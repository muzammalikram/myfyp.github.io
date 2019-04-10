<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatEvent;
use App\User;
use App\Chat;
use App\Friends;
class ChatController extends Controller
{
   public function chat() {

       $message = "Hello";

       $user = User::find(auth()->user()->id);

       event(new ChatEvent($message , $user));

   }

   public function send_message(Request $request)
   {
       // return $request->user_id;

       $message = $request->message;

       $user = User::find(auth()->user()->id);

       $conversation_id = $user->id."_".$request->user_id;

       event(new ChatEvent($message , $user));

       $chat = Chat::create([
           'sender_id' => $user->id,
           'receiver_id' => $request->user_id,
           'conversation_id' => $conversation_id,
           'message' => $message
       ]);

       return response()->json($chat);

   }
   public function get_user()
   {
       $user = auth()->user();
       return response()->json($user);
   }
   public function get_messages()
   {
       $id = auth()->user()->id;
       $receiver_id = 2;
       $get_messages = Chat::where(['sender_id'=>$id , 'receiver_id'=>$receiver_id])->get();
   }

   public function get_friends()
   {
       $id = auth()->user()->id;

       $check_friends1 = Friends::where(['sender_id'=>$id , 'status'=>1])->pluck('receiver_id')->toArray();

       $check_friends2 = Friends::where(['receiver_id'=>$id , 'status'=>1])->pluck('sender_id')->toArray();

       $friends = array_merge($check_friends1 , $check_friends2);

       $get_friends = User::whereIn('id' , $friends)->get();

       return response()->json($get_friends);

   }
   public function getUserMessages($id)
   {
       $auth = auth()->user()->id;

       $conversation_id = $auth."_".$id;

       $conversation_id_2 = $id."_".$auth;

       $messages = Chat::where('conversation_id' , $conversation_id)->orWhere('conversation_id' , $conversation_id_2)->get();

       return response()->json($messages);

   }

}
