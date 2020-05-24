<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Support\facades\Auth;
use Auth;




class loginMiddlware
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
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->role == 1)
            {
                return $next($request);
//                return redirect('admin/home');
            }
            else if($user->role == 0)
                return $next($request);
            else
                return redirect('login');
        }
        else
            return redirect('login');
    }
}
