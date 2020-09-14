<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheckPerms
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
        if(!Auth::User()->admin) {
            $errorcode = 405;
            $message = "You do not have the permissions to perform this!";

            return redirect()->route('error', ['code' => $errorcode, 'message' => $message]);
        }
        return $next($request);
    }
}
