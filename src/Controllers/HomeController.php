<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class HomeController
{
    private $view;
    private $baseUrl ;
    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function index(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'home.twig', [
            'name' => 'World'
        ]);
    }

    public function dashboard(Request $request, Response $response): Response
    {
        $this->baseUrl = 'secure';
        return $this->view->render($response, 'dashboard.twig', [
            'user' => $_SESSION['user'] ?? null,
            'baseUrl' => $this->baseUrl
        ]);
    }
}