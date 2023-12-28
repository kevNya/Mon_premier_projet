<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role):Response
    {
        if($request->user()->userrole()->where('name',$role)->exists()) return $next($request);
        abort(403, "VOUS N'AVEZ PAS D'ACCES.");
        //return redirect()->route('page_createpatient');
    }
}
