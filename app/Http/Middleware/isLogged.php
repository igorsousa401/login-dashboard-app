<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()) {
            return $next($request);
        } else {
            switch(auth()->user()->type) {
                case "admin":
                    return redirect()->route('app.admin.index');
                    break;
                case "common":
                    return redirect()->route('app.common.index');
                    break;
            }
        }

    }
}
