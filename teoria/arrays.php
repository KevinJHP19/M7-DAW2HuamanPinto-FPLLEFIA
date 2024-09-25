<?php

    /*$estudiantes = array('Didac', 'David', ' Lucia');

    $lista = array("Suleima", "Brian", "Dani");

    //var_dump($lista);
    print_r($lista);

    //DESDE LA VERSION 5.4 PHP

    $lista2 =["Didac", "Kevin ", "David", 87, 32, 78.23, true];

    $lista2[2] ="yehor";
    echo $lista2[1];
    echo $lista2[2];

    $colores = ['rojo', 'azul', 'verde'];

    $colores[] = ' Naranja';
    print_r($colores);*/
    //2. array asociativo
    $tutor = [
        "nombre" => "Albert", 
        "apellidos" => "Arebola Sans",
        "edad" => 36 
        ];

    echo $tutor["apellidos"];
    $tutor["edad"] = 18;

    echo $tutor["edad"];

 //print_r(array_keys($tutor));

        //recorrer array con un for
        $numeros=[1,2,3,4,5,6,7,8,9];
        for ($i = 0; $i < count($numeros);$i++){
            echo $numeros[$i] . "<br>";
        }

        //Recorrer array con unforeach
        $numero = [1,2,3,4,5,6,7,8,9];
        foreach($numero as $num){
        echo ($num * 2) . " ";
        }

        $ciudades = [
            "Paris" =>"Francia",
            "Barcelona" => "Espanya",
            "Londres" => "Reino Unido"
        ];
        foreach ($ciudades as $ciudad => $pais){
            echo "<br>";
            if($ciudad == 'Barcelona'){
                echo "La ciudad de $ciudad esta en $pais";
            }
            
            
        }
    // foreach en arrays multidimensionales
    //Crea un array multidimensional de estudiantes ysus notas , y recorre cadaestudiante con foreach para mostrar su datos.
        $estudiantes = [
            ["nombre" => "Anna", "nota" => 10, "genero" => 'f'],
            ["nombre" => "Dani", "nota" => 10, "genero" => 'm'],
            ["nombre" => "Yehor", "nota" => 11, "genero" => 'm'],
            ["nombre" => "Didac", "nota" => 9, "genero" => 'm'],
            ["nombre" => "David", "nota" => 12, "genero" => 'm'],
        ];
        foreach($estudiantes as $estudiante){
            if ($estudiante=['genero'] == 'h'){
                echo "El estudiante: {$estudiante['nombre']} ha sacado un {$estudiante['nota']}";
                
            } else{
                echo "La estudiante: {$estudiante['nombre']} ha sacado un {$estudiante['nota']}";
                echo "<br>";
            }
            
        };
?>