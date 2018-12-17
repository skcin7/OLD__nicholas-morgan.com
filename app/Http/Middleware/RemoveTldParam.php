<?php

namespace App\Http\Middleware;

use Closure;

class RemoveTldParam
{
    /**
     * @param $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->route()->forgetParameter('tld');

        return $next($request);
    }
}