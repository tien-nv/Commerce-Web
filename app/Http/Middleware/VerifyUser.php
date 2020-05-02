<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUser
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
        if(isset($_SESSION['isUser']) && $_SESSION['isUser'] == 1){
            return $next($request);
        }
        abort(403, 'You do not access to this request.');
    }
}
