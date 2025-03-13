<?php
session_start();
require_once '../../config.php';

//1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol sea administrador';
    exit();
}
//2. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //3. Recoger los datos del formulario
    $Avatar = $_POST['Avatar'];
    $name = $_POST['name'];
    $subname = $_POST['subname'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];

    //4. Ejecutar la consulta
    $stmt = $mysqli->prepare("INSERT INTO USERS (name,subname,email,avatar,rol) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $name, $subname, $email, $Avatar, $rol);
    if($stmt->execute()){
        
    } else {
        echo 'Error al añadir el testimonial';
    }
    $stmt->close();
    
}

?>
