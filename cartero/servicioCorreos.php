<?php
use PHPMailer\PHPMailer\PHPMailer;

require "vendor/autoload.php";

class ServicioCorreos
{
    public static function enviarCorreo($correo, $asunto, $mensaje)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        // introducir usuario de google
        $mail->Username = "pherrui680@g.educaand.es";
        // introducir clave
        $mail->Password = "naji ecbh impa axzi";
        $mail->SetFrom('pherrui680@g.educaand.es', 'Test');
        // asunto
        $mail->Subject = $asunto;
        // cuerpo
        $html_message = $mensaje;
        $mail->MsgHTML($html_message);
        $filename = "HeavenTicket.pdf";
        file_put_contents($filename, $mensaje);
        $mail->addAttachment($filename);
        // destinatario
        $address = $correo;
        $mail->AddAddress($address, "Test");
        // enviar
        $resul = $mail->Send();
        if (!$resul) {
            return "Error al enviar: " . $mail->ErrorInfo;
        } else {
            return "Enviado";
        }
    }
}
?>