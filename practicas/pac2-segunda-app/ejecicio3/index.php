<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
    <style>
        body{
            margin-left: 50px;
        }
        h1{
            text-align: center;
        }
        .colorimpar{
            color: blue;
            font-size: 20px;
        }
        .colorpar{
            color: purple;
            font-size: 20px;
        }
        .impar{
            width: 100px;
            height: 50px;
            border: 4px solid;
            text-align: center;
            margin: 40px;
            padding: 35px;
            background-color: blue;
            color: white;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .par{
            width: 100px;
            height: 50px;
            border: 4px solid;
            text-align: center;
            margin: 40px;
            padding: 35px;
            background-color: purple;
            color: white;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            
        }
    </style>
</head>
<body>
    <h1>Numero aleatorio par o impar</h1>
    <?php
    //LIMITES
    echo "<div class='colorpar'> <strong>Este color es par</strong></div>";
    echo "<div class='colorimpar'> <strong>Este color es impar</strong></div>";
    $min= 0;
    $max=100;

    //GENERACION DE NUMERO ALEATORIO

    $numero = rand($min,$max);

    //Calculo


    $residuo =$numero%2;

    if($residuo==1){
        echo "<div class='impar'>$numero es un numero impar</div>";
    }else{
        echo "<div class='par'>$numero es un numero par</div>";
    }

    

    






?>
    
</body>
</html>