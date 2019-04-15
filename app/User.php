<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hootlex\Friendships\Traits\Friendable;

class User extends Authenticatable 
{
    use Notifiable;
    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name', 'l_name', 'email','password', 'date', 'month','year', 'gender', 'city','country'
    ]; 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function user_images()
    {
        return $this->hasMany('App\UserImage');
    }

    public function user_image()
    {
        return $this->hasOne('App\UserImage')->orderBy('created_at','DESC');
    }

    public function friends()
    {
        return $this->hasMany('App\Friends'  , 'sender_id');
    }
    public function chat()
    {
        return $this->hasMany('App\Chat'  , 'sender_id');
    }

    public function post_action()
    {
        return $this->hasMany('App\PostActions'  , 'action_perform_user_id');
    }

}
