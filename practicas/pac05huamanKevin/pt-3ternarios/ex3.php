<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
</head>
<body>

<form action="" method="post">
    <input type="text" name="nombre" value="nombre">
    <input type="submit" value="Enviar">
</form>

<?php

    
    $nombre = $_POST['nombre'];

    // Usamos el operador ternario para verificar si el nombre está vacío
    $verificar = ($nombre == 'nombre' || $nombre == '') ? '<p>Ingrese su nombre</p>' : '<p>Su nombre está ingresado</p>';

    // Mostramos el resultado
    echo $verificar;

?>

</body>
</html>
