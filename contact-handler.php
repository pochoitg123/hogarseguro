<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Aquí puedes integrar el envío de correos o guardar el mensaje en una base de datos.
    echo "Gracias, $name. Hemos recibido tu mensaje.";
}
?>
