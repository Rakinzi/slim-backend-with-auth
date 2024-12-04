<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;

class LoggingMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        // Log the request method and URI
        $method = $request->getMethod();
        $uri = $request->getUri();
        error_log("Request: {$method} {$uri}");

        // Pass the request to the next middleware/handler
        $response = $handler->handle($request);

        // Optionally modify the response
        return $response;
    }
}
