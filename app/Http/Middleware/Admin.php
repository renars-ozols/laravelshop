<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (!Auth::user()->admin)
        {
            toastr()->error('You do not have permissions to perform this action!', null, ['timeOut' => 4000]);

            return redirect()->back();
        }

        return $next($request);
    }
}
