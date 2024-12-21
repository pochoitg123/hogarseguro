<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $command = $_POST['command'] ?? null;

    if ($command === "ON" || $command === "OFF") {
        file_put_contents("led_command.txt", $command);
        echo "Comando actualizado a: $command";
    } else {
        echo "Comando inválido.";
    }
} else {
    echo "Método no soportado.";
}
?>
