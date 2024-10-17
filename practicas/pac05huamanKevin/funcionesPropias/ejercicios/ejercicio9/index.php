<?php
    function convertirHorasMinutos($horas){

        $minutos = 60 * $horas;

        return ($minutos);
    
    }

    echo convertirHorasMinutos(10);
?>