<?php

namespace App\Controllers;

use App\Utils\PdfGenerator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PdfController
{
    private $view;
    private $pdfGenerator;

    public function __construct($view, PdfGenerator $pdfGenerator)
    {
        $this->view = $view;
        $this->pdfGenerator = $pdfGenerator;
    }

    public function generatePdf(Request $request, Response $response, array $args): Response
    {
        // Render Twig template
        $html = $this->view->fetch('pdf/template.twig', [
            'title' => 'Sample PDF',
            'content' => 'This is a PDF generated using DomPDF and Twig.'
        ]);

        // Generate the PDF
        $pdfContent = $this->pdfGenerator->generate($html);

        // Stream the PDF to the browser
        $response->getBody()->write($pdfContent);
        return $response->withHeader('Content-Type', 'application/pdf');
    }
}
