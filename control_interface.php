<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controlar LED</title>
</head>
<body>
    <h1>Control del LED</h1>
    <form method="POST" action="update_command.php">
        <button type="submit" name="command" value="ON">Encender LED</button>
        <button type="submit" name="command" value="OFF">Apagar LED</button>
    </form>
</body>
</html>
