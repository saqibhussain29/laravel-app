<?php

namespace App\Http\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = auth()->user();
        
        if ($user && count(array_intersect($roles, [$user->roll])) > 0) {
            return $next($request);
        } else {
            throw new HttpException(403, 'Access denied.'); // Throw a 403 exception
        }
    }
}
