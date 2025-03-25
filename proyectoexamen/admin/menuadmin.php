<?php
session_start();
require_once '../config.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}
$result = $mysqli->query("SELECT * FROM usuarios WHERE id = $_SESSION[user_id]");
$user = $result->fetch_assoc();
if ($user['rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
    <header class="navbar navbar-dark bg-dark p-3">
        <a class="navbar-brand" href="#">Admin Panel </a>
        <div>
        <a href="../index.php" class="btn btn-primary">Volver al inicio</a>
        <a href="../logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </header>
    <div class="container-fluid " height="300%">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar py-3 ">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="menuadmin.php?usuario=true"><i class="fa-solid fa-users p-2"></i> Usuarios </a></li>
                    <li class="nav-item"><a class="nav-link" href="menuadmin.php?producto=true"><i class="fa-solid fa-truck p-2"></i>Productos</a></li>
                </ul>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
                <h1>Bienvenido, <?php echo $user['nombre']; ?> (Admin)</h1>
                
                <?php
                if (isset($_GET['usuario'])) {
                    require './usuarios/vistausuarios.php';
                } elseif (isset($_GET['producto'])) {
                    require './productos/vistaproductos.php';
                }else{
                    echo '<p>Selecciona una opción del menú para gestionar usuarios o productos.</p>';

                }
                ?>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>