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
    $descripcion = $_POST['descripcion'];
    $rating = $_POST['rating'];

    //4. Ejecutar la consulta
    $stmt = $mysqli->prepare("INSERT INTO TESTIMONIONS (Avatar, name, subname, descripcion, rating) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssi", $Avatar, $name, $subname, $descripcion, $rating);
    if($stmt->execute()){
        header('Location:../admin.php');
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
    <title>Add user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <h1 class="mb-4">Añadir Usuario</h1>
        <form action="" method="post">
            
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="subname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="subname" name="subname" required>
            </div>
            <div class="mb-3">
                <label for="Avatar" class="form-label">Avatar</label>
                <input type="text" class="form-control" id="Avatar" name="Avatar" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Comentario</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Puntuación</label>
                <input type="number" class="form-control" id="rating" name="rating" max="5" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+0I5gybF5b5yD1Fq4u5Kk5tBT5j5" crossorigin="anonymous"></script>
    
</body>
</html>