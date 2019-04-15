<?php

namespace App\Http\Controllers;

use App\UserImage;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\PostActions;
use App\Friends;
use App\Events\CommentEvent;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
          $posts = Post::where('user_id' , $id)->orderBy('created_at', 'desc')->get();

          $image = UserImage::where('user_id' , $id)->orderBy('created_at', 'desc')->first();

        return response()->json(['posts'=>$posts , 'userImg'=>$image ]);
 

    }

    public function showData() 
    {
        //$post = Post::find(2);
         //$p = $post->user;
         $abc = Post::where('user_id' , auth()->user()->id);
         $result = $abc->user;
        return response()->json($result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $price = $request->price;
       if ($request->hasFile('file')) {
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extention = $request->file('file')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extention;


            $path = $request->file('file')->move('storage/uploads/UserPost', $filenameToStore);
        }
        else 
        {
            $filenameToStore = null;
        }


            if ($request->caption != "") {
                $caption =  $request->caption; 
            }
            else
            {
                $caption = null;
            }




             $addPost = Post::create([
                'user_id' =>  auth()->user()->id, 
                'image' => $filenameToStore,
                'caption' => $caption,
                'price' => $price
            ]);
             if ($addPost) {
                 $result = Post::where('user_id' , auth()->user()->id)->orderBy('created_at', 'desc')->get();
             }
             else
             {
                $result = array('done' => 0,);
             }


        //$caption =  $request->all(); 

        return response()->json($result);
    }

    public function post_action(Request $request , $id)
    {

        //$cc = auth()->user()->posts->post_action;

        //dd($cc);
 
        $user_id = auth()->user()->id;
        $userImg = auth()->user()->user_images->last();
        $userName = auth()->user()->f_name;

        //dd($userName);

        $comment = $request->comment;

        $addComment = PostActions::create([
           'action_perform_user_id' => $user_id,
           'model_name' => 'App\PostActions',
           'model_id' => $id,
           'details' => $comment,
           'action' => 3
        ]);

        if ($addComment)
        {
            // $result = PostActions::where('model_id' , $id)->get();
           //  $result = PostActions::where(['action'=>3, 'action_perform_user_id'=>$user_id])->get();

            $result = PostActions::where(['action_perform_user_id' => $user_id , 'model_id' => $id])->get();

            $get_comment = PostActions::where(['action_perform_user_id' => $user_id, 'model_id' => $id])->OrderBy('created_at' , 'desc')->first();

            //dd($get_comment);
            event(new CommentEvent($get_comment , auth()->user()));
          //  event(new CommentEvent($get_comment , auth()->user()));
            //where(['name'=>'ali' , 'id'=>1])->where('date','12-3-4');

        }
        else
        {
            $result = "comment is not posted";
        }

        return response()->json(['result'=>$result , 'userImg' => $userImg , 'userName'=>$userName]);
    }

    public function all_comments()
    {
        $user_id = auth()->user()->id;

        $userName = auth()->user()->f_name;

        $userImg = auth()->user()->user_images->last();

        $id = auth()->user()->id;

        $check_friends1 = Friends::where(['sender_id'=>$id , 'status'=>1])->pluck('receiver_id')->toArray();

        $check_friends2 = Friends::where(['receiver_id'=>$id , 'status'=>1])->pluck('sender_id')->toArray();

        $friends = array_merge($check_friends1 , $check_friends2);

        $auth = array(auth()->user()->id);

        $arr_merge = array_merge($friends , $auth);
        //dd($arr_merge);

        $result = PostActions::whereIn('action_perform_user_id' ,$arr_merge )->get(); //paginate(3)

      //  $result = PostActions::whereIn(['action'=>3, 'action_perform_user_id'=>$user_id])->get();

        return response()->json(['comments' => $result , 'userImg'=> $userImg , 'userName' => $userName]);


    }

    public function get_newsFeed_new()
    {

        $id = auth()->user()->id;

        $check_friends1 = Friends::where(['sender_id'=>$id , 'status'=>1])->pluck('receiver_id')->toArray();

        $check_friends2 = Friends::where(['receiver_id'=>$id , 'status'=>1])->pluck('sender_id')->toArray();

        $friends = array_merge($check_friends1 , $check_friends2);

        $posts = Post::whereIn('user_id' , $friends)->pluck('id')->toArray();

        $ac = PostActions::whereIn('model_id' , $posts)->pluck('action_perform_user_id')->toArray();

     //   return response()->json($posts);

        $all_posts = Post::whereIn('user_id' , $friends)->with('post_Action')->get();
        return response()->json($all_posts);
        //  $user = User::whereIn('id' , $ac)->get();
        //dd($user);

        //  $user_name = User::whereIn('id' , $friends)->with('post_actions')->get();


        $user = User::whereIn('id' , $ac)->with('user_image')->get();

        //  $post_actions = Post::whereIn('user_id' , $friends)->with('post_action')->get();

        return response()->json(['posts'=>$posts , 'user' => $user]);

    }

    public function checkProfile()
    {
       $user = auth()->user()->id;
       if (is_null($user))
       {
           dd('profile page');
       }
       else
       {
           dd('newsfeed');
       }

    }

    public function deleteComment(Request $request , $id)
    {
        $delete = PostActions::where('id' , $id)->delete();

        $post_id = $request->post_id;

        $comments = PostActions::where('model_id' , $post_id)->get();

        return response()->json($comments);
    }

    public function get_newsFeed() 
    {
        $id = auth()->user()->id;

        $check_friends1 = Friends::where(['sender_id'=>$id , 'status'=>1])->pluck('receiver_id')->toArray();

        $check_friends2 = Friends::where(['receiver_id'=>$id , 'status'=>1])->pluck('sender_id')->toArray();

        $friends = array_merge($check_friends1 , $check_friends2);



        //$friends = Friends::where(['sender_id'=>$id , 'status'=>1])->orWhere('receiver_id' ,$id)->pluck('receiver_id')->toArray();

       // dd($friends);

        // if($friends->sender_id == $auth){

        //     $sender_friends = Friends::where(['sender_id'=>$id , 'status'=>1])->pluck('receiver_id')->toArray();
        // }
        // if($friends->receiver_id == $auth){

        //        $receiver_friends = Friends::where(['sender_id'=>$id , 'status'=>1])->pluck('receiver_id')->toArray();
        // }
        //     $friends

        //$friends = Friends::where(['sender_id'=>$id, 'status'=>1])->pluck('receiver_id')->toArray();

        $posts = Post::whereIn('user_id' , $friends)->orderBy('created_at' , 'desc')->get();

        //$push_id = array_push($friends, "7");
       //
        $pluck_post = Post::whereIn('user_id' , $friends)->pluck('id')->toArray();

        $auth = array(auth()->user()->id);


         $arr_merge = array_merge($friends , $auth);

        $post_action = PostActions::whereIn('action_perform_user_id' ,$arr_merge )->get();
      //  dd($post_action);
        // Post::with('post_action')->whereIn('model_id' , $pluck_post)->get()->toArray();
        //with('post_action')->

        /*$comments = PostActions::where;

        dd($comments);*/
        //dd($post_action);
        $userName = auth()->user()->f_name;

        $userImg = auth()->user()->user_images->last();

        return response()->json(['posts'=> $posts , 'post_action'=>$post_action , 'userName'=>$userName , 'userImg'=>$userImg]);
       
    }
    public function get_user_newsfeed_similar_data()
    {
        $auth_id = auth()->user()->id;
        $userImg = auth()->user()->user_images->last();
        $userName = auth()->user()->f_name;
        $followers = Friends::where('sender_id' , $auth_id)->orWhere('receiver_id' , $auth_id)->
            where('status' , 1)->count();

        return response()->json(['userName' => $userName , 'userImg' => $userImg , 'followers' => $followers]);

    }
    public function add_comments(Request $request)
    {
        $id = auth()->user()->id;

        $comment = $request->comment;
            $add_comment = PostActions::create([
                'action_perform_user_id' => $id ,
                'model_name' => 'App/PostActions',
                'model_id' => $request->post_id,
                'details' => $comment,
                'action' => 3
            ]);
            $user = User::find($id);
        $get_comment = PostActions::where(['action_perform_user_id' => $id , 'model_id' => $request->post_id])->OrderBy('created_at' , 'desc')->first();

        event(new CommentEvent($get_comment , $user));

         return response()->json($get_comment);
    }
    public function get_newsfeed_comments(Request $request)
    {
        dd($request->all());
    }
    public function liked(Request $request)
    {
        $id = auth()->user()->id;
        $post_id = $request->post_id;

        $liked = PostActions::where(['action_perform_user_id' => $id  , 'model_id' => $post_id ,  'action' => 1])->first();

        if ($liked)
        {
            $deleted = PostActions::where(['action_perform_user_id' => $id  , 'model_id' => $post_id ,  'action' => 1])->delete();
            //$liked = PostActions::where(['action_perform_user_id' => $id  , 'model_id' => $post_id ,  'action' => 1])->first();

        }
        else
        {
           $add = PostActions::create([
                'action_perform_user_id' => $id ,
                'model_id' => $post_id ,
                'model_name' => 'App/PostActions',
                'action' => 1 ,
                'details' => 1

            ]);

            return 'add';
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
