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
         $sendRequest = Friends::create(['sender_id' => $sender_id , 'receiver_id' => $friend_id,
             ]);

         $friend = User::find($friend_id);
         //$arr = array($friend->f_name , $friend->id);
         //dd($arr);

         User::find($sender_id)->notify(new NotifyAddFriend($friend));

         return response()->json($friend);
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

         $res = Friends::where('sender_id',$id)->Where('status' , 1)->get();
         //   $res = Friends::where(['sender_id' => $id , 'status'=> 1]);

         // $res = User::find(1)->friends()->get();
         $res = auth()->user()->friends->where('status' , 1);

         $user_name = '';
         foreach ($res as $r )
         {
             //dd($r->receiver_id);
             $a = $r->receiver_id;
             $user_name .= User::where('id', $a)->get();

         }


         /*===============*/

        // $f = Friends::where('sender_id' , $id )->where('status' , 1)->get();
        // dd($f);

        //$abc = User::whereIn("id" , $f)->get();



        //dd($abc);

         /*===============*/

         //dd($user_name);
        // dd($user_name);

          //dd($a);
         return json_encode($user_name);
     //    return $user_name;

         //return response()->json(['user_name'=>$user_name]);



         //User::whereIn("id" , Friends::where(senderid , authid ) Or where(receiverid , auth id)->(status , 1)
         //dd($getFriends);
     }
}
