<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{

    public function handle(Request $request, Closure $next, string $role): Response
    {
        // dd('middleware is working'); #Checking if middleware is working.
        if (Auth::check()) {

            if ('admin' == $role) {
                return $next($request);
            }
            abort(403);
            #403 forbidden / not authorized
        }
        abort(401);
        #401 is for unauthorized / not logged in
    }
}
