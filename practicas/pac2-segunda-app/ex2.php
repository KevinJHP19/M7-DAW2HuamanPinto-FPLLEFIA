
<?php

    echo "<h1>tablas de multiplicar</h1>";
    $factor1=0;
    $multiplicador = 1;
    $producto = 0;
    for($i=0;$i<=10;$i++){
        
        while($factor1!=9){
            $factor1 * $multiplicador = $producto;
            echo "<ul><li>$factor . 'x' . $multiplicador. '=' . $producto </li></ul>";
            $factor1++;
            $multiplicador++;
        }
    }
?>