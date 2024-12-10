<?php

namespace App\Controllers;

use App\Middleware\LoggingMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use GuzzleHttp\Exception\ConnectException;
use Slim\Views\Twig;
use App\Models\User;
use App\Utils\FlashMessage;
use GuzzleHttp\Client;
use Respect\Validation\Validator as v;


class AuthController
{
    private $view;
    private $client;

    public function __construct(Twig $view, Client $client)
    {
        $this->view = $view;
        $this->client = $client;
    }

    public function login(Request $request, Response $response): Response
    {
        $login = [
            'inputs' => [
                [
                    'name' => 'email',
                    'type' => 'text',
                    'label' => 'Email:',
                    'placeholder' => 'Email'
                ],
                [
                    'name' => 'password',
                    'type' => 'password',
                    'label' => 'Password:',
                    'placeholder' => 'Password'
                ],
            ],
            'loginButton' => [
                'text' => 'Login',
                'attributes' => [
                    'type' => 'submit',
                    'class' => 'btn btn-dark'
                ]
            ],
            'registerButton' => [
                'text' => 'Register',
                'attributes' => [
                    'href' => '/register',
                    'class' => 'btn btn-light',
                ]
            ]

        ];

        $error = FlashMessage::get('error');
        return $this->view->render($response, 'auth/login.twig', [
            'error' => [
                'message' => $error,
                'attr' => [
                    'class' => 'text text-danger fs-12'
                ]
            ],
            'loginData' => $login
        ]);
    }

    public function register(Request $request, Response $response): Response
    {
        $register = [
            'inputs' => [
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => 'Username:',
                    'placeholder' => 'Username'
                ],
                [
                    'name' => 'email',
                    'type' => 'email',
                    'label' => 'Email:',
                    'placeholder' => 'example@email.com'
                ],
                [
                    'name' => 'password',
                    'type' => 'password',
                    'label' => 'Password:',
                    'placeholder' => 'Password'
                ],
                [
                    'name' => 'confirmpassword',
                    'type' => 'password',
                    'label' => 'Confirm Password:',
                    'placeholder' => 'Confirm Password'
                ],
            ],
            'registerButton' => [
                'text' => 'Register',
                'attributes' => [
                    'type' => 'submit',
                    'class' => 'btn btn-dark'
                ]
            ],
            'loginButton' => [
                'text' => 'Login',
                'attributes' => [
                    'href' => '/login',
                    'class' => 'btn btn-light',
                ]
            ]
        ];
        $error = FlashMessage::get('error');
        return $this->view->render($response, 'auth/register.twig', [
            'error' => [
                'message' => $error,
                'attr' => [
                    'class' => 'text text-danger fs-12'
                ]
            ],
            'registerData' => $register
        ]);
    }


    public function postLogin(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        try {
            $response = $this->client->post('http://127.0.0.1:5000/check-sqli', [
                'form_params' => $data
            ]);
            $responseData =  json_decode($response->getBody(), true);
            $sqlInjection = $responseData['sql_injection_detected'];
            if ($sqlInjection) {
                FlashMessage::set('error', 'Invalid User Credentials');
                return $response
                    ->withHeader('Location', '/login')
                    ->withStatus(302);
            }
        } catch (ConnectException $th) {
            LoggingMiddleware::class;
        }

        $email_validator = v::email();
        if (empty(filter_var($email, FILTER_VALIDATE_EMAIL)) || !$email_validator->validate($email)) {
            FlashMessage::set('error', 'Please enter a valid email address');
            return $response
                ->withHeader('Location', '/login')
                ->withStatus(302);
        }
        $user = User::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user'] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at
            ];

            unset($_SESSION['error']);
            return $response->withHeader('Location', '/secure/')
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

        if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            FlashMessage::set('error', 'All fields are required');
            return $response->withHeader('Location', '/register')->withStatus(302);
        }

        $existingUser = User::where('email', $data['email'])->first();
        if ($existingUser) {
            FlashMessage::set('error', 'Email already registered');
            return $response->withHeader('Location', '/register')->withStatus(302);
        }

        if ($data['password'] !== $data['confirmpassword']) {
            FlashMessage::set('error', "Passwords do not match");
            return $response->withHeader('Location', '/register')->withStatus(302);
        }
        $email = $data['email'];
        $email_validator = v::email();
        if (empty(filter_var($email, FILTER_VALIDATE_EMAIL)) || !$email_validator->validate($email)) {
            FlashMessage::set('error', 'Please enter a valid email address');
            return $response
                ->withHeader('Location', '/login')
                ->withStatus(302);
        }

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
