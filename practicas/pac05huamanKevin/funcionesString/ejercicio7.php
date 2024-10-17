<?php

    function EliminarEspacios($texto){

        $resultado = trim($texto);

        return($resultado);
    }
    echo EliminarEspacios('En                        este texto eliminaran            
       los espacios innecesarios           ');

?>