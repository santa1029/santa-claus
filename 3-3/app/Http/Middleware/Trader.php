<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Trader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()) return route('login');
        
        if (auth()->user()->trader) return $next($request);

        Session::flash('message', 'You are not authorized to access this function!');
        Session::flash('alert-class', 'alert-danger');
        return response()->json([
            'isSuccess' => false,
            'Message' => "You are not authorized to access this function!"
        ], 200); // Status code here

    }
}
