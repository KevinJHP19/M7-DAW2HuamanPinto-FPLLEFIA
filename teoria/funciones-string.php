<?php

    //1.longitud de caracteres --> strlen()


    $cadena = "Hola mundo";

    echo strlen($cadena);
    echo "<br>";
    //2. strpos

    echo strpos($cadena, "mundo");

    //3. str_replace
    echo '<br>';
    echo str_replace("mundo", "Barcelona", $cadena);
    echo '<br>';
    // 4. strtolower

    echo strtolower($cadena);
    echo '<br>';
    // 5. strtoupper

    echo strtoupper("$cadena");
    echo '<br>';
    // 6. ucfirst

    echo ucfirst($cadena);

    // 7. ucwords
    echo '<br>';
    echo ucwords($cadena);

    //8.tris
    echo '<br>';
    $cadena2 = 'leo messi';
    echo trim($cadena2);

    //9. substr()
    //obtiene una parte de una cadena
    echo '<br>';
    echo substr($cadena2, 4);
    echo '<br>';

    //10. implode

    //separa una lista con un limitador que tu pongas
    $array = ["Hola","Mundo","PHP"];
    echo implode(", ", $array);
    echo '<br>';
    //11. explode

    //trasforma una cadena de en array (inverso de implode)

    $cadena = "Hola,Mundo,PHP";
    $array = explode(",",$cadena);
    print_r($array);
    foreach ($array as $a){
        echo $a;
    }
    echo '<br>';
    // 12. in_array() mira si existe o no en un array

    $os = ["Mac", "NT", "Irix", "Linux"];

    if (in_array("Irix", $os)){
        echo "Existe Irix";
    }
    echo '<br>';
    //13. array_search

    //busca un valor de un array y devuelve la clave correspondiente. si no esta saca false
    $array = ["manzana ", "pera", "naranja"];
    echo array_search("naranja", $array);

    echo '<br>';
    // 14. array_map
    $arraymap =[1,2,3,4];
    $resultado = array_map(function($numero){
        return $numero *2;
    }, $arraymap);
    print_r($resultado);
    echo '<br>';
    //15. array_filter()

    $arrayfilter = [1,2,3,4];
    $resultado = array_filter($arrayfilter, function($n){
        return $n %2 ==0;
    });
    echo '<br>';
    print_r($resultado);















?>