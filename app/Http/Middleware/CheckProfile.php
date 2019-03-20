<?php

namespace App\Http\Middleware;

use Closure;
use App\Profile;
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

        /*$user = auth()->user();
        dd($user);
        $profile = $user->profile->first();

        if(is_null($profile)){

            // redirect
        }*/

        return $next($request);
    }
}
