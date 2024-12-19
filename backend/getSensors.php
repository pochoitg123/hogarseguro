<?php
// Importar las clases de PHPMailer
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ruta al archivo de datos del sensor
$sensorFile = 'sensors.php';

// Función para leer los datos del sensor
function readSensorData() {
    global $sensorFile;

    if (file_exists($sensorFile)) {
        $data = file_get_contents($sensorFile); // Leer contenido del archivo
        return json_decode($data, true); // Decodificar el JSON a un array
    } else {
        return []; // Si el archivo no existe, devolver un array vacío
    }
}

// Función para escribir datos simulados en el archivo
function writeSensorData($sensorType, $value) {
    global $sensorFile;

    // Leer los datos actuales del sensor
    $data = readSensorData();

    // Nueva lectura del sensor
    $newData = [
        'sensor_type' => $sensorType,
        'value' => $value,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    // Agregar los nuevos datos al archivo
    $data[] = $newData;

    // Escribir el nuevo JSON en el archivo
    file_put_contents($sensorFile, json_encode($data, JSON_PRETTY_PRINT));
}

// Manejar la solicitud del cliente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Leer los datos enviados desde el frontend
    $sensorType = $_POST['sensor_type'] ?? null; // Ejemplo: "Movimiento", "Humo", "Sonido"
    $value = $_POST['value'] ?? null; // Ejemplo: "Encendido", "Apagado"
    $accion = $_POST['accion'] ?? null; // Acción específica para notificación

    if ($sensorType && $value) {
        // Escribir los datos del sensor
        writeSensorData($sensorType, $value);
    }

    if ($sensorType && $accion) {
        // Enviar notificación por correo
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Cambiar si usas otro servidor
            $mail->SMTPAuth = true;
            $mail->Username = 'joeyignaciovilches@gmail.com'; // Cambiar por tu correo
            $mail->Password = 'iebf cgrm tykl wjhq'; // Contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom('joeyignaciovilches@gmail.com', 'Secure Sense');
            $mail->addAddress('ignaciocoquimbo83@gmail.com'); // Cambiar por el destinatario
            $mail->isHTML(true);
            $mail->Subject = "Notificación de Sensor: $sensorType";
            $mail->Body = "El sensor de <b>$sensorType</b> ha realizado la acción: <b>$accion</b>.";

            // Enviar el correo
            $mail->send();
            echo json_encode(["status" => "success", "message" => "Acción registrada y correo enviado."]);
        } catch (Exception $e) {
            echo json_encode(["status" => "error", "message" => "Error al enviar correo: {$mail->ErrorInfo}"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Datos incompletos para el sensor."]);
    }
} else {
    // Si la solicitud no es POST, devolver los datos del sensor
    $data = readSensorData();
    echo json_encode($data);
}
?>
