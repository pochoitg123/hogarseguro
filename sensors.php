<?php include 'includes/header.php'; ?>

<section class="sensors">
    <h2>Monitoreo de Sensores</h2>
<div class="sensor-section">
    <div class="sensor">
        <img src="images/motion-sensor-on.png" alt="Sensor de Movimiento">
 
        <p id="motionStatus">Estado: Apagado</p>
        <button onclick="toggleSensor('motion', 'motionStatus', 'motionImage')">Encender/Apagar</button>
    </div>
    <hr>
    <div class="sensor">
        <img src="images/smoke-sensor.png" alt="Detector de Humo">
        <p>Estado: <span id="smoke-sensor-status">No detecta humo</span></p>
        <p id="smokeStatus"></p>
        
        <button onclick="toggleSmokeSensor()">Detectar Humo</button>
    </div>
    <hr>
    <div class="sensor">
        <img src="images/sound-sensor.png" alt="Sensor de Sonido">
        <p id="soundStatus">Estado: Sin sonido fuerte</p>
        <button onclick="checkSound()">Detectar Ruido</button>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
