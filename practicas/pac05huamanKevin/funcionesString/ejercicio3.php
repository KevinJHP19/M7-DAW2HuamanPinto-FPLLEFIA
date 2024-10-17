<?php

    function obtenerSubcadena($texto, $inicio, $longitud){

        $resultado = substr($texto, $inicio, $longitud);

        return($resultado);
    }

    echo obtenerSubcadena('En este texto se obtendra una parte del texto', 10, 20);


?>