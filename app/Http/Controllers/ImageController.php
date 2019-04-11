<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserImage;
use App\Profile;
use App\User;
use App\Friends;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($request->all());
       
                
        if ($request->hasFile('file')) {
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extention = $request->file('file')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extention;

            $path = $request->file('file')->move('storage/uploads', $filenameToStore);

             $uploadImage = UserImage::create([
                'user_id' =>  auth()->user()->id, 
                'image' => $filenameToStore,
                'like' => 0,
                'dislike' => 0
            ]);

        } else {
            $filenameToStore = 'no_image.jpg';
        } 

       // dd($filenameToStore);
   
          return response()->json($filenameToStore);



    }

    public function get_Image()
    {
        $id =  auth()->user()->id;   

        $profile = auth()->user()->profile;

        $user = User::where('id' , $id)->first();

         $getImage = UserImage::where(['user_id'=>$id ])->orderBy('created_at', 'desc')->first();

         $followers = Friends::where('sender_id' , $id)->orWhere('receiver_id' , $id)->count();


            return response()->json(['get_image' => $getImage , 'get_profile' => $profile , 'user' => $user ,
                'followers' => $followers]);
    }

    public function get_all_images() 
    {
        $id =  auth()->user()->id;   

         $get_all_images = UserImage::where(['user_id'=>$id ])->get();

        return response()->json($get_all_images);
    }
    public function get_auth()
    {
        $auth = auth()->user();
        return response()->json($auth);
    }

    public function get_friend_Image($id)
    {
        $getImage = UserImage::where(['user_id'=>$id ])->orderBy('created_at', 'desc')->first();

        return response()->json($getImage);
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
