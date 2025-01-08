<?php

include("/workspaces/M7-DAW2HuamanPinto-FPLLEFIA/gormitis-game/src/config/config.php");
include("/workspaces/M7-DAW2HuamanPinto-FPLLEFIA/gormitis-game/src/classes/Gormiti.php");

if(isset($_POST['nombre']) && $_POST['salud'] && $_POST['daño'] && $_POST['imagen'] && $_POST['habilidad']){

        
        $id = uniqid();
        $nombre = $_POST['nombre'];
        $salud = $_POST['salud'];
        $daño = $_POST['daño'];
        $imagen = $_POST['imagen'];
        $habilidades = explode(',', $_POST['habilidad']);

        $gormiti = new Gormiti(null, $nombre, $salud, $daño, $imagen, $habilidades);

        


    
    
}else{
    echo "No se han recibido todos los datos";
    
}

var_dump($_SESSION['gormitis']);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main>
        <div class="container">
            <form action="" class="form" method="post">
                <label for="nombre" class="form-label">Nombre: </label>
                <input type="text" name="nombre" class="form-control">

                <label for="salud" class="form-label">Salud: </label>
                <input type="number" name="salud" class="form-control">

                <label for="daño" class="form-label">Daño:</label>
                <input type="number" name="daño" class="form-control">

                <label for="imagen" class="form-label">URL del campeon</label>
                <input type="text" name="imagen" class="form-control">

                <label for="habilidad" class="form-label">Habilidad separado con ',':</label>
                <input type="text" name="habilidad" class="form-control">

                <div class="row">
                    <div class="col-4">
                    <button type="submit" class="btn btn-primary mt-3">Crear Personaje</button>
                    </div>
                    <div class="col-4">
                    <a href="characters.php" class="btn btn-warning mt-3">Ver personajes</a>
                    </div>
                    <div class="col-4">
                        <a href="reset.php?destruir=true" class="btn btn-danger mt-3">Reiniciar Sesion</a>
                    </div>

                </div>
                

            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>