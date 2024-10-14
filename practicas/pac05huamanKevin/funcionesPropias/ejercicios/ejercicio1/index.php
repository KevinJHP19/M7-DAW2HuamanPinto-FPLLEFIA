
<?php

    function generarSaludo($nombre){
        
        $texto = "<h1>Hola, " . $nombre . "!</h1>";

        return($texto);

    }

    echo generarSaludo('Juan');
?>