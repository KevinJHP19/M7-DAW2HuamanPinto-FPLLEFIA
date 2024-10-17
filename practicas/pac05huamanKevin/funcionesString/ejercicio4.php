<?php

    function reemplazarPalabras($texto,$buscar,$reemplazar){

        $resultado = str_replace($buscar,$reemplazar,$texto);

        return($resultado);
    }
    echo reemplazarPalabras('En este texto se reemplazara la cualquier palabra','cualquier','tempera');

?>