<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taula de productes amb ofertes destacades</title>
    <style>
        body{
            align-items: center;
            
        }
        table tr{
            border: 1px solid;
        }
        table td{
            width: 200px;
            height: 10px;
            
        }
    </style>
    <?php
    $productos =[
        ['nombre' => 'azucar', 'precio' => 3.20, 'oferta' => false],
        ['nombre' => 'Harina', 'precio' => 1.40, 'oferta' => true],
        ['nombre' => 'Pan', 'precio' => 1, 'oferta' => false],
        ['nombre' => 'Cereal', 'precio' => 2, 'oferta' => true],
        ['nombre' => 'Patata', 'precio' => 2, 'oferta' => true],
        ['nombre' => 'Pollo', 'precio' => 4, 'oferta' => false],
        ['nombre' => 'Queso', 'precio' => 1.60, 'oferta' => false],
        ['nombre' => 'Chorizo', 'precio' => 2.50, 'oferta' => true],


    ];
    
    
        
    ?>
</head>
 <table>
            <thead style="background-color: gray;">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                </tr>
            </thead>
    <tbody>
    <?php
    foreach($productos as $producto){
        if($producto['oferta']==true){
            echo "<tr style='background-color: lightgreen'>";
                        echo "<td>{$producto['nombre']}</td>";
                        echo "<td>{$producto['precio']}</td>";
                        



        }else{
            echo "<tr>";
            echo "<td>{$producto['nombre']}</td>";
            echo "<td>{$producto['precio']}</td>";
                        


        }
        echo '</tr>';

    }
    ?>
    </tbody>
</table>
<body>
    
</body>
</html>