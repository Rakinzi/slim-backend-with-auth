<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Models\User;

class AuthController
{
    private $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function login(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'auth/login.twig');
    }

    public function register(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'auth/register.twig');
    }


    public function postLogin(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        $user = User::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user'] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ];

            unset($_SESSION['error']);
            return $response->withHeader('Location', '/dashboard')
                ->withStatus(302);
        }

        $_SESSION['error'] = 'Invalid email or password';
        return $response->withHeader('Location', '/login')
            ->withStatus(302);
    }

    public function postRegister(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        // Validate input
        if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            $_SESSION['error'] = 'All fields are required';
            return $response->withHeader('Location', '/register')->withStatus(302);
        }

        // Check if email already exists
        $existingUser = User::where('email', $data['email'])->first();
        if ($existingUser) {
            $_SESSION['error'] = 'Email already registered';
            return $response->withHeader('Location', '/register')->withStatus(302);
        }

        // Create new user
        try {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT)
            ]);

            $_SESSION['success'] = 'Registration successful! Please login.';
            return $response->withHeader('Location', '/login')->withStatus(302);
        } catch (\Exception $e) {
            $_SESSION['error'] = 'Registration failed. Please try again.';
            return $response->withHeader('Location', '/register')->withStatus(302);
        }
    }

    public function logout(Request $request, Response $response): Response
    {
        // Add your logout logic here
        session_destroy();

        return $response->withHeader('Location', '/')
            ->withStatus(302);
    }
}
