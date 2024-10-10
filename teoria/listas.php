<?php

$estudiantes = [
            ["nombre" => "Anna", "nota" => 10, "genero" => 'f'],
            ["nombre" => "Dani", "nota" => 10, "genero" => 'm'],
            ["nombre" => "Yehor", "nota" => 11, "genero" => 'm'],
            ["nombre" => "Didac", "nota" => 9, "genero" => 'm'],
            ["nombre" => "David", "nota" => 12, "genero" => 'm'],
        ];
        foreach($estudiantes as $estudiante){
            if ($estudiante['genero'] == 'h'){
                echo "El estudiante: {$estudiante['nombre']} ha sacado un {$estudiante['nota']}";
                
            } else{
                echo "La estudiante: {$estudiante['nombre']} ha sacado un {$estudiante['nota']}";
                echo "<br>";
            }
            
        };
?>