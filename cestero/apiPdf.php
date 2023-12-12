<?php
require_once "genPdf.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $mensaje = $_GET['mensaje'];

    $genPdf = new GenPdf();
    $respuesta = $genPdf->genPdf($mensaje);

    echo $respuesta;
}
?>