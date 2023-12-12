<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;

class GenPdf
{
    public function __construct()
    {
    }
    public function genPdf($mensaje)
    {
        $html = '
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Pedazo de PDF</title>
    </head>
    <body>
    
    <h2>'.$mensaje.'</h2>
    </body>
    </html>';
        $mipdf = new Dompdf();
        # Definimos el tamaño y orientación del papel que queremos.
        # O por defecto cogerá el que está en el fichero de configuración.
        $mipdf->setpaper("A4", "portrait");
        # Cargamos el contenido HTML.
        $mipdf->loadhtml($html);

        # Renderizamos el documento PDF.
        $mipdf->render();

        # Creamos un fichero
        $pdf = $mipdf->output();
        $filename = "HeavenTicket.pdf";
        file_put_contents($filename, $pdf);

        # Enviamos el fichero PDF al navegador.
        // $mipdf->stream($filename, ['Attachment' => false]);
        return $pdf;
    }
}

?>