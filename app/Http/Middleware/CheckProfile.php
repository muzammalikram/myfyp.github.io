<?php

namespace App\Http\Middleware;

use Closure;
use App\Profile;
use Auth;
class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//        $user = Auth::user();
//        $profile = $user->profile->first();
//
//        if(is_null($profile)){
//
//             return redirect('/home/profile');
//        }
//        else{
//            return redirect('/home/newsfeed');
//        }

         return $next($request);
    }
}
