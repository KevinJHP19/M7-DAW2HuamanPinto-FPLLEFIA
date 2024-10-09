<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha</title>
    <style>
        body{
            display: flex;
            

        }
        #cards{
            width: 400px;
            height: 340px;
            border: 2px solid;
            margin: 15px;
            padding: 30px;
            text-align: center;
            
        }
        img{
            width: 100px;
        }
    </style>
</head>
<body>
    <?php
    



    if(isset($_GET['nom']) && isset($_GET['foto'])){
        $nom = $_GET['nom'];
        $foto = $_GET['foto'];

        echo "<div id='cards'>";
        echo "<img src='{$foto}' alt=''>";
        echo "<h5>Nombre:{$nom}</h5>";
}   
if(isset($_GET['telefono']) && isset($_GET['correo'])){
    $telefono = $_GET['telefono'];
    $correo = $_GET['correo'];
        echo "<p>tefefono: {$telefono}</p>";
        echo "<p>Correo electronico: {$correo}</p>";
}        
if(isset($_GET['edad']) && isset($_GET['profesion'])){
    $edad = $_GET['edad'];
    $profesion = $_GET['profesion'];
        echo "<p>edad: {$edad}</p>";
        echo "<p>Profesion: {$profesion}</p>";
}        
        
        
        
        
        
        echo "</div>";


    
    
    
    
    ?>

    
</body>
</html>