<?php
 
    function calcularDescuento($precioOriginal, $descuento){
        $preciodescontado = $precioOriginal*$descuento;
        $preciofinal= $precioOriginal - $preciodescontado;

        return($preciofinal);

    }


    echo "El es precio final es " . calcularDescuento(5.80,10/100);
?>