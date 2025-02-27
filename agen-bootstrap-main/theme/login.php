<?php
session_start();
require_once './config.php';

//1. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //2. Recoger los datos del formulario
    $email =$_POST['email'];
    $password =$_POST['password'];

    //3. Ejecutar la consulta
    $result = $mysqli->query("SELECT * FROM USERS WHERE email = '$email' LIMIT 1");

    



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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>Inicion de sesion</h1>
<form action="" method="post">
        

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required> 

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>