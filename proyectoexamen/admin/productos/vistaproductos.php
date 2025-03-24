<?php
session_start();
require_once '../config.php';
if ($_SESSION['user_rol'] !== 'admin') {
    header('Location: ../../index.php');
    exit();
}
require 'agregarproducto.php';
$productos = $mysqli->query("SELECT * FROM productos");
$productos = $productos->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Lista de Productos</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Agregar Producto
  </button>
  <a href="../agregarcategoria.php" class="btn btn-outline-primary mb-3">Agregar categoria</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Fecha de subida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) :?>
                    <tr>
                        <td data-label="Imagen"><img src="../../<?php echo $producto['url'];?>" alt="<?php echo $producto['nombre'];?>" width="50" height="50"></td>
                        <td data-label="Producto"><?php echo $producto['nombre'];?></td>
                        <td data-label="Categoria"><?php echo $producto['categoria'];?></td>
                        <td data-label="Descripcion"><?php echo $producto['descripcion'];?></td>
                        <td data-label="Precio">€<?php echo $producto['precio'];?></td>
                        <td data-label="Stock"><?php echo $producto['num_cantidad'];?></td>
                        <td data-label="Fecha de subida"><?php echo $producto['fecha_subida'];?></td>
                        <td data-label="Acciones"><a class="btn btn-warning me-3 mb-3" href="./productos/editarproductos.php?id=<?php echo $producto['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a>  <a class="btn btn-danger mb-3" href="./productos/eliminarproductos.php?id=<?php echo $producto['id'];?>"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Producto</h1>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="img" name="avatar" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria" required>
                            <option value="Textil">Textil</option>
                            <option value="Souvernier">Souvenier</option>
                            <option value="Jueguete">Juguete</option>
                            
                        </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




