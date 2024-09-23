<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clasificacion de temperaturas</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }
        body{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        h1{
            text-align: center;
            padding: 10px;

        }
        .contenedor{
            display: flex;
            flex-wrap: wrap;   
            font-weight: bold;          
        }

        .frio{
            
            width: 250px;
            padding: 30px;
            margin: 10px;
            background-color: skyblue;
            text-align: center;
            color: white;
        }
        .suave{
            width: 250px;
            padding: 30px;
            margin: 10px;
            background-color: yellow;
            text-align: center;
        }
        .calor{
            width: 250px;
            padding: 30px;
            margin: 10px;
            background-color: red;
            text-align: center;
            color: white;
        }
        .promedio{
            text-align: center;
        }



    </style>
</head>
<body>
    <h1>Clasificacion de temperaturas</h1>
    <?php
    $max = 50;
    $min = -10;
    echo  ("<div class='contenedor'>");
    for($i=0;$i<=9;$i++){

        $temperatura= rand($min,$max);

        if($temperatura<=8){
            echo ("<div class='frio'>");
            echo("$temperatura ºC");
            echo("<br>");
            echo ("Temperatura fria");
            echo("</div>");
            
        }
        if($temperatura>8 && $temperatura<29){
            echo ("<div class='suave'>");
            echo("$temperatura ºC");
            echo("<br>");
            echo ("Temperatura suave");
            echo("</div>");
            
        }
        if ($temperatura>=29){
            echo ("<div class='calor'>");
            echo("$temperatura ºC");
            echo("<br>");
            echo ("Temperatura calida");
            echo("</div>");
            
        }

        $media +=$temperatura;
    }
        $promedio= $media/10;

        
    echo  ("</div>");

    echo ("<div class='promedio'>La media de las temperaturas es: $promedio </div>");


    ?>


    
</body>
</html>