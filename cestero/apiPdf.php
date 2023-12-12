<?php
require_once "genPdf.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $tiene = $_GET['tiene'];

    $genPdf = new GenPdf();
    $respuesta = $genPdf->genPdf($tiene);

    echo $respuesta;
}
?>