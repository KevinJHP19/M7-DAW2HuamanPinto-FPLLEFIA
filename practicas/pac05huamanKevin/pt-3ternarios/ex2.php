<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $stock = 10;

    $mostrar = ($stock == 0) ? "<p style='color:red;'>Producto Agotado</p>" : "<p style='color:green;'>Producto Disponible</p>";
    
    echo $mostrar
    

    ?>
    

    

</body>
</html>
