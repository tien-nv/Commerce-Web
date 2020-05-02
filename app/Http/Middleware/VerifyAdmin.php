<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAdmin
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
        session_start();
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === 'valid') {
            return $next($request);
        }
        abort(403, 'You do not access to this quest.');
    }
}
