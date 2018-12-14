<?php

namespace estoque\Http\Middleware;

use Closure;

class AutorizacaoMiddleware
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
        //verifica que a request acessada não é a de auth/login( evita looping em excesso)
        if(!$request->is('auth/login') && \Auth::guest()){ 
           return redirect ('/auth/login');
        }
        return $next($request);
    }
}
