<?php
// Archivo para controlar el LED del ESP32

// Estado del LED
$ledCommand = "OFF"; // Por defecto, el LED está apagado

// Si se recibe un estado del ESP32
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ledState = $_POST['ledState'] ?? null;

    if ($ledState) {
        // Registrar el estado recibido del ESP32
        file_put_contents("led_status.txt", $ledState);
    }
}

// Leer el comando del LED del archivo (si existe)
if (file_exists("led_command.txt")) {
    $ledCommand = trim(file_get_contents("led_command.txt"));
}

// Devolver el comando actual para el LED
echo $ledCommand;
?>

