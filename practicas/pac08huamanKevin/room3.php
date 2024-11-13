<?php
session_start();


// Array de preguntes

include 'include/array.php';
        $imagenlogo = "imagenes/logoescaperrom.jpg";
        $logousuario = "imagenes/iconoavatar.png";

//comparamos  la dificultad  para poder guardar las pregunta y respuesta en una variable

if ($_SESSION['dificultad'] == "facil") {
    $pregunta = $nivel_info['facil'][2]['preguntas'];
    $respuesta = $nivel_info['facil'][2]['respuestas'];
} elseif ($_SESSION['dificultad'] == "medio") {
    $pregunta = $nivel_info['medio'][2]['preguntas'];
    $respuesta = $nivel_info['medio'][2]['respuestas'];
} elseif ($_SESSION['dificultad'] == "dificil") {
    $pregunta = $nivel_info['dificil'][2]['preguntas'];
    $respuesta = $nivel_info['dificil'][2]['respuestas'];
};

$mensajedeerror = '';
if (isset($_POST['respuesta']) && $_POST['respuesta'] == $respuesta && $_SESSION['current_room'] == 3 || $_POST['respuesta'] == strtolower($respuesta)) {

    $mensajedefelicidades = "<p class='alert alert-success mt-3'>Felicidades, has completado la partida, si quieres volver a jugar presiona el logo!</p>";
    session_destroy();
} else {
    $mensajedeerror = "<p class='alert alert-danger mt-3'>Error intentalo de nuevo</p>";
    
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include "include/header.php"; ?>
    <div class="container-fluid text-center text-white bg-dark rounded-3 ps-3 pe-3 ms-3 me-3 pb-3">
        <h1>Felicidades ya solo te falta la sala 3!</h1>
        
        <p>Ahora estas en la sala 3, este es la ultima sala asi que suerte.</p>
        <form method="post">
            <label for="pregunta" class="form-label"><?= $pregunta ?></label>
            <input type="text" id="respuesta" name="respuesta" class="form-control mb-3">
            <button type="submit" class="btn btn-primary">Adivinar</button>
        </form>
        <?php
        if ($mensajedeerror && $_POST['respuesta']) {
            echo $mensajedeerror;
        }else{
            echo $mensajedefelicidades;
        }

        ?>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>