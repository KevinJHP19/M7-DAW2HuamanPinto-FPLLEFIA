

<?php
    function calcularTotal($precio, $cantidad, $impuesto){

        $precio = 3.5;
        $cantidad = 4;
        $total=$precio * $cantidad;
        $impuesto = $total *21/100;
         
        return($precio*$cantidad+$impuesto);
    }

    echo "<h1>El precio total es: ",calcularTotal($precio, $cantidad, $impuesto),"</h1>"


?>