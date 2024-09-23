<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EX1</title>
    <style>
        h1{
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        main{
            display: flex;
            
            width: 100%;
            height: 400px;
            
            flex-wrap: wrap;
        }
            
            
        
            
        
        .carteles{
            width: 40px;
            border: 2px solid black;
            padding: 20px;
            margin: 5px;
            color:white;
            background-color: gray;
            text-align: center;
            
        }
        
        

    </style>
</head>

<body>
    <h1>Numero pares del 50 hasta el 500</h1>
    <main>
<?php
     
   
    echo  "<br>";
    $chivato=50;
    for($chivato=52;$chivato<500;$chivato+=2){
        
    echo ("<div class='carteles' > $chivato </div>");
        
        
    }
?>
</main>
</body>
</html>
