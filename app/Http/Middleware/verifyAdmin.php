<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class verifyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = $request->user()->role;

        if ($user != 'admin') {
            abort(403, 'THIS PAGE IS FORBIDDEN');
        }

        return $next($request);
    }
}
