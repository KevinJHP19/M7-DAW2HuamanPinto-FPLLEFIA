<?php


    function combinarArrays($array1, $array2){


        $resultado= print_r(array_merge($array1,$array2));


        
        return($resultado);



    }

    echo combinarArrays(['Manzana','Platano','Mandarina'],['Tomate','Patata', 'Berenjena'])


?>
