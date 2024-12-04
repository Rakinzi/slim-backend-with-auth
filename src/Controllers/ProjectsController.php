<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Utils\ProjectLoader;

class ProjectsController
{
    protected $view;
    protected $client;

    public function __construct(Twig $view, Client $client)
    {
        $this->view = $view;
        $this->client = $client;
    }

    public function show(Request $request, Response $response): Response
    {
        $projects = [];
        $user = $_SESSION['user'];
        $sqlInjectionUrl = 'http://127.0.0.1:5000/';
        $sqlInjection = ProjectLoader::post($sqlInjectionUrl) ?? null;
        if ($sqlInjection) {
            array_push($projects, $sqlInjection);
        }
        return $this->view->render($response, 'projects/projects.twig', [
            'user' => $user,
            'projects' => $projects
        ]);
    }
}
