<?php

namespace App\Http\Controllers;

use App\Notifications\NotifyAddFriend;
use App\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use App\UserInterest;
use App\Post;
use App\Friends;
use Psy\Util\Json;
use Hash;
use Notification;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileController extends Controller
{

	/* public function __construct()
    {
        //$this->middleware('auth');
    }
*/
	public function basic(Request $request)
    {
    	$id =  auth()->user()->id;   
    	
    	dd($id);
//    	return response()->json($this->user);
    }
     public function Basic_info(Request $request)
    {
 		$id = auth()->user()->id;

        $user = User::where('id' , $id)
            ->update(['f_name' => $request->f_name , 'l_name' => $request->l_name ,
                    'email' => $request->email , 'date' => $request->date ,
                    'month' => $request->month , 'year' => $request->year ,
                    'gender' => $request->gender ,
                    'city' => $request->city , 'country'=>$request->country , 'description'=>$request->description]);

        if ($user) {
        	 $result = User::where('id' , $id)->first();
        } 
        else
        {
       		$result = "Something wents gone";
        }
 
            return response()->json($result);
    }

    public function get_basic()
    {

    	$id = auth()->user()->id;
    	$result = User::where('id' , $id)->first();
    	return response()->json($result);

    }

    public function get_edu()
    {
    	$id = auth()->user()->id;
    	$result = Profile::where('user_id' , $id)->limit(5)->get();
    	return response()->json($result);
    }
    public function Edu_info(Request $request)
    {
	
		$id = auth()->user()->id;

        $user = Profile::where('user_id', $id)->count();

        if ($user == 0)
        {
            $user = new Profile;

            $user->user_id = $id;

            $user->university = $request->university;

            $user->edu_from = $request->edu_from;

            $user->edu_to = $request->edu_to;

            $user->edu_description = $request->edu_description;

            $user->graduate = $request->graduate;

            $user->save();

            $user = 0;

        }

        else
        {
            $user = Profile::where('user_id' , $id)
            ->update(['university'=> $request->university, 'edu_from'=> $request->edu_from,
                'edu_to'=> $request->edu_to, 'edu_description'=> $request->edu_description, 'graduate'=>$request->graduate]);

            $user = 1;

        }

        return response()->json($user);



    }

    public function Work_info(Request $request )
    {

		$id = auth()->user()->id;

        $user = Profile::where('user_id', $id)->count();

        if ($user == 0) {

            $user = new Profile;

            $user->user_id = $id;

            $user->work_company = $request->work_company;

            $user->work_designation = $request->work_designation;

            $user->work_from = $request->work_from;

            $user->work_to = $request->work_to;

            $user->work_city = $request->work_city;

            $user->work_description = $request->work_description;

            $user->save();

            $user = 0;
        }
        else
        {

            //$user = Profile::find(3);
            $user = Profile::where('user_id', $id)
            ->update(['work_company' => $request->work_company, 'work_designation'=> $request->work_designation,
                'work_from' => $request->work_from , 'work_to' => $request->work_to ,
                'work_city' => $request->work_city , 'work_description'=>$request->work_description
                ]);

            $user = 1;
        }

        return response()->json($user);

    }
    public function interest(Request $request )
    {
    	$id = auth()->user()->id;

        $interest = $request->user_interest;

       // return response()->json(['message' => $interest]);

        $query = UserInterest::create(['user_id'=>$id , 'interest'=>$interest]);

        return response()->json(['message' => $query]);

    }
     public function get_friend_info($id)
     {
            $user = User::where('id' , $id)->first();

            $profile =Profile::where('user_id' , $id)->first();

            $userImg =UserImage::where('user_id' , $id)->get();

            $interest =UserInterest::where('user_id' , $id)->get();

            $posts = Post::where('user_id' , $id)->get();

            $profileImg = UserImage::where('user_id' , $id)->orderBy('created_at', 'desc')->first();

            return response()->json(['user'=>$user , 'profile'=>$profile , 'userImg'=>$userImg,
            'userInterest'=>$interest , 'posts'=>$posts , 'profileImg'=>$profileImg
            ]);
     }

     public function addFriend($id)
     {
         $sender_id = auth()->user()->id;
         $friend_id = $id; 

            // $sender_id->befriend($friend_id);
        
            // $a = $this->assertCount(1, $recipient->getFriendRequests());

            // dd($a);
         $find = Friends::where(['sender_id' => $sender_id , 'receiver_id' => $friend_id])->first();

    /*    if ($find) {

            $sender_id->befriend($friend_id);
        
            $this->assertCount(1, $recipient->getFriendRequests());
        }*/

         if ($find) {

             $already_request = Friends::where(['sender_id' => $sender_id , 'receiver_id' => $friend_id , 'status' => 0])->first();
            
             if ($already_request) {

                $sendRequest = Friends::where('sender_id', $sender_id)
                  ->where('receiver_id', $friend_id)
                  ->update(['status' => 2]);

                  $getStatus = Friends::where(['sender_id' => $sender_id , 'receiver_id' => $friend_id])->first();
            
            }
            else
            {
                $sendRequest = Friends::where('sender_id', $sender_id)
                  ->where('receiver_id', $friend_id)
                  ->update(['status' => 0]);

              $getStatus = Friends::where(['sender_id' => $sender_id , 'receiver_id' => $friend_id])->first();
            }

        }
        else
        {
            /*==========Create user and send notification */

                $sendRequest = Friends::create(['sender_id' => $sender_id , 'receiver_id' => $friend_id , 'status' =>2
                     ]);  

                $getStatus = Friends::where(['sender_id' => $sender_id , 'receiver_id' => $friend_id])->first();

                 $sender_data = User::find($sender_id);

                 $friend = User::find($friend_id); 
            
                  Notification::send($friend, new NotifyAddFriend($sender_data));


        //     /*===========End===============================*/

       }

        //dd($getStatus);
 
         return response()->json($getStatus);
     }
     public function get_add_friend($id) 
     {
        $auth = auth()->user()->id;

        // Request Send

        // $f = Friends::where(['sender_id'=> $auth , 'receiver_id'=> $id])->first();


        $f = Friends::whereIn('sender_id' , [$auth, $id])->WhereIn('receiver_id', [$id,$auth])->first();

        if($f->sender_id == $auth){

            $addStatus = ($f->status == 2 ? 2 : 3);

        } elseif($f->receiver_id == $auth){

            $addStatus = ($f->status == 2 ? 3 : 2);
        } 

        if ($f == null) {
            $addStatus = 0;
        }

        return response()->json($addStatus); 
     }
     public function get_user_notification_info($id)
     {
        dd($id);
     }
     public function get_user_info(){

	    $id = auth()->user()->id;
         $user = User::where('id' , $id)->first();

        $profile =Profile::where('user_id' , $id)->first();
//
//         $userImg =UserImage::where('user_id' , $id)->get();
//
        $interest =UserInterest::where('user_id' , $id)->get();
//
//         $posts = Post::where('user_id' , $id)->get();
//
//         $profileImg = UserImage::where('user_id' , $id)->orderBy('created_at', 'desc')->first();

         return response()->json(['user'=>$user , 'profile'=>$profile ,
             'userInterest'=>$interest
         ]);
     }
     public function all_friends()
     {

        $id = auth()->user()->id; 
 
         $resIdsArr2 = auth()->user()->friends->where('status' , 1)->pluck('receiver_id')->toArray();
          
            $allFriends = User::whereIn('id', $resIdsArr2)->get();

           //  $a = $allFriends->profile;
            $arr = array();
            foreach ($allFriends as $name) {
                $n = $name->f_name;
                $arr[] .= $name->id;
          
            }
       $profile =    Profile::whereIn('user_id' , $arr)->get();

       //  $imgs = UserImage::where('user_id' , $arr)->orderBy('created_at','desc')->get();

         //dd($imgs);

        // dd($imgs);
        $imgs = UserImage::whereIn('user_id' , $arr)->get();


         // $imgs = UserImage::whereIn('user_id' , $arr)->pluck('user_id')->toArray();

       //     $new = UserImage::whereIn('user_id' , $imgs)->get();

          // dd($imgs);
         return json_encode(['all_friends' => $allFriends , 'Profiles'=>$profile ,
                            'images'=>$imgs]);
    
     }

     public function changePassword(Request $request)
    {

      //  dd($request->old_pass);

        $user = Auth::user();

        $old_pass = $request->old_pass;
        $new_pass = $request->new_pass;
        $confirm_pass = $request->confirm_pass;

        $data = array('password'=>$new_pass , 'password_confirmation'=>$confirm_pass , 'old_pass'=> $old_pass);

     //   dd($data);

        $validate = Validator::make($data, [
              

            'password' => [
                                'required', 
                                'min:6','confirmed',
                                'max:50',
                                'regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                            ], // asdASD123,./
             ]);
 

        if ($validate->fails()) {
           return response()->json(["result"=> 1 ]);   
        } 
 
        if (Hash::check($old_pass, $user->password) ) {
            $user_id = $user->id;
            $obj_user = User::find($user_id)->first();
            $obj_user->password = Hash::make($new_pass);
            $obj_user->save();

            return response()->json(["result"=>2]);
        }
        else
        {
            return response()->json(["result"=>0]);
        }
    }

    public function friend_request() {

        $id = auth()->user()->id;
        $req = Friends::where(['sender_id' => $id ])->get();

        return response()->json($req);
    }


}
