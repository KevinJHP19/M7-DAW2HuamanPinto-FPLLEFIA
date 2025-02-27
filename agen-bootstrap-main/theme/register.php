<?php
require_once './config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //recoger datos del formulario
    $nombre = $_POST['Nombres'];
    $apellido = $_POST['Apellidos'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];
    $password = $_POST['password'];
    //2. cifrar la paswword con password_hash
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    //3.Prepara la consulta antes de insertar para evitar el sql injection
    $stmt = $mysqli->prepare(
        "INSERT INTO USERS (name,subname,email,avatar, password,rol,data_registre) 
        VALUES (?,?,?,?,?,'usuario',NOW())"
        );
    //4. Comprobar que la preparacion tuvo exito
    if(!$stmt){
        die('Error en la preparacion: ' . $mysqli->error);
    }
    //5. Bindear los parametos
    $stmt->bind_param('sssss',$nombre,$apellido,$email,$avatar,$passwordHashed);
    //6. Ejecutar la consulta
    if($stmt->execute()){
        echo 'Registro exitoso';
    } else {
        die('Error en la ejecucion: '. $stmt->error);
        //7.cerrar la coneccion
    $stmt->close();
    $mysqli->close();
    }
    
    



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <form action="" method="post">
        <label for="Nombres">Nombres:</label>
        <input type="text" id="Nombres" name="Nombres" required>

        <label for="Apellidos">Apellidos:</label>
        <input type="text" id="Apellidos" name="Apellidos" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="Avatar">Avatar:</label>
        <input type="text" id="avatar" name="avatar" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Registrarse">
    </form>
    
</body>
</html>
