<?php

    function compararStrings($cadena1,$cadena2){

        $resultado = strcmp($cadena1,$cadena2);
        if($resultado == 1){
            $texto = 'Hubo igualdad';
        } else{
            $texto = 'No hubo igualdad';
        }
        

        return($texto);
    }
    echo compararStrings('manzana','naranja');

?>