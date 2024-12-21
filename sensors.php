<?php include 'includes/header.php'; ?>

<section class="sensors">
    <h2>Monitoreo de Sensores</h2>
    <div class="sensor-section">
        <div class="sensor-card">
            <img src="images/motion-sensor-on.png" alt="Sensor de Movimiento">
            <h3>Sensor de Movimiento</h3>
            <button onclick="sendEmail()">Encender</button>
            <button onclick="sendSensorAction('Movimiento', 'Apagado')">Apagar</button>
        </div>
        <div class="sensor-card">
            <img src="images/smoke-sensor.png" alt="Sensor de Humo">
            <h3>Sensor de Humo</h3>
            <button onclick="sendSensorAction('Humo', 'Detectado')">Detectar Humo</button>
        </div>
        <div class="sensor-card">
            <img src="images/sound-sensor.png" alt="Sensor de Sonido">
            <h3>Sensor de Sonido</h3>
            <button onclick="sendSensorAction('Sonido', 'Detectado')">Detectar Ruido</button>
        </div>
    </div>
</section>

<script>
function sendEmail() {
    // Usamos fetch para enviar la solicitud al servidor
    fetch('sendEmail.php', {
        method: 'POST',  // Usamos POST para enviar datos al servidor
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',  // Enviamos datos en formato URL-encoded
        },
        body: 'action=sendEmail'  // Enviamos un parámetro de acción que puede ser usado en el archivo PHP
    })
    .then(response => response.text())  // Esperamos la respuesta como texto
    .then(data => {
        alert(data);  // Mostramos la respuesta del servidor (por ejemplo, un mensaje de éxito o error)
    })
    .catch(error => {
        console.error('Error:', error);  // Si hay un error, lo mostramos en la consola
    });
}
</script>




<script>
function sendSensorAction(sensor, action) {
    fetch('sendEmail.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `sensor=${sensor}&action=${action}`
    })
    .then(response => response.text())
    .then(data => {
        alert(data);  // Muestra la respuesta del servidor
    })
    .catch(error => {
        console.error('Error:', error);  // Muestra errores en la consola
    });
}
</script>

<?php include 'includes/footer.php'; ?>



