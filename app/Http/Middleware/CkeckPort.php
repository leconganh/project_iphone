<?php

namespace App\Http\Middleware;

use Closure;


class CkeckPort
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
        dd($request->input('quantity'));

        if ($request->input('quantity') <= 0) {

            return redirect()->route('product.create');
        }

        return $next($request);

    }
}
