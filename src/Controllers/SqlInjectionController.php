<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use function DI\string;

class SqlInjectionController
{
    protected $view;
    protected $client;
    public $homeDetails = array();
    public $collectedData = [];
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

        print_r($newData);
        // $insert_activities =  json_decode($this->collectedData[2], true);

        // $blocked_users = $insert_activities['blocked_users'];
        // $activity = $insert_activities['activities'];
        // $payloads =  json_decode($this->collectedData[1], true)['payloads'];

        $navbar = [
            ['href' => '',]
        ];
    }

    public function show(Request $request, Response $response): Response
    {
        $user = $_SESSION['user'];

        return $this->view->render($response, 'projects/sqlinjection.twig', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request, Response $response) {}
}
