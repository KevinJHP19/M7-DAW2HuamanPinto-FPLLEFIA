<?php

session_start();
require_once './config.php';
//1. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //2. Recoger los datos del formulario
    $email =$_POST['email'];
    $password =$_POST['password'];

    //3. Ejecutar la consulta
    $result = $mysqli->query("SELECT * FROM usuarios WHERE correo = '$email' LIMIT 1");
    //4. Mirar si hay resultados
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        //5. Comprobar la contraseña
        if (password_verify($password, $user['password'])) {
            //6. Iniciar Sesion
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_subname'] = $user['subname'];
            $_SESSION['user_avatar'] = $user['avatar'];
            $_SESSION['user_rol'] = $user['rol'];
            header('Location: index.php');
        } else {
            echo 'Contraseña incorrecta';
        }
    }else{
        echo 'Usuario no encontrado';
    }
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container-fluid, .container {
            padding: 15px;
        }
    </style>
</head>
<body style="background-image: url(https://c8.alamy.com/comp/MDWC7W/a-view-looking-down-passeig-maritim-in-santa-susanna-spain-MDWC7W.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;">
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="border rounded-5 p-5 mt-5 bg-white">
                        <div class="">
                            <h2 class="text-center">Iniciar Sesión</h2>
                            <form action="login.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                <a href="registro.php" class="btn btn-link">Crear una cuenta</a>
                            </form>
                        </div>
            
        </div>
    </div>
</head>
<body>
    
</body>
</html>