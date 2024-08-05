<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class BeforeMiddleware
{
    //public static $count = 0;
    public function handle(Request $request, Closure $next): Response
    {
        // Perform action
        //self::$count = self::$count + 1;
        $current_time = Carbon::now();
        Log::info("Input Request: " . $current_time);
        return $next($request);
    }
}
