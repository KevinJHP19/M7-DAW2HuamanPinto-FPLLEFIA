<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            width: 100%;
            height: 100%;
        }
        h1{
            text-align: center;
        }
        .contenedor{
            display: flex;
            width: 100%;
            justify-content: space-around;
            height: 100%;
            flex-wrap: wrap;
        }
        section{
            
            border: 2px solid black;
            width: 130px;
            background-color: gray;
            text-align: center;
            color: white;
            padding: 10px 0 0px 0;
            margin: 15px;
            height: 200px;
            
        }
    </style>
</head>
<body>
    <h1>Tablas de multiplicar</h1>

    <?php

    echo "<div class='contenedor'>";
    $factor=1;
    $producto = 0;
    for($i=0;$i<=10;$i++){
        
       echo "<section>";
        for($j=0;$j<=9;$j++){
            
            
            $producto= $factor * $j;
            echo "<div class='tablas'>$factor x $j = $producto </div>";
        }
        $factor+=1;
        echo "</section>";
    }
    echo "</div>";
    ?>

</body>
</html>
