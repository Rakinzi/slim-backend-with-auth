<?php

namespace App\Utils;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Utils\FlashMessage;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;

class FileUploaderFactory
{



    public static function upload(Request $request, Response $response)
    {
        $adapter = new LocalFilesystemAdapter(__DIR__ . '/../public./assets/uploads');
        $filesystem = new Filesystem($adapter);
        $uploaded_files = $request->getUploadedFiles();

        if (!isset($uploaded_files) || empty($uploaded_files || count($uploaded_files) == 0)) {
            return null;
        }

        foreach ($uploaded_files as $key => $value) {
            $file = $uploaded_files[$key];

            if ($file->getError() !== UPLOAD_ERR_OK) {
                FlashMessage::set('error', 'File upload failed');
                return null;
            }

            $stream = $file->getStream();
            $filesystem->write('uploads/'.$file->getClientFilename(), $stream->getContents());
            return null;
        }
    }
}
