<?php

namespace App\Http\Middleware;

use App\Models\Log as ModelsLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        $response = $next($request);


        Log::info('Request Details:', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            // 'request_type' => $request->isMethod('post') ? 'POST' : 'GET',
            'timestamp' => now()->toDateTimeString(),
        ]);

        // \App\Models\Log::create(["ip"=> $request->ip(), "url"=> $request->url(), "query_time"=> now()->toDateTimeString()]);
        ModelsLog::create(["ip_address"=> $request->ip(), "url"=> $request->url(), "query_time"=> now()->toDateTimeString()]);

        return $response;
    }
}
