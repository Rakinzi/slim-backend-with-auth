<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;

class LoggingMiddleware
{
    public function __invoke(string $errorMessage)
    {
        $filename = time();
    }
}
