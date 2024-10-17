<?php

    function contarElementos($array){

        $contador=count($array);

        return($contador);
    }


    echo contarElementos(['Peru','España',"Francia","Rusia","Portugal"]);
?>