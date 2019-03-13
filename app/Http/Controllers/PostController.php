<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

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
        //$posts = Post::where('user_id' , $id)->orderBy('created_at', 'desc')->get();

        $posts = User::find(1);
        //$abc = $posts->user_images;

             dd($posts);
        return response()->json($posts);

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
