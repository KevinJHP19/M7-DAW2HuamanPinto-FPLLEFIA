<?php

    session_start();

    if (isset($_SESSION['nombre']) && isset($_SESSION['dificultad'])) {
        header('Location: room1.php');
    }

    
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inicio</title>
    
    
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url('https://basementescaperoom.com/los-angeles/template/images/room-header-bg-thebasement.jpg'); background-size:cover; background-repeat: no-repeat;">
    <div class="card p-4 bg-dark text-white" style="width: 22rem;">
        <h2 class="card-title text-center">Bienvenido!</h2>
        <form action="room1.php"  method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="dificultat" class="form-label"> Nivel de dificultad</label>
                <select name="dificultad" id="dificultat" class="form-select" required>
                    <option value="">Selecciona un nivel</option>
                    <option value="facil">facil</option>
                    <option value="medio">medio</option>
                    <option value="dificil">difícil</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Comenzar juego</button>
        </form>
    </div>
</body>
</html>