<?php include 'includes/header.php'; ?>

<section class="contact">
    <h2>Contáctanos</h2>
    <form action="contact-handler.php" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Mensaje:</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Enviar</button>
    </form>
</section>

<?php include 'includes/footer.php'; ?>
