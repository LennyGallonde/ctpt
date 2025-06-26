<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Recupere l'utilisateur
        $utilisateur=auth()->user();

        if($utilisateur && $utilisateur->estAdmin==true){
            return $next($request);
        }
        else{
            abort(403);
        }
    }
}
