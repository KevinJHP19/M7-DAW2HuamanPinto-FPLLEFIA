<?php

    function dividirPalabras($texto){

        $resultado = print_r(explode (",",$texto));
        return($resultado);
    }
    echo dividirPalabras("manzana,Platano,Sandia");

?>