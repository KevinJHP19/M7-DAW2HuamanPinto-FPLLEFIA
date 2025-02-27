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
    $foto = $_POST['foto'];
    $name = $_POST['name'];
    $subname = $_POST['subname'];
    $descripcion = $_POST['descripcion'];
    $rating = $_POST['rating'];

    //4. Ejecutar la consulta
    $stmt = $mysqli->prepare("INSERT INTO TESTIMONIONS (foto, name, subname, descripcion, rating) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssi", $foto, $name, $subname, $descripcion, $rating);
    if($stmt->execute()){
        echo 'Testimonial añadido correctamente';
    } else {
        echo 'Error al añadir el testimonial';
    }
    $stmt->close();
    $mysqli->close();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add testimonial</title>
</head>
<body>
    <h1>Add testimonial</h1>
    <form action="" method="post">
        <label for="">Foto</label>
        <input type="text" name="foto"><br>
        <label for="">Nombre</label>
        <input type="text" name="name"><br>
        <label for="">Apellido</label><br>
        <input type="text" name="subname"><br>

        <label for="">Comentario</label>
        <textarea name="descripcion" id="" cols="30" rows="10"></textarea><br>
        <label for="">Puntuación</label>
        <input type="number" name="rating" max=5><br>
        <input type="submit" value="Guardar">    
    </form>
    
</body>
</html>