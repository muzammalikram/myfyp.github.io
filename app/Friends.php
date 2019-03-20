<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    //
    
    protected $fillable = ['sender_id' , 'receiver_id' , 'status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
