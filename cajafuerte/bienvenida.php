<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvingut a la teva casa de Hogwarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php

// Array multidimensional amb la informació de cada casa
$casas_info = [
"Gryffindor" => [
"background_color" => "#740001",
"text_color" => "#FFD700",
"welcome_message" => "Coratge, valor i determinació. Benvingut a Gryffindor!",
"message_background" => "#D3A625",
"image" => "https://static.wikia.nocookie.net/esharrypotter/images/a/a3/Gryffindor_Pottermore.png/revision/latest?cb=20140922195249"
],
"Hufflepuff" => [
"background_color" => "#FFDB00",
"text_color" => "#60605B",
"welcome_message" => "Lleialtat, paciència i treball dur. Benvingut a Hufflepuff!",
"message_background" => "#EEE117",
"image" => "https://static.wikia.nocookie.net/esharrypotter/images/3/30/Logo_Hufflepuff_2.png/revision/latest/scale-to-width-down/250?cb=20160417160852"
],
"Ravenclaw" => [
"background_color" => "#0E1A40",
"text_color" => "#946B2D",
"welcome_message" => "Intel·ligència, creativitat i saviesa. Benvingut a Ravenclaw!",
"message_background" => "#5D5D5D",
"image" => "https://static.wikia.nocookie.net/esharrypotter/images/7/76/Ravenclaw_Pottermore.png/revision/latest?cb=20141001130914"
],
"Slytherin" => [
"background_color" => "#1A472A",
"text_color" => "#AAAAAA",
"welcome_message" => "Ambició, astúcia i lideratge. Benvingut a Slytherin!",
"message_background" => "#5D5D5D",
"image" => "https://static.wikia.nocookie.net/esharrypotter/images/6/69/Slytherin_Pottermore.png/revision/latest/thumbnail/width/360/height/360?cb=20141001130915"
]
];
        $nombre =$_POST['nombre'];
        $apellidos =$_POST['Apellidos'];

        $casas = array_keys($casas_info);
        $casaseleccionada = $casas[array_rand($casas)];
        

        
?>
    <style>
        body{
            background-color: <?php echo $casas_info[$casaseleccionada]['background_color']?> ;
        }
        .mensajebienvenida{
            background-color: <?php echo $casas_info[$casaseleccionada]['message_background']?>;
        }
        h1,h4,h6{
            color: <?php echo $casas_info[$casaseleccionada]['text_color']?>;
        }
    
    </style>
</head>
<body>
    
    <div class="container text-center">
        <?php

        
        echo "<h1>¡Benvingut a " . $casaseleccionada ."!</h1>";
        
        echo "<div class='mensajebienvenida'>";
            echo "<h4 >¡" . $nombre . " ". $apellidos . " has sido seleccionado para ". $casaseleccionada . "!</h4>";
            echo "<h6>". $casas_info[$casaseleccionada]['welcome_message']."</h6>";
            
        ?>
        <img src="<?php echo $casas_info[$casaseleccionada]['image']?>" alt="" style="width: 400px; height: 380px; margin: 0 0 30px 0;">
            

        </div>
</div>
</body>
<style>
    <?php


    ?>
</style>
</html>