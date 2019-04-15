<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostActions extends Model
{

    protected $fillable = ['action_perform_user_id' , 'model_name' , 'model_id' , 'details' , 'action'];

    public function post()
    {
        return $this->belongsTo('App\Post' ,'model_id' , 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
