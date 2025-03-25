<?php
session_start();

require_once './config.php';

// Verificar si el usuario tiene el rol de trabajador
if ($_SESSION['user_rol'] !== 'trabajador') {
    header('Location: index.php');
    exit();
}

$result = $mysqli->query("SELECT * FROM usuarios WHERE id = $_SESSION[user_id]");
$user = $result->fetch_assoc();
$buscar = isset($_POST['buscar']) ? trim($_POST['buscar']) : '';

// Consulta con búsqueda segura
if (!empty($buscar)) {
    $stmt = $mysqli->prepare("
        SELECT productos.*, categorias.nombre AS categoria_nombre, categorias.icono AS categoria_icono 
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
        SELECT productos.*, categorias.nombre AS categoria_nombre, categorias.icono AS categoria_icono 
        FROM productos 
        JOIN categorias ON productos.categoria_id = categorias.id
    ");
    $productos =$result->fetch_all(MYSQLI_ASSOC) ;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Trabajador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
    <style>
        /* Ocultar tabla en pantallas pequeñas */
        @media (max-width: 768px) {
            .table-responsive {
                display: none;
            }
            .card-container {
                display: block;
            }
        }

        /* Ocultar tarjetas en pantallas grandes */
        @media (min-width: 769px) {
            .card-container {
                display: none;
            }
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div>
                <a class="navbar-brand ps-3" href="#">
                    <?php echo '' . $user['nombre'] . " " . $user['apellidos']; ?>
                    <img src="./<?php echo $user['avatar']; ?>" alt="Avatar" class="rounded-5 border bg-white" width="50" height="50">
                </a>
            </div>
            <div>
                <a href="index.php" class="btn btn-secondary">Volver</a>
                <a href="logout.php" class="btn btn-primary">Cerrar sesión</a>
            </div>
        </div>
    </nav>
</header>
<div class="container mt-5">
    <h1 class="mb-4">Panel del Trabajador</h1>
    
    <!-- Formulario de búsqueda -->
    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar producto..." name="buscar" value="<?php echo htmlspecialchars($buscar); ?>">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <!-- Tabla de productos -->
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td>
                            <img src="../../<?php echo $producto['url']; ?>" alt="<?php echo $producto['nombre']; ?>" width="50" height="50">
                        </td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td>
                            <i class="<?php echo $producto['categoria_icono']; ?>"></i>
                            <?php echo $producto['categoria_nombre']; ?>
                        </td>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td>€<?php echo $producto['precio']; ?></td>
                        <td id="stock_<?php echo $producto['id']; ?>"><?php echo $producto['num_cantidad']; ?></td>
                        <td>
                            <form action="actualizar_stock.php" method="post" class="d-inline">
                                <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                                <button type="submit" name="accion" value="aumentar" class="btn btn-success btn-sm">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </form>
                            <form action="actualizar_stock.php" method="post" class="d-inline">
                                <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                                <button type="submit" name="accion" value="disminuir" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Tarjetas de productos -->
    <div class="card-container">
        <?php foreach ($productos as $producto) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <img src="../../<?php echo $producto['url']; ?>" alt="<?php echo $producto['nombre']; ?>" width="50" height="50" class="me-3">
                        <div>
                            <h5 class="card-title mb-0"><?php echo $producto['nombre']; ?></h5>
                            <p class="card-text"><i class="<?php echo $producto['categoria_icono']; ?>"></i> <?php echo $producto['categoria_nombre']; ?></p>
                        </div>
                    </div>
                    <p class="card-text"><strong>Descripción:</strong> <?php echo $producto['descripcion']; ?></p>
                    <p class="card-text"><strong>Precio:</strong> €<?php echo $producto['precio']; ?></p>
                    <p class="card-text"><strong>Stock:</strong> <?php echo $producto['num_cantidad']; ?></p>
                    <div class="d-flex justify-content-between">
                        <form action="actualizar_stock.php" method="post" class="d-inline">
                            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                            <button type="submit" name="accion" value="aumentar" class="btn btn-success btn-sm">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </form>
                        <form action="actualizar_stock.php" method="post" class="d-inline">
                            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                            <button type="submit" name="accion" value="disminuir" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>