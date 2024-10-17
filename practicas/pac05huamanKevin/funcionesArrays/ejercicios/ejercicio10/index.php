<?php

    function dividirArray($array, $tamanio){

        $resultado = print_r(array_chunk($array,$tamanio));

        return($resultado);

    }

    echo dividirArray(['Manzana','Platano','Mandarina','Tomate','Patata', 'Berenjena'],3)




?>