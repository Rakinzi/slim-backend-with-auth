<?php

namespace App\Middleware;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use Slim\Views\Twig;
use Twig\Loader\FilesystemLoader;

class SqlInjectionMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $client = new Client();
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');

        $view = new Twig($loader, [
            'cache' => false,
            'debug' => true,
            'auto_reload' => true
        ]);

        try {
            $responseData = $client->get('http://127.0.0.1:5000/check-user');
            $responseData = json_decode($responseData->getBody(), true);
            $blocked = $responseData['blocked'];

            if ($blocked) {
                $response = new Response();
                return $view->render($response, 'layouts/404.twig');
            }
        } catch (ConnectException $e) {
            return $handler->handle($request);
        }
        return $handler->handle($request);
    }
}
