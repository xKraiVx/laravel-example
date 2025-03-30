<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle(Request $request, Closure $next): Response
    {
        // if (!$request->has('age')) {
        //     return response('Age parameter is missing.', 400);
        // }

        // if (!is_numeric($request->age)) {
        //     return response('Age parameter must be a number.', 400);
        // }

        if ($request->age < 18) {
            return redirect('about');
        }

        return $next($request);
    }
}