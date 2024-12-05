<?php

session_start();

$usuarios = [
    [
        "username" => "admin",
        "password" => 1234,
        "rol" => "administrador"

    ],

    [
        "username" => "player",
        "password" => 5678,
        "rol" => "jugador"
    ]

];

if (isset($_POST['username']) && isset($_POST['password'])) {


    foreach ($usuarios as $usuario) {
        if ($usuario["username"] == $_POST['username'] && $usuario["password"] == $_POST['password']) {

            $_SESSION['username'] = $usuario["username"];
            $_SESSION['rol'] = $usuario["rol"];
            if ($_SESSION['rol'] == 'administrador') {
                header("Location: manage.php");
                exit;
            } else if ($_SESSION['rol'] == 'jugador') {
                header("Location: trivial.php");
                exit;
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logueate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php"?>

    <form action="" method="POST">
        <label for="form-label">Usuario</label>
        <input type="text" name="username" class="form-control">
        <label for="form-label">Contraseña</label>
        <input type="text" name="password" class="form-control">
        <button type="submit" class="btn btn-secondary">Iniciar Session</button>

    </form>

</body>

</html>