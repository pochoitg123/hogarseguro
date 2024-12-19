<?php include 'includes/header.php'; ?>

<section class="sensors">
    <h2>Monitoreo de Sensores</h2>
<div class="sensor-section">
<div class="sensor-card">
    <img src="images/motion-sensor-on.png" alt="Sensor de Movimiento">
    <h3>Sensor de Movimiento</h3>
    <button onclick="sendSensorAction('Movimiento', 'Encendido')">Encender</button>
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




<?php include 'includes/footer.php'; ?>



