<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActivity
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
        $user = $request->user();
        if (($user!=null) && ($user->active == 0)){
            $user->code = null;
            $user->save();

            Auth::logout();
            return redirect('/login');
        }
        return $next($request);
    }
}
