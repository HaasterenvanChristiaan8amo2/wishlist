<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
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
        if(!Auth::check()) {
            $errorcode = 403;
            $message = "You need to be logged in to be able to access this page!";

            return redirect()->route('error', ['code' => $errorcode, 'message' => $message]);
        }
        return $next($request);
    }
}
