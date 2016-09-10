<?php

namespace App\Http\Middleware;

use Closure;

class TypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type, $url)
    {
      if(! $request->user()->type== $type){
        return redirect($url);
      }

      return $next($request);
    }
}
