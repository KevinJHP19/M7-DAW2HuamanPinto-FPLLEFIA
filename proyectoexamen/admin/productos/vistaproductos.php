<?php
session_start();

require_once '../config.php';
if ($_SESSION['user_rol'] !== 'admin') {
    header('Location: ../../index.php');
    exit();
}
$buscar = isset($_POST['buscar']) ? trim($_POST['buscar']) : '';


// Consulta con búsqueda segura
if (!empty($buscar)) {
    $stmt = $mysqli->prepare("
        SELECT productos.*, categorias.icono, categorias.nombre AS categoria_nombre 
        FROM productos 
        JOIN categorias ON productos.categoria_id = categorias.id
        WHERE productos.nombre LIKE ? 
        OR productos.descripcion LIKE ? 
        OR categorias.nombre LIKE ?
    ");
    if ($stmt) {
        $likeBuscar = "%$buscar%";
        $stmt->bind_param("sss", $likeBuscar, $likeBuscar, $likeBuscar);
        $stmt->execute();
        $result = $stmt->get_result();
        $productos = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    } else {
        die("Error en la consulta: " . $mysqli->error);
    }
} else {
    $result = $mysqli->query("
        SELECT productos.*, categorias.icono, categorias.nombre AS categoria_nombre 
        FROM productos 
        JOIN categorias ON productos.categoria_id = categorias.id
    ");
    $productos = $result->fetch_all(MYSQLI_ASSOC) ;
}
$categorias = $mysqli->query("SELECT * FROM categorias");
$categorias = $categorias->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
    <style>
        @media (max-width: 768px) {
            .table {
                display: none;
            }
            .card-container {
                display: flex;
                flex-direction: column;
            }
        }
        @media (min-width: 769px) {
            .card-container {
                display: none;
            }
        }
        .card {
            margin-bottom: 1rem;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 1rem;
        }
        .card img {
            max-width: 90%;
            height: auto;
        }
        .card-body {
            display: flex;
            flex-direction: column;
        }
        .card-body div {
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <h1 class="mb-4">Lista de Productos</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Agregar Producto
    </button>
    <button type="button" class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        Agregar Categoria
    </button>
    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar producto..." name="buscar" value="<?php echo htmlspecialchars($buscar); ?>">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>
    <div class="table-responsive">
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
                    <td data-label="Categoria">
                        <i class="<?php echo $producto['icono']; ?>"></i>
                        <?php echo $producto['categoria_nombre']; ?>
                    </td>
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

<div class="card-container">
    <?php foreach ($productos as $producto) :?>
        <div class="card">
            <img  src="../../<?php echo $producto['url'];?>" alt="<?php echo $producto['nombre'];?>">
            <div class="card-body">
                <div><strong>Producto:</strong> <?php echo $producto['nombre'];?></div>
                <div><strong>Categoria:</strong> <i class="<?php echo $producto['icono']; ?>"></i> <?php echo $producto['categoria_nombre']; ?></div>
                <div><strong>Descripcion:</strong> <?php echo $producto['descripcion'];?></div>
                <div><strong>Precio:</strong> €<?php echo $producto['precio'];?></div>
                <div><strong>Stock:</strong> <?php echo $producto['num_cantidad'];?></div>
                <div><strong>Fecha de subida:</strong> <?php echo $producto['fecha_subida'];?></div>
                <div><strong>Acciones:</strong> <a class="btn btn-warning me-3 mb-3" href="./productos/editarproductos.php?id=<?php echo $producto['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a>  <a class="btn btn-danger mb-3" href="./productos/eliminarproductos.php?id=<?php echo $producto['id'];?>"><i class="fa-solid fa-trash"></i></a></div>
            </div>
        </div>
    <?php endforeach;?>
</div>
    </div>
</div>
<div class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addCategoryModalLabel">Agregar Categoria</h1>
            </div>
            <div class="modal-body">
                <form action="./productos/agregarcategoria.php" method="post">
                    <div class="mb-3">
                        <label for="nombre_categoria" class="form-label">Nombre de la Categoria</label>
                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" required>
                    </div>
                    <div class="mb-3">
                        <label for="icono_categoria" class="form-label">Icono de la Categoria</label>
                        <input type="text" class="form-control" id="icono_categoria" name="icono_categoria" placeholder="fa-solid fa-play" required>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Producto</h1>
            </div>
            <div class="modal-body">
                <form action="./productos/agregarproducto.php" method="post" enctype="multipart/form-data">
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
                        <?php foreach ($categorias as $categoria) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="categoria_id" id="cat_<?php echo $categoria['id']; ?>" 
                                    value="<?php echo $categoria['id']; ?>" required>
                                <label class="form-check-label" for="cat_<?php echo $categoria['id']; ?>">
                                    <i class="<?php echo $categoria['icono']; ?>"></i> <?php echo $categoria['nombre']; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
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




