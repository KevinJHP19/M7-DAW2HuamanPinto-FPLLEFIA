<?php

    function calcularEdad($anioNacimiento){
        $anioactual= date("Y");

        $edad=$anioactual-$anioNacimiento;

        return($edad);


    }

    echo "Tu edad es: " . calcularEdad(2005);






?>