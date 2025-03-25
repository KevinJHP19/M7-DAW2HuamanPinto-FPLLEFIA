<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$result = $mysqli->query("SELECT * FROM usuarios WHERE id = $_SESSION[user_id]");
$user = $result->fetch_assoc();
$productostextil = $mysqli->query("SELECT * FROM productos WHERE categoria_id = 1 LIMIT 3");
$productostextil = $productostextil->fetch_all(MYSQLI_ASSOC);
$productosjuguetes = $mysqli->query("SELECT * FROM productos WHERE categoria_id = 2 LIMIT 3");
$productosjuguetes = $productosjuguetes->fetch_all(MYSQLI_ASSOC);
$productossouverniers = $mysqli->query("SELECT * FROM productos WHERE categoria_id = 3 LIMIT 3");
$productossouverniers = $productossouverniers->fetch_all(MYSQLI_ASSOC);
$categoria1 = $mysqli->query("SELECT * FROM categorias WHERE id = 1");
$categoria1 = $categoria1->fetch_assoc();
$categoria2 = $mysqli->query("SELECT * FROM categorias WHERE id = 2");
$categoria2 = $categoria2->fetch_assoc();
$categoria3 = $mysqli->query("SELECT * FROM categorias WHERE id = 3");
$categoria3 = $categoria3->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card img {
            height: 350px;
            object-fit: cover;
        }
        .container-fluid, .container {
            padding: 15px;
        }
        @media (max-width: 768px) {
            .card {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body style="background-image: url(https://wallpapers.com/images/featured/fondods-de-viajes-we1aqvt6zacj99uk.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    padding-bottom: 26px;">
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div>
                    <a class="navbar-brand ps-3" href="#">
                        <?php echo 'Hola ' . $user['nombre'] . " " . $user['apellidos']; ?>
                        <img src="./<?php echo $user['avatar']; ?>" alt="Avatar" class="rounded-5 border bg-white" width="50" height="50">
                    </a>
                </div>
                <div>
                    <?php if ($user['rol'] == 'admin') {
                        echo '<a class="btn btn-secondary text-white me-2" href="admin/menuadmin.php">Panel Admin</a>';
                    }else if($user['rol'] == 'trabajador'){
                        echo '<a class="btn btn-secondary text-white me-2" href="paneltrabajador.php">Panel Trabajador</a>';
                    }
                     ?>
                    <a href="logout.php" class="btn btn-primary">Cerrar sesión</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mt-4 bg-white rounded-5" >
        <section class="text-center mb-5">
            <h1>Bienvenido a nuestra tienda</h1>
            <p>Descubre los mejores productos en souvenirs, textiles y juguetes.</p>
        </section>
        <section>
            <h2 class="text-center">Productos más vendidos</h2>
            <div class="container">
                <h3 class="mt-4"><?php echo '<i class="' . $categoria3['icono'] . ' me-2"></i>' . $categoria3['nombre']; ?></h3>
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    <?php foreach ($productossouverniers as $producto) { ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo $producto['url']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImageModal('<?php echo $producto['url']; ?>')">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                                <p class="fw-bold">Precio: €<?php echo $producto['precio']; ?></p>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container mt-4">
            <h3 class="mt-4"><?php echo '<i class="' . $categoria1['icono'] . ' me-2"></i>' . $categoria1['nombre']; ?></h3>
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    <?php foreach ($productostextil as $producto) { ?>
                    <div class="col">
                        <div class="card h-100">
                            <img  src="<?php echo $producto['url']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImageModal('<?php echo $producto['url']; ?>')">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                                <p class="fw-bold">Precio: €<?php echo $producto['precio']; ?></p>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container mt-4">
            <h3 class="mt-4"><?php echo '<i class="' . $categoria2['icono'] . ' me-2"></i>' . $categoria2['nombre']; ?></h3>
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    <?php foreach ($productosjuguetes as $producto) { ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo $producto['url']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImageModal('<?php echo $producto['url']; ?>')">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                                <p class="fw-bold">Precio: €<?php echo $producto['precio']; ?></p>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Imagen del Producto" class="img-fluid">
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function showImageModal(imageUrl) {
        document.querySelector('#modalImage').src = imageUrl;
    }
</script>
</body>
</html>