<?php

    function buscarEnArray($array, $valor) {

        if(in_array($valor,$array)){
            $texto= "Si existe: " . $valor;
        }else{
            $texto= "No  existe: " . $valor;
        }
        return($texto);
    }
    echo buscarEnArray(['Zombie','Esqueleto','Piglin','Creeper'],"Piglin")

?>