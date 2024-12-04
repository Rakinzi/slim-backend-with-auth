<?php

namespace App\Controllers;

use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{
    protected $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function show(Request $request, Response $response): Response
    {
        $user = $_SESSION['user'];


        return $this->view->render($response, 'user/profile.twig', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request, Response $response) 
    {

    }
}
