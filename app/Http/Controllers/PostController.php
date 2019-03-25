<?php

namespace App\Http\Controllers;

use App\UserImage;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\PostActions;

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

 
      //  $posts = User::find(1);
        //$abc = $posts->user_images;

            // dd($posts);
       // return response()->json($posts);
 
          $image = UserImage::where('user_id' , $id)->orderBy('created_at', 'desc')->first();
//        $posts = User::find(1);
//        //$abc = $posts->user_images;
//
//            dd($posts);
        return response()->json(['posts'=>$posts , 'userImg'=>$image]);
 

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
            $result = PostActions::where(['action'=>3, 'action_perform_user_id'=>$user_id])->get();

            //where(['name'=>'ali' , 'id'=>1])->where('date','12-3-4');

        }
        else if (!$addComment)
        {
            $result = "comment is not posted";
        }
        else
        {
            $result = PostActions::where(['action'=>3, 'action_perform_user_id'=>$user_id])->get();
        }

        return response()->json(['result'=>$result , 'userImg' => $userImg , 'userName'=>$userName]);
    }

    public function all_comments()
    {
        $user_id = auth()->user()->id;

        $userName = auth()->user()->f_name;

        $userImg = auth()->user()->user_images->last();

        $result = PostActions::where(['action'=>3, 'action_perform_user_id'=>$user_id])->get();

        return response()->json(['comments' => $result , 'userImg'=> $userImg , 'userName' => $userName]);


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
