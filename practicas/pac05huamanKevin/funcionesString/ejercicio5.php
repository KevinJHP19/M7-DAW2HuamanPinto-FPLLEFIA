<?php

    function invertirtexto($texto){

        $resultado = strrev($texto);

        return($resultado);
    }
    echo invertirtexto('En este texto se reinvertira');

?>