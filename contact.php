<?php include 'includes/header.php'; ?>

<section class="contact-section">
    <h2>Contáctanos</h2>
    <p>Por favor, completa el formulario a continuación y nos pondremos en contacto contigo lo antes posible.</p>

    <form action="contact-handler.php" method="POST" class="contact-form">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required placeholder="Ingresa tu nombre">
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required placeholder="Ingresa tu correo electrónico">
        </div>
        <div class="form-group">
            <label for="message">Mensaje:</label>
            <textarea id="message" name="message" required placeholder="Escribe tu mensaje aquí"></textarea>
        </div>
        <button type="submit" class="submit-button">Enviar</button>
    </form>
</section>

<?php include 'includes/footer.php'; ?>
