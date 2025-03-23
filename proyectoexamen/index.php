<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$result = $mysqli->query("SELECT * FROM usuarios WHERE id = $_SESSION[user_id]");
$user = $result->fetch_assoc();
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
            height: 150px;
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
<body>
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
                    } ?>
                    <a href="logout.php" class="btn btn-primary">Cerrar sesión</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mt-4">
        <section class="text-center mb-5">
            <h1>Bienvenido a nuestra tienda</h1>
            <p>Descubre los mejores productos en souvenirs, textiles y juguetes.</p>
        </section>
        <section>
            <h2 class="text-center">Productos más vendidos</h2>
            <div class="container">
                <h3 class="mt-4">Souvenirs</h3>
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    <?php $souvenirs = [['titulo' => 'Imán Barcelona', 'desc' => 'Recuerdo de Barcelona', 'img' => 'https://via.placeholder.com/150', 'precio' => '5€'], 
                                        ['titulo' => 'Llaveros Madrid', 'desc' => 'Llaveros icónicos', 'img' => 'https://via.placeholder.com/150', 'precio' => '3€'], 
                                        ['titulo' => 'Taza España', 'desc' => 'Taza decorativa', 'img' => 'https://via.placeholder.com/150', 'precio' => '8€']];
                    foreach ($souvenirs as $producto) { ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo $producto['img']; ?>" class="card-img-top" alt="<?php echo $producto['titulo']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['titulo']; ?></h5>
                                <p class="card-text"><?php echo $producto['desc']; ?></p>
                                <p class="fw-bold">Precio: <?php echo $producto['precio']; ?></p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container mt-4">
                <h3>Textil</h3>
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    <?php $textil = [['titulo' => 'Camiseta España', 'desc' => 'Camiseta con bandera', 'img' => 'https://via.placeholder.com/150', 'precio' => '15€'],
                                     ['titulo' => 'Bufanda Madrid', 'desc' => 'Bufanda de lana', 'img' => 'https://via.placeholder.com/150', 'precio' => '12€'],
                                     ['titulo' => 'Gorra Barcelona', 'desc' => 'Gorra deportiva', 'img' => 'https://via.placeholder.com/150', 'precio' => '10€']];
                    foreach ($textil as $producto) { ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo $producto['img']; ?>" class="card-img-top" alt="<?php echo $producto['titulo']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['titulo']; ?></h5>
                                <p class="card-text"><?php echo $producto['desc']; ?></p>
                                <p class="fw-bold">Precio: <?php echo $producto['precio']; ?></p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container mt-4">
                <h3>Juguetes</h3>
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    <?php $juguetes = [['titulo' => 'Muñeca clásica', 'desc' => 'Muñeca de colección', 'img' => 'https://via.placeholder.com/150', 'precio' => '20€'],
                                       ['titulo' => 'Coche de juguete', 'desc' => 'Coche a escala', 'img' => 'https://via.placeholder.com/150', 'precio' => '10€'],
                                       ['titulo' => 'Pelota de fútbol', 'desc' => 'Pelota profesional', 'img' => 'https://via.placeholder.com/150', 'precio' => '15€']];
                    foreach ($juguetes as $producto) { ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo $producto['img']; ?>" class="card-img-top" alt="<?php echo $producto['titulo']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['titulo']; ?></h5>
                                <p class="card-text"><?php echo $producto['desc']; ?></p>
                                <p class="fw-bold">Precio: <?php echo $producto['precio']; ?></p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>