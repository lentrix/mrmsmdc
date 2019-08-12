<?php

namespace App\Http\Middleware;

use Closure;

class JudgeMiddelware
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
        if (auth()->user()->role == "judge")
            return $next($request);

        return redirect()->home()->with('Error', 'Sorry! You are not allowed to perform the recent action.');
    }
}
