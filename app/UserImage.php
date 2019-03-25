<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    //
    protected $fillable = ['user_id' , 'image' , 'like' ,'dislike'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function profile()
    {
        return $this->belongsTo('App\Profile'  , 'user_id');
    }

}
