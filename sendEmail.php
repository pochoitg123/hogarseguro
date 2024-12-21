<?php
// Importar las clases de PHPMailer
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Función para enviar un correo cuando ocurre una acción en cualquier sensor
function sendEmail($sensorType, $action) {
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'joeyignaciovilches@gmail.com'; // Cambia por tu correo
        $mail->Password = 'iebf cgrm tykl wjhq'; // Contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('joeyignaciovilches@gmail.com', 'Secure Sense');
        $mail->addAddress('ignaciocoquimbo83@gmail.com'); // Cambia por el correo del destinatario
        $mail->isHTML(true);
        $mail->Subject = "Notificación de Sensor: $sensorType";
        $mail->Body = "El sensor de <b>$sensorType</b> ha realizado la acción: <b>$action</b>.";

        // Enviar el correo
        $mail->send();
        echo json_encode(["status" => "success", "message" => "Acción registrada y correo enviado."]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Error al enviar correo: {$mail->ErrorInfo}"]);
    }
}

// Manejo de la solicitud POST desde el frontend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sensorType = $_POST['sensor_type'] ?? null; // Sensor (Movimiento, Humo, Sonido)
    $action = $_POST['value'] ?? null; // Acción (Encendido, Apagado, Detectado)

    if ($sensorType && $action) {
        // Llamada a la función para enviar el correo
        sendEmail($sensorType, $action);
    } else {
        echo json_encode(["status" => "error", "message" => "Datos incompletos para el sensor."]);
    }
}
?>


<?php
// Ruta al archivo de datos del sensor (por ejemplo, un archivo JSON)
$sensorFile = 'sensors_state.json';

// Función para leer los datos del sensor desde el archivo
function readSensorData() {
    global $sensorFile;

    if (file_exists($sensorFile)) {
        $data = file_get_contents($sensorFile); // Leer el contenido del archivo
        return json_decode($data, true); // Decodificar el JSON a un array
    } else {
        return []; // Si el archivo no existe, devolver un array vacío
    }
}

// Enviar los datos del sensor al frontend
$data = readSensorData();
echo json_encode($data); // Devolver los datos en formato JSON
?>

