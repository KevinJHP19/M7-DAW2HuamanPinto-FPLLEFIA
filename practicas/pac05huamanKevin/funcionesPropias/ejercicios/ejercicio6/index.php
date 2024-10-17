<?php
    function esPar($numero){

        $resto = $numero % 2;
        if($resto==0){
            $texto= "par";

        }else{
            $texto= "impar";
        }

        return($texto);

    }

    echo "El un numero " . esPar('10');



?>