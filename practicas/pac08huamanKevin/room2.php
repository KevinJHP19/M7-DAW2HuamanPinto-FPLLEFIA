<?php
session_start();


// Array de preguntes

include 'include/array.php';
        $imagenlogo = "imagenes/logoescaperrom.jpg";
        $logousuario = "imagenes/iconoavatar.png";

//comparamos  la dificultad  para poder guardar las pregunta y respuesta en una variable

if ($_SESSION['dificultad'] == "facil") {
    $pregunta = $nivel_info['facil'][1]['preguntas'];
    $respuesta = $nivel_info['facil'][1]['respuestas'];
} elseif ($_SESSION['dificultad'] == "medio") {

    $pregunta = $nivel_info['medio'][1]['preguntas'];
    $respuesta = $nivel_info['medio'][1]['respuestas'];
} elseif ($_SESSION['dificultad'] == "dificil") {
    $pregunta = $nivel_info['dificil'][1]['preguntas'];
    $respuesta = $nivel_info['dificil'][1]['respuestas'];
};

$mensajedeerror = '';
if (isset($_POST['respuesta']) && $_POST['respuesta'] == $respuesta || $_POST['respuesta'] == strtolower($respuesta) && $_SESSION['current_room'] == 2 ) {
    $_SESSION['current_room']++;
    header('Location: room3.php');
    exit;
    
} else {
    $mensajedeerror = "<p class='alert alert-danger mt-3'>Error intentalo de nuevo</p>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include "include/header.php"; ?>
    <div class="container-fluid text-center text-white bg-dark rounded-3 ps-3 pe-3 ms-3 me-3 pb-3">
        <h1>Felicidades llegaste a la Room numero 2!</h1>
        
        <p>Ahora estas en la sala 2, una sala para adivinar la capital del pais depende al nivel.</p>
        <form method="post">
            <label for="pregunta" class="form-label"><?= $pregunta ?></label>
            <input type="text" id="respuesta" name="respuesta" class="form-control mb-3">
            <button type="submit" class="btn btn-primary">Adivinar</button>
        </form>
        <?php
        if ($mensajedeerror && $_POST['respuesta']) {
            echo $mensajedeerror;
        }

        ?>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>