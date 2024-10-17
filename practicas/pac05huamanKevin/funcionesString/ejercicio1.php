<?php


    function convertirMayusculas($texto){

        $resultado = strtoupper($texto);

        return($resultado);

    }

    echo convertirMayusculas('este texto esta en mayusculas');
?>