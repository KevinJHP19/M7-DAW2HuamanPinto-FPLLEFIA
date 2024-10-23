<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sombrero Seleccionador de Hogwarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php

?>
<body>
    <div class="container">
    <h1 class="text-center mb-4">Bienvenido a Hogwarts</h1>
    <h4 class="text-center mb-4">Por favor ingrese sus Datos</h4>
    <form action="bienvenida.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre">
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="Apellidos">
        <button type="submit">Registrar</button>
    </form>
</div>
</body>
</html>