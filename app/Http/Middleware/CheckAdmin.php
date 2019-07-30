<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class CheckUserIfAdmin
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

        if (Session::has('admin_logged_in') === false):
            return redirect()->route('admin-login');
        endif;


        return $next($request);
    }
}
