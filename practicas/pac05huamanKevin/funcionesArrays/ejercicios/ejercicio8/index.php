<?php


    function eliminarDuplicados($array){

        $arraycambiado = var_dump(array_unique($array));
        return ($arraycambiado);
        

    }

    echo eliminarDuplicados([30,30,20,12,32,43,21,32,13,43])


?>