<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>




<?php include 'includes/header.php'; ?>



<section class="services">
<section class="hero">
    <div class="hero-overlay">
        <h1>Bienvenido a Secure Sense</h1>
        <p>Protección inteligente en cada rincón</p>
    </div>
</section>    <h2>Nuestros Servicios</h2>
    <div class="grid">
        <div class="card">
            <a href="sensors.php">
                <img src="images/motion-sensor-on.png" alt="Sensor de Movimiento">
            </a>
            <h3>Sensores de Movimiento</h3>
            <p>Detecta actividad sospechosa de manera eficiente.</p>
        </div>
        <hr>
        <div class="card">
            <a href="sensors.php">
                <img src="images/smoke-sensor.png" alt="Detector de Humo">
            </a>
            <h3>Detectores de Humo</h3>
            <p>Protección avanzada contra incendios.</p>
        </div>
        <hr>
        <div class="card">
            <a href="cameras.php">
                <img src="images/camera.png" alt="Cámaras de Seguridad">
            </a>
            <h3>Cámaras de Seguridad</h3>
            <p>Monitorea en tiempo real desde cualquier lugar.</p>
        </div>
        <hr>
        <div class="card">
            <a href="sensors.php">
                <img src="images/sound-sensor.png" alt="Sensor de Sonido">
            </a>
            <h3>Sensores de Sonido</h3>
            <p>Detecta ruidos fuertes o anomalías.</p>
        </div>
    </div>

    
</section>

<?php include 'includes/footer.php'; ?>



