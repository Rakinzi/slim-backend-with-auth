<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;

use function PHPUnit\Framework\directoryExists;

class LoggingMiddleware
{

    protected $filename;
    protected $directory;
    public function __construct(string $filename = '', string $directory = '') {
        if (empty($filename))
            $filename = date('d-M-Y-H:i:s')."-error-message.txt";
        if (empty($directory))
            $directory = dirname(__DIR__, 2)."/logs/";
        $this->filename = $filename;
        $this->directory = $directory;
    }
    public function logInfo(string $errorMessage)
    {
        if(is_dir($this->directory)){
            $filepath = $this->directory.$this->filename;
            // $file = fopen($filepath, 'w');
            // fwrite($file, $errorMessage);
            // fclose($file);
            file_put_contents($filepath, $errorMessage);
            return $errorMessage;
        }

        return null;
    }
}

$logger = new LoggingMiddleware();
print_r($logger->logInfo('oops'));