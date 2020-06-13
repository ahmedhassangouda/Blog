<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\User;

use Closure;

class UserAuth
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
        
        $id = $request->user->id;

        if(Auth::id() == $id)
        {
            return $next($request);
        }else
        {
            return redirect(Route('profile.edit', Auth::user()->profile->id)); //redirect anyware.
        }
    }
}
