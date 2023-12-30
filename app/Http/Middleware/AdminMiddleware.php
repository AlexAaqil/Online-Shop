<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check())) {
            if(Auth::user()->is_admin == 1 && Auth::user()->status == 1) {
                return $next($request);
            }
            else {
                Auth::logout();
                return redirect('admin')->with('warning', "Your account is inactive. Contact the Admin!");
            }
        }
        else {
            Auth::logout();
            return redirect('login');
        }
    }
}
