<?php


//empty es para comprobar si una variable está vacía

//is_null()--> para comprobar si una variable es null.


//isset()--> para comprobar si una variable está definida y no es null.

//NULL. IS_NULL(), UNSET()--> para hacer variables nulas.

$numero = 23;

//unset($numero);

if(is_null($numero)){
    echo "La variable numero es null";
}else{
    echo "La variable numero no es null";
}
echo "<br>";

if(empty($numero)){
    echo "La variable numero existe";
}



?>