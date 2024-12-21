
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php'; // Asegúrate de que el autoloader esté configurado

function enviarCorreoDePrueba($destinatario) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia según el proveedor
        $mail->SMTPAuth = true;
        $mail->Username = 'joeyignaciovilches@gmail.com'; // Tu correo electrónico
        $mail->Password = 'iebf cgrm tykl wjhq';     // Contraseña o clave de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('joeyignaciovilches@gmail.com', 'Prueba HogarSeguro');
        $mail->addAddress($destinatario);

        $mail->isHTML(true);
        $mail->Subject = 'Alerta Generada';
        $mail->Body = '<h1>¡Hola!</h1><p>Este es un correo de prueba enviado desde HogarSeguro.</p>';

        $mail->send();
        echo "Correo enviado correctamente a $destinatario.";
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}

// Llamada a la función
enviarCorreoDePrueba('ignaciocoquimbo83@gmail.com');
?>
