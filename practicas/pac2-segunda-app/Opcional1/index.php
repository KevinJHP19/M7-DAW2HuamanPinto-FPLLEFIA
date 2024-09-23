<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisores de un número y verificación de número</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        body{
            background-color:bisque;
        }
        h1{
            padding: 30px 20px 30px 20px;
            
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        .texto{
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            padding: 30px 20px 30px 20px;
        }
        section{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            
            
            justify-content: center;
        }
        .carteles{
            width: 50px;
            height: 50px;
            border: 3px solid lightblue;
            margin: 20px;
            padding: 10px;
            text-align: center;
            background-color: skyblue;
            border-radius: 5px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            
        }
        .primo{
            text-align: center;
            padding-top: 20xp;
            color: red;
            font-size: 20px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

    </style>
</head>
<body>
    

    <?php

    //LIMITES
    $min= 0;
    $max=100;

    //GENERACION DE NUMERO ALEATORIO

    $numero = rand($min,$max);

    echo "<h1>El numero generado es: $numero</h1>";
    echo "<br>";
    echo "<div class='texto'><strong>Los divisores de $numero son:</strong></div> ";
    echo "<section>";
    $chivato=0 ;
    for($i=1;$i<=$numero;$i++){
        if($numero%$i==0){
            
            echo "<div class='carteles'> $i </div>";
            $chivato++;
        }
    }
    echo "</section>";
    echo "<div class='primo'>";
        
            
            
            if($chivato==2){

                echo "<div><strong>$numero es un numero primo</strong></div>";

            }else{

                echo "<div><strong>$numero no es numero primo</strong></div>";
            }
        
    echo "</div>";

    ?>
    </body>
    </html>