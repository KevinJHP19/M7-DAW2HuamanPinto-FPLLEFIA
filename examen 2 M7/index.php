<?php

session_start();
$datos = [
    [
        "username" => "admin",
        "password" => 1234,
        "rol" => "administrador"
    ],
    [
        "username" => "usuario",
        "password" => 12345,
        "rol" => "usuario"
    ],

];

$mensajedeerror = '';
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password"])) {
    $_SESSION['usuario'] = $_POST["username"];
    $_SESSION['password'] = $_POST["password"];
    $_SESSION['urlimagen'] = $_POST["imagen"];

}

foreach($datos as $dato){
    if($dato["username"] == $_SESSION["usuario"] && $dato["password"] == $_SESSION["password"]){
        $_SESSION['rol'] = $dato['rol'];
        header("Location: inicio.php");
        
    }else{
        $mensajedeerror = "<p class='alert alert-danger mt-3 text-color-white'>Por favor, introduce correctamente tu nombre de usuario o contraseña.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once './componentes/header.php';
    ?>
    <form action="" method="post">
        <label for="username" class="form-label">usuario: </label>
        <input type="text" class="form-control" name="username" require>
        <label for="password" name="password" class="form-label">Password: </label>
        <input type="password" class="form-control" name="password" require>
        <label for="password" name="imagen" class="form-label">Url imagen: </label>
        <input type="text" class="form-control" name="imagen" require>




        <button type="submit" class="btn btn-primary">Iniciar sesion</button>
        
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>