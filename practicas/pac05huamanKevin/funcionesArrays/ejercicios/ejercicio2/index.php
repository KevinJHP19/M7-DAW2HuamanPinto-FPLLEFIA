<?php

    function ordenarArrayAlfabetico($nombres){
        $texto='';
       
        sort($nombres);
        $texto= implode(", ", $nombres);
        return($texto);
    }

    echo ordenarArrayAlfabetico(["Alex","Fabricio","Jesus","Daniel","Tomas"]);
?>