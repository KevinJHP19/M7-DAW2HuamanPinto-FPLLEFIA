<?php


    function contarPalabras($texto){

        $resultado = str_word_count($texto);

        return($resultado);

    }

    echo "Se contaron : ",contarPalabras('este texto se contara las palabras que contiene' ), " palabras";
?>