<?php
session_start();
include "data.php";
if (isset($_SESSION['username']) && isset($_SESSION['rol'])) {
    if ($_SESSION['username'] == 'admin' && $_SESSION['rol'] == 'administrador') {
    }else{
        header('Location: login.php');
        exit;
} 
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    echo "Bienvenido " . $_SESSION['username'];

    foreach ($preguntas as $pregunta) {
        echo "<h2>" . $pregunta['question'] . "</h2>";
        echo "<ul>";
        foreach ($pregunta['options'] as $option) {
            echo "<li>" . $option . "</li>";
        }
        echo "</ul>";
        
    }
    ?>
    <a class="btn btn-primary">Añadir nueva pregunta</a>
    <a class="btn btn-succes">Editar pregunta</a>

    <a class="btn btn-danger">Borrar pregunta</a>

    <a href="logout.php?validar=true" class="btn btn-danger">Cerrar Session</a>

</body>

</html>