
<?php

    function generarSaludo($nombre){
        
        $nombre = "Juan";

        return($nombre);

    }

    echo "<h1>Hola, ", generarSaludo("$nombre"),"!</h1>"
?>