<?php

require_once '../../config.php'; // Conexión a la BD



//2. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //3. Recoger los datos del formulario
    $name = $_POST['nombre_categoria'];
    $icono = $_POST['icono_categoria'];
}

//4. Insertar en la base de datos
$stmt = $mysqli->prepare("INSERT INTO categorias (nombre, icono) VALUES (?,?)");
$stmt->bind_param("ss", $name, $icono);

if($stmt->execute()){
    echo 'Categoría añadida exitosamente';
} else {
    echo 'Error al añadir la categoría';
}
$stmt->close();
$mysqli->close();
header("Location: ../menuadmin.php?producto=true");
exit();

?>