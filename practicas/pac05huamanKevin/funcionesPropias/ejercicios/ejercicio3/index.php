<?php

    function generarResumen($texto, $limite){
        
        
        $texto= substr($texto, 0 , $limite);

        return($texto);
    }
    echo   generarResumen('Hola buenos dias a todos', 12) , "..."
    
?>