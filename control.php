<?php include 'includes/header.php'; ?>

<section class="sensors">
    <h2>Monitoreo de Sensores</h2>
    <div class="sensor-section">
        <div class="sensor-card">
            <img src="images/motion-sensor-on.png" alt="Sensor de Movimiento">
            <h3>Sensor de Movimiento</h3>
            <button onclick="sendSensorAction('Movimiento', 'Encender')">Encender LED</button>
            <button onclick="sendSensorAction('Movimiento', 'Apagar')">Apagar LED</button>
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
function sendSensorAction(sensor, action) {
    fetch('control_led.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `sensor=${sensor}&action=${action}`  // Enviamos el sensor y la acción al servidor
    })
    .then(response => response.text())
    .then(data => {
        alert(data);  // Muestra la respuesta del servidor (mensaje de éxito o error)
    })
    .catch(error => {
        console.error('Error:', error);  // Si hay un error, lo mostramos en la consola
    });
}
</script>

<?php include 'includes/footer.php'; ?>
    