<?php include 'includes/header.php'; ?>

<section class="cameras">
    <h2>Cámaras de Seguridad</h2>
    <video controls width="600" aria-label="Vista de cámara de seguridad">
        <source src="videos/security-camera.mp4" type="video/mp4">
        <source src="videos/security-camera.webm" type="video/webm">
        <source src="videos/security-camera.ogg" type="video/ogg">
        Tu navegador no soporta videos. Por favor, utiliza un navegador actualizado.
    </video>
    <p>Estado: <strong>En vivo</strong></p>

    <!-- Botón que llama a update_command.php con JavaScript -->
    <button id="turnOnCamera">Encender Cámara</button>
</section>

<script>
    document.getElementById('turnOnCamera').addEventListener('click', function() {
        fetch('update_command.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=turn_on_camera',
        })
        .then(response => response.text())
        .then(data => {
            console.log('Respuesta del servidor:', data);
            alert('Cámara encendida.');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al encender la cámara.');
        });
    });
</script>

<?php include 'includes/footer.php'; ?>