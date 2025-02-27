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
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $thumbnail = $_POST['thumbnail'];

    //4. Ejecutar la consulta
    $stmt = $mysqli->prepare("INSERT INTO PROJECTS (title, url, thumbnail,descripcion) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $title, $url, $thumbnail, $description);
    if($stmt->execute()){
        echo 'Proyecto añadido';
    } else {
        die('Error en la ejecucion: '. $stmt->error);
    }
    $stmt->execute();
    $mysqli->close();
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
    <h1>Formulario add project</h1>
    <form action="" method="POST">
        <label for="title">Titulo:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="url">URL:</label><br>
        <input type="text" id="url" name="url" required><br>
        <label for="description">Descripcion:</label><br>
        <textarea name="description" id="description" cols="30" rows="10" required></textarea><br>
        <label for="image">Imagen:</label><br>
        <input type="text" id="thumbnail" name="thumbnail" required><br>
        
        
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>