<?php

namespace App\Utils;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGenerator
{
    private $dompdf;

    public function __construct()
    {
        // Configure DomPDF options
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->setIsHtml5ParserEnabled(true);

        $this->dompdf = new Dompdf($options);
    }

    /**
     * Generate PDF from HTML
     *
     * @param string $html - The HTML content
     * @param string $paperSize - Paper size (e.g., 'A4')
     * @param string $orientation - Orientation (e.g., 'portrait' or 'landscape')
     * @return string - The rendered PDF as a string
     */
    public function generate(string $html, string $paperSize = 'A4', string $orientation = 'portrait'): string
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper($paperSize, $orientation);
        $this->dompdf->render();

        return $this->dompdf->output();
    }
}
