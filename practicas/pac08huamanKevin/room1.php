<?php

    session_start();
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['dificultad'] = $_POST['dificultad'];

    echo $_SESSION['nombre']. " te has conectado con éxito!";
    echo $_SESSION['dificultad']. " es el nivel de dificultad seleccionado.";

    // Array de preguntes
    

    $nivel_info = [
        "facil" =>
        [
            "preguntas" => "Cual es la capital de España?",
            "respuestas" => "Madrid"
        ],
        [
            "preguntas" => "Cual es la capital de Italia?",
            "respuestas" => "Roma"
        ],
        [
            "preguntas" => "Cual es la capital de Portugal?",
            "respuestas" => "Lisboa"
        ],
        "medio" =>
        [
            "preguntas" => "Cual es la capital de Croacia?",
            "respuestas" => "Zagreb"
        ],
        [
            "preguntas" => "Cual es la capital de Hungria?",
            "respuestas" => "Budapest"
        ],
        [
            "preguntas" => "Cual es la capital de Suecia?",
            "respuestas" => "Estocolmo"
        ],
        "dificil" =>
        [
            "preguntas" => "Cual es la capital de Senegal?",
            "respuestas" => "Dakar"

        ],
        [
            "preguntas" => "Cual es la capital de Australia?",
            "respuestas" => "Canberra"
        ],
        [
            "preguntas" => "Cual es la capital de Nueva Zelanda?",
            "respuestas" => "Wellington"
        ]
        


    ];
    $_SESSION['current'] = 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room1</title>
</head>
<body>
    
</body>
</html>