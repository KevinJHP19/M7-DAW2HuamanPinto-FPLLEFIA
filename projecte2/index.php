<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego del UNO</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        
        <div class="container  text-white p-5">
            <h1 class="text-center fw-bold">Bienvenido al juego del UNO</h1>
            
            <div class="container-sm p-2">
            <form action="" method="POST" class="fw-bold bg-dark p-4 rounded-2">
            <p class="text-center">Por favor llena este formulario para poder iniciar</p>
                <label for="" class="form-label m-3 text-start">Numeros de jugadores:</label>
                <input type="number" name="numplayer" class="form-control">
                <label for="" class="form-label m-3">Numero de cartas por jugador:</label>
                <input type="number" name="numcards" class="form-control">
                <div class="text-center">

                <button  type="submit" class=" btn btn-secondary m-4 ">Iniciar juego</button>
                </div>
            </form>
            </div>

        </div>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>