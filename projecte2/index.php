<?php
    if(isset($_POST["numplayer"]) && isset($_POST["numcard"] )){
        session_start();
        $_SESSION["numplayer"] = $_POST["numplayer"];
        $_SESSION["numcard"] = $_POST["numcard"];

        include "jugador.class.php";
        include "baraja.class.php";
        include "carta.class.php";
        include "partida.class.php";

        $baraja = new Baraja();
        $baraja->crear_baraja();
        $baraja->mezcla();

        $jugadores = [];

        //crear los jugadores con sus mano y id

        for ( $i=1; $i <=$_SESSION["numplayer"]; $i++){
            
            for ($i = 1; $i <= $_SESSION["numplayer"]; $i++) {
                // Crear un nuevo jugador
                $jugador = new Jugador;
                $jugador->setId($i); // Suponiendo que la clase Jugador tiene un método setId
        
                // Repartir cartas al jugador
                $mano = [];
                for ($j = 0; $j < $_SESSION["numcard"]; $j++) {
                    $mano[] = $baraja->sacar_carta(); // Método para sacar una carta de la baraja
                }
                $jugador->setMano($mano); // Asignar la mano al jugador
        
                // Añadir el jugador al array de jugadores
                $jugadores[] = $jugador;
            }

                
                
            }
            
            
            
            

        }
        
        
        
        
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partida del UNO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>