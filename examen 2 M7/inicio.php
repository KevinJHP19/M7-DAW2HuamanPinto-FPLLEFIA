<?php
session_start();

    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include './componentes/header.php';

    echo "<h1>Hola señor " .$_SESSION['usuario']. " con el rol ". $_SESSION['rol']."</h1>";
    

    ?>
    <img src="<?=$_SESSION['urlimagen']?>" alt="" width="50px">
    

    <a href="logout.php?verificar=true" class="btn btn-primary">
        Cerrar sesión
    </a>
</body>

</html>