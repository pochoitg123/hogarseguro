<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Validar que todos los campos tengan datos
    if (!empty($nombre) && !empty($correo) && !empty($mensaje)) {
        // Mensaje de confirmación
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Confirmación de Envío</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f9;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .confirmation-container {
                    background-color: #fff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    max-width: 400px;
                    width: 100%;
                }
                h2 {
                    color: #007bff;
                }
                p {
                    font-size: 16px;
                    color: #333;
                    margin: 10px 0;
                }
                a {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 10px 20px;
                    background-color: #007bff;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    transition: background-color 0.3s ease;
                }
                a:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>
            <div class='confirmation-container'>
                <h2>¡Gracias por tu mensaje!</h2>
                <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Correo:</strong> $correo</p>
                <p><strong>Mensaje:</strong> $mensaje</p>
                <a href='contact.php'>Volver al contacto</a>
            </div>
        </body>
        </html>";
    } else {
        echo "Por favor, completa todos los campos del formulario.";
    }
} else {
    header('Location: contact.php');
    exit();
}
?>
