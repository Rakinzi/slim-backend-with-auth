<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SqlInjectionController
{
    protected $view;
    protected $client;
    public $homeDetails = array();
    public $collectedData = [];
    protected $user;

    public function __construct(Twig $view, Client $client)
    {
        $this->view = $view;
        $this->client = $client;

        $array = ['http://127.0.0.1:5000/get-payloads', 'http://127.0.0.1:5000/get-insert-activity', 'http://127.0.0.1:5000'];


        $requests = array_map(function ($url) {
            return new Psr7Request('GET', $url);
        }, $array);
        $pool =  Pool::batch($this->client, $requests, [
            'concurrency' => 5,
            'fulfilled' => function ($response, $index) {
                $this->collectedData[] = $response->getBody();
            },
            'rejected' => function ($reason, $index) {
                echo "Request {$index} failed: {$reason}";
            }
        ]);

        $newData = array_map(function ($data) {
            return  json_decode($data, true);
        }, $this->collectedData);

        $payloads = array();
        $description = '';
        $project_name = '';
        $activities = array();
        $blocked_users = array();
        foreach ($newData as $key => $value) {
            if (array_key_exists('payloads', $value)) {
                $payloads[] = $value['payloads'];
            }
            if (array_key_exists('description', $value)) {
                $description = $value['description'];
            }
            if (array_key_exists('project_name', $value)) {
                $project_name = $value['project_name'];
            }
            if (array_key_exists('activities', $value)) {
                $activities[] = $value['activities'];
            }
            if (array_key_exists('blocked_users', $value)) {
                $blocked_users[] = $value['blocked_users'];
            }
        }

        $this->user = $_SESSION['user'];
        $this->homeDetails[] = [
            'payloads' => $payloads,
            'activities' => $activities,
            'project_name' => $project_name,
            'blocked_users' => $blocked_users,
            'description' => $description
        ];
    }

    public function show(Request $request, Response $response): Response
    {
        
        return $this->view->render($response, 'projects/sqlinjection/dashboard.twig', [
            'user' => $this->user,
            'homeDetails' => $this->homeDetails[0]
        ]);
    }

    public function activities(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'projects/sqlinjection/activities.twig', [
            'user' => $this->user,
            'homeDetails' => $this->homeDetails[0]
        ]);
    }

    public function payloads(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'projects/sqlinjection/payloads.twig', [
            'user' => $this->user,
            'homeDetails' => $this->homeDetails[0]
        ]);
    }

    public function updateProfile(Request $request, Response $response) {}
}
