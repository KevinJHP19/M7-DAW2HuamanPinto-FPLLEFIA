<?php

    function contarOcurrencias($texto,$palabra){

        $resultado = substr_count($texto,$palabra);

        return($resultado);
    }
    echo contarOcurrencias('En este texto se contara todas las ocurrencias que tambien puede haber en un texto mas largo','en');

?>