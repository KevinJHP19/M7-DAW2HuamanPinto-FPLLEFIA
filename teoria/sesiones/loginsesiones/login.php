<?php

session_start();


//Simular base de datos con usuarios

$users = [
    ["username" => "user1", "password" => "pass1"],
    ["username" => "user2", "password" => "pass2"],
    ["username" => "user3", "password" => "pass3"],
];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$username = $_POST['username'];
$password = $_POST['password'];

//valido los datos del formulario
var_dump($username);
var_dump($password);


//verificar si el usuario existe y la contraseña es correcta

foreach ($users as $user){
    var_dump($user);
    if($user['username'] == $username && $user['password'] == $password){
        //si existe lo envio a la pagina de bienvenida pero antes guardo en la sesion 
        $_SESSION['username'] = $username;

        header('Location: bienvenida.php');
        exit;
    }else{
        echo "Usuario o contraseña incorrectos";
        header('Location: index.php');
        
        exit;
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Incio de sesion</h2>
    <form action="login.php" method="post">
        <label for="username">usuario: </label>
        <input type="text" name="username" require>
        <label for="password" name="password">Password: </label>
        <input type="password" name="password" require>

        <button type="submit">Iniciar sesion</button>

        





</form>
</body>
</html>