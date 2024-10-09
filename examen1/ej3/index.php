<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            

        }
        #cards{
            width: 400px;
            height: 240px;
            border: 2px solid;
            margin: 15px;
            padding: 30px;
            
            
        }
        img{
            width: 100px;
        }
    </style>
</head>
<body>
    <?php

    $personas= [
        ['foto' => 'https://upload.wikimedia.org/wikipedia/commons/9/94/Robert_Downey_Jr_2014_Comic_Con_%28cropped%29.jpg', 'nombre' => 'Robert Downey Jr', 'telefono' => 32344312, 'correo' => 'robert@gmail.com', 'edad' =>59 , 'profesion' => 'Actor'],

        ['foto' => 'https://upload.wikimedia.org/wikipedia/commons/1/14/Deadpool_2_Japan_Premiere_Red_Carpet_Ryan_Reynolds_%28cropped%29.jpg', 'nombre' => 'Ryan Reynolds', 'telefono' => 38734482, 'correo' => 'ryan@gmail.com', 'edad' =>47 , 'profesion' => 'Actor'],

        ['foto' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTC2rtANiJ6OOn5lb80ZI6vCxS_k8rpbk8Vbg&s', 'nombre' => 'Vin diesel', 'telefono' => 39345522, 'correo' => 'vin@gmail.com', 'edad' =>57 , 'profesion' => 'Productor'],
        
        
    ];

    foreach($personas as $persona){
        echo "<div id='cards'>";
        echo "<img src='{$persona['foto']}' alt=''>";
        echo "<h5>{$persona['nombre']}</h5>";
        echo "<a href='ficha.php?nom={$persona['nombre']}&foto={$persona['foto']}&telefono={$persona['telefono']}&correo={$persona['correo']}&edad={$persona['edad']}&profesion={$persona['profesion']}'><button>Mas informacion</button></a>";
        echo "</div>";
    };
    
    ?>
    
    
</body>
</html>