<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once "vendor/autoload.php";
$mail = new PHPMailer();
$mail->IsSMTP();
// cambiar a 0 para no ver mensajes de error
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
// introducir usuario de google
$mail->Username = "pherrui680@g.educaand.es";
// introducir clave
$mail->Password = "naji ecbh impa axzi";
$mail->SetFrom('pherrui680@g.educaand.es', 'Yo');
// asunto
$mail->Subject = "buenas tardes";
//Añadir imagen
// $mail->addEmbeddedImage('flechaIcon.png','imagenAdjunta','flechaIcon.png');
//nombre destinatario
$nombre = 'Pablo';


$html = file_get_contents('plantilla.html', true);

$nombre = ['Pablo'];
$busqueda = ['{{nombre}}'];
$plantilla;
//Replace
for ($i = 0; $i < count($busqueda); $i++) {
  $plantilla = str_replace(
    $busqueda,
    $nombre,
    $html
  );
}

// cuerpo
$mail->MsgHTML($plantilla);
// adjuntos
// $mail->addAttachment("adjunto.txt");
// destinatario
$address = "pherrui680@g.educaand.es";
$mail->AddAddress($address, "Yo");
// enviar
$resul = $mail->Send();
if (!$resul) {
  echo "Error" . $mail->ErrorInfo;
} else {
  echo "Enviado";
}