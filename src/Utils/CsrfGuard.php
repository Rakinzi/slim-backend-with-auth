<?php

namespace App\Utils;

use Psr\Http\Message\ResponseFactoryInterface as Response;
use Slim\Csrf\Guard;

class CsrfGuard {
    public function __invoke(Response $response ) : Guard
    {
        return new Guard($response);
    }
}