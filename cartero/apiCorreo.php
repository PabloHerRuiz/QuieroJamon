<?php
// Conexión a la base de datos
$servername = "datos";
$username = "root";
$password = "1234";
$dbname = "cestaNavidad";

require_once "servicioCorreos.php";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nombre = strtolower($_GET['nombre']);

    $stmt = $conn->query("SELECT correo,tipo_Cesta FROM empleados WHERE nombre='$nombre'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $para = $row['correo'];
    $cesta = $row['tipo_Cesta'];

    if ($cesta == "Jamon") {
        $tiene = true;
    } else {
        $tiene = false;
    }

    $pdf = file_get_contents('http://cestero/apiPdf.php?tiene=' . $tiene);
    // Enviar el correo utilizando la clase ServicioCorreos
    $resultado = ServicioCorreos::enviarCorreo($para, $pdf);


    // Imprimir el resultado
    echo json_encode($resultado);
} catch (PDOException $e) {
    echo "Error de ejecucion: " . $e->getMessage();
}

?>