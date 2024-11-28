<?php
$productos = [
    [
        "nombre" => "Leche",
        "precio" => 5,
        "descripcion" => "Pack de 6 de leche Pascual"
    ],

    [
        "nombre" => "Galletas",
        "precio" => 1,
        "descripcion" => "Paquete de galletas maria"
    ],
    [
        "nombre" => "Queso mozarellla",
        "precio" => 3,
        "descripcion" => "Paquete de queso mozzarella de 300gramos"
    ],
    [
        "nombre" => "Coca cola",
        "precio" => 2,
        "descripcion" => "Botella de cocacola de 3 litros"
    ],
    [
        "nombre" => "Arroz",
        "precio" => 1.20,
        "descripcion" => "Paquete de arroz de 500 gramos"
    ],
]
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php


function generarTablaProductos($productos)
{
    
    
    echo "<table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>Producto</th>
                        <th scope='col'>Precio</th>
                        <th scope='col'>Descripcion</th>
                    </tr>
                </thead>
                </tbody>

            ";

    foreach ($productos as $producto) {
        
        echo "<tr>
                        <td>{$producto['nombre']}</td>
                        <td>{$producto['precio']}</td>
                        <td>{$producto['descripcion']}</td>
                        <td><a href='productos.php?nombre={$producto['nombre']}' class='btn btn-danger'>Eliminar</a></td>
                </tr>";
    }
    echo "</tbody>
    </table>";
}

if(isset($_GET['nombre'])){
    eliminarProducto($_GET['nombre']);
}
function eliminarproducto($producto){

    

    

}

    
    



?>

<body>
    <?php
    include './componentes/header.php';

    ?>
    <h1>Esta es lapagina de productos</h1>

    <?php
    if(!isset($_POST['nomproducto']) && !isset($_POST['precio']) && !isset($_POST['descripcion'])){
        generarTablaProductos($productos);
    } else {
        $productonuevo =[
            'nombre' => $_POST['nomproducto'],
            'precio' => $_POST['precio'],
            'descripcion' => $_POST['descripcion']
        ];
        array_push($productos, $productonuevo);
        
        
        generarTablaProductos($productos);
        
        
    }

    
    ?>

    <form action="productos.php" method="POST">
        <h3>Agregar Producto</h3>
        <label for="nombre" class="form-label">Producto:</label>
        <input type="text" class="form-control" name='nomproducto'>
        <label for="precio" class="form-label">Precio:</label>
        <input type="number" class="form-control" name='precio'>
        <label for="descripcion" class="form-label">Descripcion:</label>
        <input type="text" class="form-control" name='descripcion'>
        <button type="submit" class="btn btn-primary"> Agregar Producto</button>

    </form>


</body>

</html>