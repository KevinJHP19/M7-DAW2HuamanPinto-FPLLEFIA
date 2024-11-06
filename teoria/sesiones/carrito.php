<?php 
session_start();
//inicializa el carrito

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
//var_dump($_SESSION['carrito']);

//añadir producto al carrito

$item = $_POST['item'];


//Manera 1 de hacer un push
//$_SESSION['carrito'][] = $item;


//Manera 2 de hacer un push utilizando la función array_push
array_push($_SESSION['carrito'], $item);

var_dump($_SESSION['carrito']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="carrito.php" method="post">
    <input type="text" placeholder="Añade un producto " require name="item">

    <button type="submit">Agregar producto</button>

  </form>
  
  
  <section>
    <h3>Productos del carrito</h3>
    <table>
        <tr>
            <th>Nombre del producto</th>
        </tr>
        <?php foreach ($_SESSION['carrito'] as $item):?>
            <tr>
                <td><?= $item?></td>
            </tr>
        <?php endforeach;?>
    </table>
  </section>
</body>
</html>

