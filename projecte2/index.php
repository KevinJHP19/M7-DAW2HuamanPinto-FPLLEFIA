<?php
if (isset($_POST["numplayer"]) && isset($_POST["numcard"])) {
    session_start();
    $_SESSION["numplayer"] = $_POST["numplayer"];
    $_SESSION["numcard"] = $_POST["numcard"];

    include "jugador.class.php";
    include "baraja.class.php";
    include "partida.class.php";
    
    $baraja = new Baraja();
    $baraja->crear_baraja();
    $baraja->mezcla();

    $jugadores = [];
}else{
    header("Location: formulario_uno.php");
    exit;
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

<main>
    <div class="container">
        <div class='d-flex'>
<?php
$partida = new Partida();
$partida->numeros_baraja = $_SESSION["numcard"];
$_SESSION["turno"] = $partida->turno;
for ($i = 1; $i <= $_SESSION["numplayer"]; $i++) {
    // Crear un nuevo jugador
    $jugador = new Jugador();
    $jugador->id=$i;
    $partida->numero_jugadores = "jugador".$i;
    
    $_SESSION["turno"] = $i;

    if($_SESSION["turno"] == $_SESSION["numplayer"]) {
        $_SESSION["turno"] = 1;
    
    }

    $jugadores[] = $jugador;
    
    
    echo "<div class='jugador card ' style='width: 18rem;'>";
    echo "<h3 class='card-title text-white bg-primary p-3 text-center'>".$partida->numero_jugadores ." = ". $partida->numeros_baraja ." cartas</h3>";
    echo "<div class='card-body d-flex flex-column align-items-center'>";
    

    for ($j = 1; $j <= $partida->numeros_baraja; $j++) {
        // Repartir cartas al jugador actual

        $carta_index = rand(0, count($baraja->conjunto_cartas) - 1);
        $jugador->agregar_carta($baraja->conjunto_cartas[$carta_index]);
        array_splice($baraja->conjunto_cartas, $carta_index, 1);

        // Mostrar cartas del jugador actual
        echo "<p>".$jugador->mostrar_mano()[$j - 1]->pinta_carta() ."</p>";
    }
    echo "</div>";
    echo "</div>";
    
    



}
?>
</div>
<section>
    <div class="card mt-3 p-3 bg-warning" class="width: 18rem;">
        <?php echo "<h3>Quedan: ".count($baraja->conjunto_cartas)."cartas</h3> "; ?>
        <div class="d-flex flex-wrap">
    <?php
    
    $cartavolteada = new Carta('girada','carta');
    echo $cartavolteada->pinta_carta_girada();
     
    ?></div>
    </div>
</section>
</div>




</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
