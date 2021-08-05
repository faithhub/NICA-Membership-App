<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        if(Auth::user()->member_expire > Carbon::now()){
            $user = User::find(Auth::user()->id);
            $user->member = 'None';
            $user->save();
        }
        if (Auth::user()->acc_status == 'Notupdated') {
            Session::flash('warning', 'Your Membership Profile must be updated before you can be granted access to this page');
            return redirect()->route('profile');
        } else {
            return $next($request);
        }
    }
}
