<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Access-Control-Max-Age', 86400);
        $response->headers->set('Access-Control-Allow-Origin', $this->allowedOrigins());
        $response->headers->set('Access-Control-Allow-Methods', $this->allowedMethods());
        $response->headers->set('Access-Control-Allow-Headers', $this->allowedHeaders());

        return $response;
    }

    protected function allowedOrigins(): string
    {
        return env('CORS_ALLOW_ORIGINS', '*');
    }

    protected function allowedMethods(): string
    {
        return env('CORS_ALLOW_METHODS', 'OPTIONS, GET, POST, PATCH, PUT, DELETE');
    }

    protected function allowedHeaders(): string
    {
        return env(
            'CORS_ALLOW_HEADERS',
            'Cache-Control, Content-Type, Origin, Authorization, X-Requested-With'
        );
    }
}
