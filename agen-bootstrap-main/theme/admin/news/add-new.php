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
        
    } else {
        echo 'Error al añadir la noticia';
    }
    $stmt->close();
    
}
?>

</html>