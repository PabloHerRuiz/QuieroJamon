<?php
// Conexión a la base de datos
$servername = "datos";
$username = "root";
$password = "1234";
$dbname = "ServicioCorreo";

require_once "servicioCorreos.php";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Consulta SQL para obtener correos de la tabla emails
    $stmt = $conn->query("SELECT para, asunto, mensaje FROM emails WHERE enviado = 0");


    // Iterar sobre los resultados y enviar correos
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $para = $row['para'];
        $asunto = $row['asunto'];
        $mensaje = $row['mensaje'];
        
        $pdf = file_get_contents('http://pdf/apiPdf.php?mensaje=' . urlencode($mensaje));
        // Enviar el correo utilizando la clase ServicioCorreos
        $resultado = ServicioCorreos::enviarCorreo($para, $asunto, $pdf);


        // Imprimir el resultado
        echo json_encode($resultado);
    }
} catch(PDOException $e) {
    echo "Error de ejecucion: " . $e->getMessage();
}

?>