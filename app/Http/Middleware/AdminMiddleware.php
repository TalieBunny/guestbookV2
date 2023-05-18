<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Admin role = 1, user = 0

        if(Auth::check()) {

            if(Auth::user()->role == '1') {
                return $next($request);
            }else{ 
                return redirect('/home')->with('message', 'Access Denied - Not Admin!');
            }
        }else{
           return redirect('/login')->with('message', 'Login to access the guestbook.');
        }

        return $next($request);
    }
}
