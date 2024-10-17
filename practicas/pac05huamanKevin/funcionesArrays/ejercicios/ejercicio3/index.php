<?php

    function filtrarMayores($numero, $valor){
        
        $resultados= array_filter($numero, function($k) use ($valor){ 
            return $k < $valor;
        } );
    
        return($resultados);
    }


    echo implode(",", filtrarMayores([10,20,22,32,14,16],21));


?>