<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Models\User;
use App\Utils\FlashMessage;
use Psr\Http\Message\StreamInterface;

class AuthController
{
    private $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function login(Request $request, Response $response): Response
    {
        $error = FlashMessage::get('error');
        return $this->view->render($response, 'auth/login.twig', [
            'error' => $error
        ]);
    }

    public function register(Request $request, Response $response): Response
    {
        $error = $_SESSION['error'] ?? null;
        unset($_SESSION['error']);
        return $this->view->render($response, 'auth/register.twig', [
            'error' => $error
        ]);
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
                'email' => $user->email,
                'created_at' => $user->created_at
            ];

            unset($_SESSION['error']);
            return $response->withHeader('Location', '/dashboard')
                ->withStatus(302);
        }

        FlashMessage::set('error', 'Invalid User Credentials');
        return $response
            ->withHeader('Location', '/login')
            ->withStatus(302);
    }

    public function postRegister(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        // Validate input
        if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            FlashMessage::set('error', 'All fields are required');
            return $response->withHeader('Location', '/register')->withStatus(302);
        }

        // Check if email already exists
        $existingUser = User::where('email', $data['email'])->first();
        if ($existingUser) {
            FlashMessage::set('error', 'Email already registered');
            return $response->withHeader('Location', '/register')->withStatus(302);
        }

        if ($data['password'] !== $data['confirmpassword']) {
            FlashMessage::set('error', "Passwords do not match");
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
            FlashMessage::set('error', 'Registration failed. Please try again.');
            return $response->withHeader('Location', '/register')->withStatus(302);
        }
    }

    public function logout(Request $request, Response $response): Response
    {
        unset($_SESSION['user']);
        session_destroy();

        return $response->withHeader('Location', '/')
            ->withStatus(302);
    }
}
