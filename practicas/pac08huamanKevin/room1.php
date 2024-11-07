<?php

session_start();

// Array de preguntes

$nivel_info = [
    "facil" => [
        [
            "preguntas" => "¿Cual es la capital de España?",
            "respuestas" => "Madrid"
        ],
        [
            "preguntas" => "¿Cual es la capital de Italia?",
            "respuestas" => "Roma"
        ],
        [
            "preguntas" => "¿Cual es la capital de Portugal?",
            "respuestas" => "Lisboa"
        ]
    ],
    "medio" => [
        [
            "preguntas" => "¿Cual es la capital de Croacia?",
            "respuestas" => "Zagreb"
        ],
        [
            "preguntas" => "¿Cual es la capital de Hungria?",
            "respuestas" => "Budapest"
        ],
        [
            "preguntas" => "¿Cual es la capital de Suecia?",
            "respuestas" => "Estocolmo"
        ]
    ],
    "dificil" => [
        [
            "preguntas" => "¿Cual es la capital de Senegal?",
            "respuestas" => "Dakar"

        ],
        [
            "preguntas" => "¿Cual es la capital de Australia?",
            "respuestas" => "Canberra"
        ],
        [
            "preguntas" => "¿Cual es la capital de Nueva Zelanda?",
            "respuestas" => "Wellington"
        ]
    ]
];
$_SESSION['current_room'] = 0;

//comparamos  la dificultad  para poder guardar las pregunta y respuesta en una variable

if ($_SESSION['dificultad'] == "facil") {

    $pregunta = $nivel_info['facil'][0]['preguntas'];
    $respuesta = $nivel_info['facil'][0]['respuestas'];
} else if ($_SESSION['dificultad'] == "medio") {
    $pregunta = $nivel_info['medio'][0]['preguntas'];
    $respuesta = $nivel_info['medio'][0]['respuestas'];
} else if ($_SESSION['dificultad'] == "dificil") {
    $pregunta = $nivel_info['dificil'][0]['preguntas'];
    $respuesta = $nivel_info['dificil'][0]['respuestas'];
};
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid text-center text-white bg-dark rounded-3 ps-3 pe-3 ms-3 me-3 pb-3">
        <h1>Bienvenido al Room1!</h1>
        <p>Estás en la habitación Room1, una sala para adivinar la capital del pais depende al nivel.</p>
        <form method="post">
            <label for="pregunta" class="form-label"><?= $pregunta ?></label>
            <input type="text" id="respuesta" name="respuesta" class="form-control mb-3">
            <button type="submit" class="btn btn-primary">Adivinar</button>
        </form>
        <?php
        if (isset($_POST['respuesta']) && $_POST['respuesta'] == $respuesta) {
            echo "<p class='alert alert-success'>Correcto!</p>";
            // header('Location: room2.php');
        } else {
            echo "<p class='alert alert-danger'>Error intentalo de nuevo</p>";
            $_POST['respuesta'] = "";
        }

        ?>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>