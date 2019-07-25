<?php

namespace App\Http\Middleware;

use Closure;

class PhoneVerification
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
            return redirect('verify');
        }

        return $next($request);
    }
}
