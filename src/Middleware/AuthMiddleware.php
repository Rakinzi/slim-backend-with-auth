<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use Slim\Routing\RouteContext;

class AuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $isLoggedIn = $_SESSION['user'] ?? false;
        $response = new Response();
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $loginUrl = $routeParser->urlFor('login');
        if (!$isLoggedIn) {
            return $response
                ->withHeader('Location', $loginUrl)
                ->withStatus(302);
        }

        return $handler->handle($request);
    }
}