<?php

    function convertirTemperatura($temperatura, $escala){

        if($escala=='F'){
            $conversion= $temperatura *9/5 + 32;
            $texto = 'ºF';
            
        }else if ($escala=='C'){
            $conversion= ($temperatura -32)*5/9;
            $texto = 'ºC';
        }
        return($conversion . $texto);
    };

    echo "La temperatura es " . convertirTemperatura(50, 'C');

    


?>