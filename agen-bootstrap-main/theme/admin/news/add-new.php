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
    $Titulo = $_POST['Titulo'];
    $Subtitulo = $_POST['Subtitulo'];
    $Descripcion = $_POST['Descripcion'];
    $Imagen = $_POST['Imagen'];

    //4. Ejecutar la consulta
    $stmt = $mysqli->prepare("INSERT INTO NEWS (tittle, subtittle, descripcion, thumbnail) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $Titulo, $Subtitulo, $Descripcion, $Imagen);
    if($stmt->execute()){
        header('Location:../admin.php');
    } else {
        echo 'Error al añadir la noticia';
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
    <title>Add new</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <h1 class="mb-4">Añadir Noticia</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="Titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="Titulo" name="Titulo" required>
            </div>
            <div class="mb-3">
                <label for="Subtitulo" class="form-label">Subtitulo</label>
                <input type="text" class="form-control" id="Subtitulo" name="Subtitulo" required>
            </div>
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
            </div>
            <div class="mb-3">
                <label for="Imagen" class="form-label">Imagen</label>
                <input type="text" class="form-control" id="Imagen" name="Imagen"  required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+0I5gybF5b5yD1Fq4u5Kk5tBT5j5" crossorigin="anonymous"></script>
    
</body>
</html>