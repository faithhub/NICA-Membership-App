<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Updated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->acc_status == 'Notupdated') {
            Session::flash('warning', 'Your Membership Profile must be updated before you can be granted access to this page');
            return redirect()->route('profile');
        } else {
            return $next($request);
        }
    }
}
