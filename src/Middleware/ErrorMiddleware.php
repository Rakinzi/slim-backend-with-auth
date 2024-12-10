<?php

namespace App\Middleware;

use Error;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;


class ErrorMiddleware
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function __invoke(Request $request, Handler $handler)
    {
        $user = $_SESSION['user'] ?? null;
        try {
            $response = $handler->handle($request);
            return $response;
        } catch (HttpNotFoundException $e) {
            $response = new \Slim\Psr7\Response();
            
            $response->getBody()->write($this->view->fetch('errors/404.twig', [
                'user' => $user
            ]));
            return $response->withStatus(404);
        } catch (\Exception $e) {
            $response = new \Slim\Psr7\Response();
            $response->getBody()->write($this->view->fetch('errors/500.twig', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user' => $user
            ]));
            return $response->withStatus(500);
        } catch (Error $e) {
            $response = new \Slim\Psr7\Response();
            $response->getBody()->write($this->view->fetch('errors/500.twig', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user' => $user
            ]));
            return $response->withStatus(500);
        }
    }
}
