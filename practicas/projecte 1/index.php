<?php

class campeones
{

    public $nombre;
    public $hp;
    public $ataque;
    public $defensa;
    public $habilidad;

    public function __construct($nombre, $hp, $ataque, $defensa, $habilidad)
    {
        $this->nombre = $nombre;
        $this->hp = $hp;
        $this->ataque = $ataque;
        $this->defensa = $defensa;
        $this->habilidad = $habilidad;
    }

    public function recibirdaño($daño)
    {
        $this->hp -= $daño;
        if ($this->hp <= 0) {
            echo $this->nombre . " ha muerto.";
        } else {
            echo $this->nombre . " ha recibido " . $daño . " puntos de daño. Nuevo HP: " . $this->hp . ".";
        }
    }

    public function atacar($objetivo)
    {
        $daño = $this->ataque - $objetivo->defensa;
        $objetivo->recibirDaño($daño);

    }
    public function activarHabilidad()
    {
        echo $this->nombre . " ha usado " . $this->habilidad . ".";

        if( $this->habilidad == "Supermegacohete Requetemortal"){
            $dañoextra= 200;
            $daño = $this->ataque + $dañoextra;
            $this->recibirDaño($daño);
        } else if( $this->habilidad == "Llamado a Escena"){
            $dañoextra= 244;
            $daño = $this->ataque + $dañoextra;
            $this->recibirDaño($daño);
            
        }else if($this->habilidad == "Cronorruptura"){
            $vidaextra= 300;
            $this->hp = $this->hp + $vidaextra;
            echo $this->nombre. " ha recuperado ". $vidaextra. " puntos de vida. Nuevo HP: ". $this->hp. ".";
        }else if ($this->habilidad == "As bajo la mira"){
            $dañoextra= 200;
            $daño = $this->ataque + $dañoextra;
            $this->recibirDaño($daño);
        }

        
            
        
        
    }
}
class jugadr {
    
    public $campeonseleccionado;
    public function __construct($nombredejugador){
        $this->nombredejugador = $nombredejugador;
    }
    public function seleccionarCampeon($campeones){
        $this->campeonseleccionado = $campeones;
    }
    public function realizarAccion($accion, $objetivo){

    }
}
class juego{
    public $jugadores = [
        [    ]
    ];
    }
$jinx = new campeones("Jinx", 581, 57, 28, "Supermegacohete Requetemortal");
$jhin = new campeones("Jhin", 655, 59, 24, "Llamado a Escena");
$ekko = new campeones("ekko", 655, 58, 32, "cronorruptura");
$caitlyn = new campeones("caitlyn", 580, 60, 27, "As bajo la mira");

$jhin->activarHabilidad();
$campeones = [
    [
        "id" => 0,
        "nombre" => "Jinx",
        "hp" => 581,
        "ataque" => 57,
        "defensa" => 28,
        "habilidad" => "Zap",
        "splashart" => "https://static.wikia.nocookie.net/lolesports_gamepedia_en/images/a/a5/Skin_Splash_Classic_Jinx.jpg/revision/latest?cb=20191210044208"
    ],
    [
        "id" => 1,
        "nombre" => "Jhin",
        "hp" => 655,
        "ataque" => 59,
        "defensa" => 24,
        "habilidad" => "Llamado a Escena",
        "splashart" => "https://static.wikia.nocookie.net/lolesports_gamepedia_en/images/b/b6/Skin_Splash_Classic_Jhin.jpg/revision/latest?cb=20191210050742"
    ],
    [
        "id" => 2,
        "nombre" => "Ekko",
        "hp" => 655,
        "ataque" => 58,
        "defensa" => 32,
        "habilidad" => "Cronorruptura",
        "splashart" => "https://static.wikia.nocookie.net/lolesports_gamepedia_en/images/1/12/Skin_Splash_Classic_Ekko.jpg/revision/latest/scale-to-width-down/1200?cb=20191210014428"
    ],
    [
        "id" => 3,
        "nombre" => "Caitlyn",
        "hp" => 580,
        "ataque" => 60,
        "defensa" => 27,
        "habilidad" => "As bajo la mira",
        "splashart" => "https://i.redd.it/ssumt294bmw71.jpg"
    ]
]
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>League of legends</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container-fluid">
        <div class="container">
            <h1>Campeones de League of Legends</h1>
            <div class="row">
            <?php
            foreach ($campeones as $campeon) {
                echo "<div class='col-sm-6 col-md-4 col-lg-3 m-5'>";
                echo "<div class='card ' style='width: 18rem;'>
                        <img src='" . $campeon['splashart'] . "' class='card-img-top'>
                        <div class='card-body'>
                        <h5 class='card-title'>". $campeon['nombre']. "</h5>
                        <ul>
                            <li>HP: ".$campeon['hp'] ."</li>
                            <li>Ataque: ".$campeon['ataque'] ."</li>
                            <li>Defensa: ".$campeon['defensa'] ."</li>
                            <li>Habilidad: ".$campeon['habilidad']. "</li>
                        </ul>
                        </div>
                    </div>
                </div>";
            }

            ?>
        </div>
    
    </main>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>