

<?php
    function calcularTotal($precio, $cantidad, $impuesto){
        $calculo= $precio * $cantidad;

        $total= $calculo + $calculo*$impuesto; 
        
         
        return($total);
    }

    echo "<h1>El precio total es: ",calcularTotal(30, 4, 21/100),"</h1>";


?>